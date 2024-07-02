<?php 
    class Siswa extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Siswa_model');
            $this->load->helper();
            $this->load->helper('url');


        }
        
      
        public function index(){
            $data['judul'] = 'Daftar Siswa';
            $data['siswa'] = $this->Siswa_model->getAllSiswa();
            $this->load->view('templates/header', $data);
            $this->load->view('siswa/index');
            $this->load->view('templates/footer');
        }
        public function tambah(){
            $data['judul'] = 'Form Tambah Data Siswa';
            $this->load->view('templates/header', $data);
            $this->load->view('siswa/tambah');
            $this->load->view('templates/footer');
        }
    }
?>