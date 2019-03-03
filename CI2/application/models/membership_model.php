<?php

class Membership_model extends CI_model
{
    public function validate($validation_data)
    {
        $this->db->where('username', $validation_data['username']);
        $this->db->where('password', $validation_data['password']);

        $query = $this->db->get('membership');

        if ($query->num_rows == 1) {
            return true;
        }

        return false;
    }

    public function create_member($new_member_data) {
        $insert = $this->db->insert('membership', $new_member_data);
        return $insert;
    }
}
