<?php

class Cek_laundry Extends CI_Controller{

    public function index()
    {
        $this->load->view('frontend/header');
        $this->load->view('frontend/cek_laundry');
        $this->load->view('frontend/footer');

    }
    
}