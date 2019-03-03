<?php

class Site extends CI_controller
{

    public function index()
    {
        $data = [];

        if ($query = $this->site_model->get_records()) {
            $data['records'] = $query;
        }

        $this->load->view('options_view', $data);
    }

    public function create()
    {
        $data = [
            'title' => $this->input->post('title'),
            'contents' => $this->input->post('content'),
        ];

        $this->site_model->add_record($data);

        $this->index();
    }

    public function update()
    {
        $data = [
            'title' => 'My freshly updated title',
            'contents' => 'Content should go here is updated'
        ];

        $this->site_model->update_record($data);

        $this->index();
    }

    public function delete()
    {
        $this->site_model->delete_record();
        $this->index();
    }
}
