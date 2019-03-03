<?php

class Login extends CI_controller
{

    public function index()
    {
        $data['main_content'] = 'login_form';
        $this->load->view('includes/template', $data);
    }

    public function validate_credentials()
    {
        $this->load->model('membership_model');

        $validation_data = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
        ];

        // if the user credentials validated
        if ($this->membership_model->validate($validation_data)) {
            $session_data = [
                'username' => $validation_data['username'],
                'is_logged_in' => true,
            ];

            $this->session->set_userdata($session_data);

            redirect('site/members_area');
        } else {
            $this->index();
        }
    }

    public function signup()
    {
        $data['main_content'] = 'signup_form';
        $this->load->view('includes/template', $data);
    }

    public function create_member()
    {
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('first_name', 'Name', 'trim|required|max_length[25]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length:[25]');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|max_length[50]|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[23]');
        $this->form_validation->set_rules('password2', 'Password Confirm', 'trim|required|matches[password]');

        if (!$this->form_validation->run()) {
            $this->signup();
        } else {
            $this->load->model('membership_model');
            $new_member_data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email_address' => $this->input->post('email_address'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            ];
            if ($query = $this->membership_model->create_member($new_member_data)) {
                $data['main_content'] = 'signup_successful';
                $this->load->view('includes/template', $data);
            } else {
                $this->load->view('signup_form');
            }
        }
    }
}
