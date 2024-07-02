<?php 
    class Siswa_model extends CI_Model{
        public function getAllSiswa(){
            return $this->db->get('siswa')->result_array();
        }
    }
?>