<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_model
{
    function insertPost($formArray)
    {
        $this->db->insert('post', $formArray);
    }

    function getOnePost($id)
    {
        $this->db->where('post_id', $id);
        $post = $this->db->get('post')->row_array();
        return $post;
    }

    function getUser($id)
    {
        $this->db->where('user_id', $id);
        $user = $this->db->get('users')->row_array();
        return $user;
    }

    function updatePost($id, $formArray)
    {
        $this->db->where('post_id', $id);
        $this->db->update('post', $formArray);
    }

    function deletePost($id)
    {
        $this->db->where('post_id', $id);
        $this->db->delete('post');
    }

    function getPost($id)
    {
        $this->db->where('user_id', $id);
        $posts = $this->db->get('post')->result_array();
        return $posts;
    }

    function getAllPost()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('post', 'post.user_id = users.user_id');
        $this->db->join('userprofilepic', 'userprofilepic.user_id = post.user_id');
        $this->db->order_by('post_id', 'DESC');
        $posts = $this->db->get()->result_array();
        return $posts;
    }

    function insertPic($formArray)
    {
        $this->db->insert('userprofilepic', $formArray);
    }

    function getProfilePic($id)
    {
        $this->db->where('user_id', $id);
        $pic = $this->db->get('userprofilepic')->row_array();
        return $pic;
    }

    function deletePic($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('userprofilepic');
    }

    function updatepass($newpass, $id)
    {
        $this->db->where('user_id', $id);
        $this->db->set('password', $newpass);
        $this->db->update('users');
    }
}
