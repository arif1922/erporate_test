<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/JWT.php';

class Api extends REST_Controller {



  function __construct(){
    parent::__construct();
    $this->load->database();
    foreach (getallheaders() as $name => $value) {
      if ($name == 'username')
        $this->Username = $value;
      if ($name == 'password')
        $this->Password = $value;
    }
  }




  public function login_post(){
    if (!$this->Username || !$this->Password){
      echo json_encode(array("status"=>false, "message" => 'Bad Request.')); die();}

   
    $this->db->where('username', $this->Username);
    $this->db->where('password', md5($this->Password));
    $hasil = $this->db->get('user')->row();

    if ($hasil) {
      echo json_encode(array("status"=>true, "username"=>$hasil->username, "level"=>$hasil->level, "nama"=>$hasil->nama)); die();
    }
    else{
      echo json_encode(array("status"=>false, "message" => 'Akun tidak terdaftar')); die();
    }
  }

  public function makanan_get(){
    $this->db->where('tipe', 'makanan');
    $hasil = $this->db->get('menu')->result();

    if ($hasil) {
      echo json_encode(array("status"=>true, "data"=>$hasil)); die();
    }
    else{
      echo json_encode(array("status"=>false, "data" => 'Menu makanan kosong')); die();
    }
  }


}
