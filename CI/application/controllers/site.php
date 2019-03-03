<?php

class Site extends CI_controller {
    function index() {
        $this->load->model('data_model');
        $data['rows'] = $this->data_model->getAll5();

        $this->load->view('home', $data);
    }
}