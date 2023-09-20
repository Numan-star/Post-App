<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment_model extends CI_model
{
    function insertComment($formArray)
    {
        $this->db->insert('comment', $formArray);
        return $id  = $this->db->insert_id();
    }

    public function getRow($id)
    {
        $this->db->where('comment_id', $id);
        $row = $this->db->get('comment')->row_array();
        return $row;
    }

    // public function all()
    // {
    //     $result = $this->db->order_by('id', 'ASC')->get('car_models')->result_array();
    //     return $result;
    // }

    function getAllComments()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('comment', 'comment.user_id = users.user_id');
        $this->db->order_by('comment_id', 'DESC');
        $comments = $this->db->get()->result_array();
        return $comments;
    }
}
