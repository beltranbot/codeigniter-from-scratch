<?php

class Contact extends CI_controller
{
    public function index()
    {
        $data['main_content'] = 'contact_form';
        $this->load->view('includes/template', $data);
    }

    function submit()
    {
        $data['main_content'] = 'contact_submitted';
        // check method of the request
        // $this->input->server('REQUEST_METHOD')
        if ($this->input->is_ajax_request()) {
            $this->load->view($data['main_content']);
        } else {
            $this->load->view('includes/template', $data);   
        }

    }
}
