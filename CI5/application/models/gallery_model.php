<?php

class Gallery_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->gallery_path = realpath(APPPATH . '../images');
        $this->gallery_path_url = base_url() . 'images/';
    }
    
    function do_upload()
    {
        $config = [
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path,
            'max_size' => 2000,
        ];
        $this->load->library('upload', $config);
        $this->upload->do_upload();

        $image_data = $this->upload->data();
    
        $config = [
            'source_image' => $image_data['full_path'],
            'new_image' => $this->gallery_path . '/thumbs',
            'maintain_ration' => true,
            'width' => 150,
            'height' => 100,
        ];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        
    }

    public function get_images()
    {
        $files = scandir($this->gallery_path);
        $files = array_diff($files, ['.', '..', 'thumbs']);

        $images = [];

        foreach ($files as $file) {
            $images[] = [
                'url' => $this->gallery_path_url . $file,
                'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file,
            ];
        }

        return $images;

    }
}