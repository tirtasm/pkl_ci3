<?php

class Peoples_model extends CI_Model
{
    public function getAllPeoples()
    {
        return $this->db->get('peoples')->result_array();
    }
    public function getPeople($limit, $start)
    {
        return $this->db->get('peoples', $limit, $start)->result_array();

    }
    public function countAllPeoples()
    {
        return $this->db->get('peoples')->num_rows();
    }
    public function getPeopleById($id)
    {
        return $this->db->get_where('peoples', ['id' => $id])->row_array();
    }
    public function ubahDataPeople()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "alamat" => $this->input->post('alamat', true),
            "email" => $this->input->post('email', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('peoples', $data);
    }
        public function hapusDataPeople($id)
        {
            // $this->db->where('id', $id);
            $this->db->delete('peoples', ['id' => $id] );
        }

}