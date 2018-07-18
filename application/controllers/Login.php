<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Login extends CI_Controller {

	

    public function __construct()
    {
            parent::__construct();
            $this->load->database();
            $this->load->library('session');
    }


    function index(){
	    $this->load->view('login');
	  }
	

	public function akses(){


		$username = $this->input->post('username');
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', hash('md5',$this->input->post('password')));
		$login = $this->db->get('user')->row();

		if ($login) {
				$session_data = array(
					'uid' => $login->uid,
					'level' => $login->level,
			        'nama' =>$login->nama,
				);
		        $this->session->set_userdata($session_data);
		        
			if ($login->level == 'kasir') {
		        echo json_encode(array("status"=> true, "page" => 'kasir'));
			}
	      	else{
		        echo json_encode(array("status"=> true, "page" => 'pelayan'));
			}
			 //log     
		      $log = array(
		        'waktu' => date('Y-m-d H:i:s'),
		        'aktifitas' => "Login",
		        'id' => $this->session->userdata('uid')
		      );
		      $this->db->insert('activity', $log);

		}
		else{
			echo json_encode(array("status"=> false, "message" => 'Username atau Password salah'));
			die();

		}

	}
}
