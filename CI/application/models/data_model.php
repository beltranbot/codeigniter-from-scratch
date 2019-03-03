<?php

class Data_model extends CI_model
{
    
    // using a sql query
    function getAll1() {
        $q = $this->db->query("select * from data");

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    // using active records
    function getAll2() {
        $q = $this->db->get('data');

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    // getting one some of the data
    function getAll3() {
        $this->db->select('title, contents');
        $q = $this->db->get('data');

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    // sanitizing user inputs
    function getAll4() {
        $sql = "select title, author, contents from data where id = ? and author like ?";
        $q = $this->db->query($sql, [3, '%3%']);

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }


    function getAll5() {
        $id = 4;
        $this->db->select('title, contents');
        $this->db->from('data');
        $this->db->where('id', $id);

        $q = $this->db->get();

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
