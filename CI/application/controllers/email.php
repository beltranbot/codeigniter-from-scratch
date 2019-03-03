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
        $this->load->view('newsletter');

    }

    public function send()
    {
        $this->load->library('form_validation');

        // field name
        // error message
        // validation rules
        $this->form_validation->set_rules(
            'name',
            'Name',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'email',
            'Email Address',
            'trim|required|valid_email'
        );

        if (!$this->form_validation->run()) {
            $this->load->view('newsletter');
        } else {
            // validation has passed. Now send the email
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $this->load->library('email');
    
            $this->email->initialize();
    
            $this->email->from('email@example.com', 'Your Name');
            $this->email->to($email);
            // $this->email->cc('another@another-example.com');
            // $this->email->bcc('them@their-example.com');
            $this->email->subject('Test newsletter signup confirmation.');
            $this->email->message("$name, you have now signed up");
    
            // attachment
            $path = $this->config->item('server_root');
            $file = $path . 'codeigniter/CI/attachments/newsletter1.txt';
    
            $this->email->attach($file);

            if ($this->email->send()) {
                // echo "Your email was sent!"
                $this->load->view('signup_confimation_view');
            } else {
                echo $this->email->print_debugger();
            }
    
        }

    }
}
