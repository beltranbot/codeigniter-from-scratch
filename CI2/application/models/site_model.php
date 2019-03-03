<?php

class Site_model extends CI_model
{
    // get all records
    public function get_records()
    {
        $query = $this->db->get('data');
        return $query->result();
    }

    // insert a record
    public function add_record($data)
    {
        $this->db->insert('data', $data);
    }

    // update a record
    public function update_record($data)
    {
        $this->db->where('id', 1);
        $this->db->update('data', $data);
    }

    // delete a record
    public function delete_record()
    {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('data');
    }
}
