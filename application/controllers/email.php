<?php

/**
 * sends email with gmail
 */
class Email extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('email');

        $this->email->initialize();

        $this->email->from('email@example.com', 'Your Name');
        $this->email->to('beltranbot@gmail.com');
        // $this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        // attachment
        $path = $this->config->item('server_root');
        $file = $path . 'codeigniter/CI/attachments/yourinfo.txt';

        $this->email->attach($file);

        $this->email->send();

        echo $this->email->print_debugger();

    }
}
