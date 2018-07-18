<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class App extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
            parent::__construct();
            $this->load->database();
            $this->load->library('session');
            $this->load->helper();
            if (!$this->session->userdata('uid')) {
              // $this->load->view('login');
              redirect('Login', 'refresh');
            }
    }

	public function index()
	{
        if (!$this->session->userdata('uid')) {
            redirect('Login', 'refresh');
        }else {
          $this->load->view('aplikasi');
        }
	}

  

  function menu(){
    $this->load->view('menu');
  }
  function record(){
    $this->load->view('aktifitas');
  }






  function tambah_keranjang(){
    if ($this->input->post('id_pesanan') != '') {
      $id = $this->input->post('id_pesanan');
    }
    else{
      $query = $this->db->query("SELECT id_pesanan from pesanan order by id_pesanan desc limit 1");
      $count = $query->num_rows();
            if($count==0) {
                $id ="ERP".date('dmY')."-"."001";
            }else{
              foreach ($query->result() as $row) {
                    $a = substr($row->id_pesanan,12);
                    $counter=intval($a); //hasil yang didaptkan dirubah jadi integer. Ex: 0001 mjd 1.
                    $new=intval($counter)+1;         //digit terahit ditambah 1
                }
                if (strlen($new)==1){ //jika counter yg didapat panjangnya 1 ex: 1
                   $vcounter="00". '' .$new;
                }
                if (strlen($new)==2){  //jika counter yg didapat panjangnya 2 ex: 11
                   $vcounter="0". '' .$new;
                }
                if (strlen($new)==4){  //jika counter yg didapat panjangnya 2 ex: 11
                   $vcounter=$new;
                }
                $id = "ERP".date('dmY')."-".$vcounter;
            }

      
    }
    

    $data = array(
        'id_pesanan' => $id,
        'id_menu' => $this->input->post('id_menu'),
        'uid' => $this->session->userdata('uid'),
        'status_pesanan' => "aktif"
    );
    $this->db->insert('pesanan', $data);



     //log     
      $log = array(
        'waktu' => date('Y-m-d H:i:s'),
        'aktifitas' => "Menambahkan menu ID: ".$this->input->post('id_menu')." ke pesanan ID: ".$id,
        'id' => $this->session->userdata('uid')
      );
      $this->db->insert('activity', $log);

    echo json_encode($id);
  }



  function daftar_menu(){
    $this->db->where('status', 'aktif');
    $data = $this->db->get('menu')->result();
    echo json_encode($data);
  }


  function daftar_pesanan(){
    if ($this->session->userdata('level') == 'pelayan') {
      $this->db->where('uid', $this->session->userdata('uid'));
    }
    $this->db->select('id_pesanan, waktu, status_pesanan, no_meja, sum(harga) as total');
    $this->db->join('menu', 'pesanan.id_menu = menu.id_menu');
    $this->db->group_by('id_pesanan');
    $data = $this->db->get('pesanan')->result();
    echo json_encode($data);
  }

  function daftar_keranjang(){
    $this->db->where('status', 'aktif');
    
    if ($this->input->post('id_pesanan') != '') {
      $this->db->where('id_pesanan', $this->input->post('id_pesanan'));
    }else{
      $this->db->where('no_meja', null);
    }
    $this->db->join('menu', 'pesanan.id_menu = menu.id_menu');
    $data = $this->db->get('pesanan')->result();
    echo json_encode($data);
  }

  function simpan_pesanan(){
    $data = array(
        'no_meja' => $this->input->post("no_meja"),
        'waktu' => date('Y-m-d H:i:s')
    );
    $this->db->where('id_pesanan', $this->input->post('id_pesanan'));
    $x = $this->db->update('pesanan', $data);
    echo json_encode(true);
  }


  function pembayaran(){
    $data = array(
        'status_pesanan' => "terbayar",
        "id_kasir" => $this->session->userdata('uid')
    );
    $this->db->where('id_pesanan', $this->input->post('id_pesanan'));
    $x = $this->db->update('pesanan', $data);

    //log     
      $log = array(
        'waktu' => date('Y-m-d H:i:s'),
        'aktifitas' => "Pembayaran pesanan ID: ".$this->input->post('id_pesanan'),
        'id' => $this->session->userdata('uid')
      );
      $this->db->insert('activity', $log);

    echo json_encode(true);
  }


  function hapus_keranjang(){
    $this->db->where('id_pesanan', $this->input->post('id_pesanan'));
    $this->db->where('id_menu', $this->input->post('id_menu'));

    $this->db->delete('pesanan');


    //log     
      $log = array(
        'waktu' => date('Y-m-d H:i:s'),
        'aktifitas' => "Menghapus menu ID: ".$this->input->post('id_menu')." ke pesanan ID: ".$this->input->post('id_pesanan'),
        'id' => $this->session->userdata('uid')
      );
      $this->db->insert('activity', $log);

    echo json_encode(true);
  }



  function batal_pesan(){
    $this->db->where('id_pesanan', $this->input->post('id_pesanan'));
    $this->db->delete('pesanan');

    //log     
      $log = array(
        'waktu' => date('Y-m-d H:i:s'),
        'aktifitas' => "Membatalkan / Menghapus pesanan ID: ".$this->input->post('id_pesanan'),
        'id' => $this->session->userdata('uid')
      );
      $this->db->insert('activity', $log);
    echo json_encode(true);
  }

  function load_table_menu(){    
    $list = $this->db->get('menu')->result();

        $data = array();
        $no = 1;
        foreach ($list as $hasil) {

            $row = array();
            
         
            $row[] = $hasil->id_menu;
            $row[] = $hasil->nama_menu;
            $row[] = $hasil->tipe;
            $row[] = $hasil->status;
            $row[] = '<p >'.number_format($hasil->harga,0,".",",").'</p>';
            if ($hasil->status == 'aktif') {
              $row[] = '<p onclick=ubah_status("'.$hasil->id_menu.'","nonaktifkan") style="padding:3px; color:red; cursor:pointer">Nonaktifkan<i class="material-icons">call_received</i></p>';
            }else{
              $row[] = '<p onclick=ubah_status("'.$hasil->id_menu.'","aktifkan") style="padding:3px; color:green; cursor:pointer">Aktifkan<i class="material-icons">call_made</i></p>';
            }

           $data[] = $row;
           $no += 1;
        }
        echo json_encode(array("data"=>$data));

  }




  function load_table_aktifitas(){    
    $this->db->join('user', 'activity.id = user.uid');
    $list = $this->db->get('activity')->result();

        $data = array();
        $no = 1;
        foreach ($list as $hasil) {

            $row = array();
            
         
            $row[] = $hasil->waktu;
            $row[] = $hasil->nama;
            $row[] = $hasil->aktifitas;
           $data[] = $row;
           $no += 1;
        }
        echo json_encode(array("data"=>$data));

  }

    public function logout(){
  		$this->session->sess_destroy();

      //log     
      $log = array(
        'waktu' => date('Y-m-d H:i:s'),
        'aktifitas' => "Logout",
        'id' => $this->session->userdata('uid')
      );
      $this->db->insert('activity', $log);


  		redirect(base_url('App'));
  	}



    function nonaktifkan_menu(){
      $data = array(
        'status' => "nonaktif"
      );
      $this->db->where('id_menu', $this->input->post('id'));
      $x = $this->db->update('menu', $data);

       //log     
      $log = array(
        'waktu' => date('Y-m-d H:i:s'),
        'aktifitas' => "Menonaktifkan menu ID: ".$this->input->post('id'),
        'id' => $this->session->userdata('uid')
      );
      $this->db->insert('activity', $log);

      echo json_encode(true);
    }

    function aktifkan_menu(){
      $data = array(
        'status' => "aktif"
      );
      $this->db->where('id_menu', $this->input->post('id'));
      $x = $this->db->update('menu', $data);


       //log     
      $log = array(
        'waktu' => date('Y-m-d H:i:s'),
        'aktifitas' => "Mengaktifkan menu ID: ".$this->input->post('id'),
        'id' => $this->session->userdata('uid')
      );
      $this->db->insert('activity', $log);

      echo json_encode(true);
    }






}
