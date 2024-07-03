<?php

class Peoples extends CI_Controller {

    public function index()
    { 
        $data['judul'] = 'List of Peoples';

        $this->load->model('Peoples_model', 'peoples');

        //load library
        $this->load->library('pagination');

        //ambil data keyword
        if($this->input->post('submit')){
            $data['keyword'] = $this->input->post('keyword');
            $this->session->userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        //config
        // $this->db->like('name', $data['keyword']);
        // $this->db->or_like('email', $data['keyword']);
        $this->db->from('peoples');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 8;


        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['peoples'] = $this->peoples->getPeople($config['per_page'], $data['start'], $data['keyword']);
        
        $this->load->view('templates/header', $data);
        $this->load->view('peoples/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data People';
        $this->load->model('Peoples_model', 'peoples');
        $data['people'] = $this->peoples->getPeopleById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('peoples/detail', $data);
        $this->load->view('templates/footer');
    }


    public function edit($id)
    {
        $data['judul'] = 'Form Edit Data People';
        $this->load->model('Peoples_model', 'peoples');
        $data['people'] = $this->peoples->getPeopleById($id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('peoples/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->peoples->ubahDataPeople();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('peoples');
        }
    }

    public function hapus($id)
    {
        $this->load->model('Peoples_model', 'peoples');
        $this->peoples->hapusDataPeople($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('peoples');
    }
    


}