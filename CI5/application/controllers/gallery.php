<?php

class Gallery extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gallery_model');
    }

    public function index()
    {
        if ($this->input->post('upload')) {
            $this->gallery_model->do_upload();
        }

        $data['images'] = $this->gallery_model->get_images();
        $this->load->view('gallery', $data);
    }
}
