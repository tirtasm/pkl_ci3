<?php

class Peoples extends CI_Controller
{
    
    public function index()
    {
        $data['judul'] = "List of Peoples";
        $this->load->model("Peoples_model", "peoples");

        //pagination
        $this->load->library("pagination");

        //config
        $config['base_url'] = "http://localhost/tugas_pkl_ci3/peoples/index";
        $config['total_rows'] = $this->peoples->countAllPeoples();
        $config['per_page'] = 8;

        //styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';    
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initialize
        $this->pagination->initialize($config);

        //get all data peoples
        // $data["peoples"] = $this->peoples->getAllPeoples();
        
        //get data limit
        $data['start'] = $this->uri->segment(3);
        $data['peoples'] = $this->peoples->getPeople($config['per_page'], $data['start']);

        $this->load->view("templates/header", $data);
        $this->load->view("peoples/index", $data);
        $this->load->view("templates/footer");
    }

    public function detail($id)
    {
        $this->load->model("Peoples_model", "peoples");
        $data["people"] = $this->peoples->getPeopleById($id);

        $data['judul'] = "Detail Data People";
        $this->load->view("templates/header", $data);
        $this->load->view("peoples/detail", $data);
        $this->load->view("templates/footer");
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model("Peoples_model", "peoples");
            $data["people"] = $this->peoples->getPeopleById($id);

            $data['judul'] = "Edit Data People";
            $this->load->view("templates/header", $data);
            $this->load->view("peoples/edit", $data);
            $this->load->view("templates/footer");
        } else {
            $this->load->model("Peoples_model", "peoples");
            $this->peoples->ubahDataPeople();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('peoples');
        }
        
    }
    
    public function hapus($id)
    {   
        $this->load->model("Peoples_model", "peoples");
        $data["people"] = $this->peoples->getPeopleById($id);
        $this->peoples->hapusDataPeople($id);
        redirect('peoples');

    }

}