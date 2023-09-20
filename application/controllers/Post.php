<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{
    // all for user
    public function deletePost($post_id)
    {

        $this->load->model('Post_model');

        $user = $this->session->userdata['user'];
        $id = $user['user_id'];
        $post = array();
        $post = $this->Post_model->getOnePost($post_id);
        if (empty($post) || ($id != $post['user_id'])) {
            $this->session->set_flashdata('failure', 'No Post Found!');
            redirect('post/viewYourPost');
        }
        $this->Post_model->deletePost($post_id);
        $this->session->set_flashdata('success', 'Post deleted successfully!');
        redirect('post/viewYourPost');
    }

    public function createPost()
    {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $this->session->set_flashdata('failure', $this->upload->display_errors());
            redirect(base_url() . 'welcome/user');
        } else {
            $this->load->model('Post_model');
            $upload_data = $this->upload->data();
            $formArray = array();
            $formArray['user_id'] = $this->input->post('userId');
            $formArray['post'] = $this->input->post('post');
            $formArray['imgpath'] = $upload_data['file_name'];
            $this->Post_model->insertPost($formArray);
            $this->session->set_flashdata('success', 'Your Post is now Online');
            redirect(base_url() . 'welcome/user');
        }
    }

    public function editPost($post_id)
    {
        $this->load->model('Post_model');
        $this->form_validation->set_rules('post', 'Post', 'trim|required');

        $user = $this->session->userdata['user'];
        $id = $user['user_id'];

        $post = array();
        $post = $this->Post_model->getOnePost($post_id);
        if (empty($post) || ($id != $post['user_id'])) {
            $this->session->set_flashdata('failure', 'No Post Found!');
            redirect('post/viewYourPost');
        }
        $data['post'] = $post;

        $pic = $this->Post_model->getProfilePic($id);
        $data['pic'] = $pic;
        $data['id'] = $user['user_id'];
        $data['name'] = $user['username'];

        if ($this->form_validation->run() == false) {
            $this->load->view('users/header', $data);
            $this->load->view('users/editPost', $data);
            $this->load->view('users/footer', $data);
        } else {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $this->session->set_flashdata('failure', $this->upload->display_errors());
                redirect(base_url() . 'post/editPost/' . $post_id);
            } else {
                $upload_data = $this->upload->data();
                $formArray = array();
                $formArray['post'] = $this->input->post('post');
                $formArray['imgpath'] = $upload_data['file_name'];

                $this->Post_model->updatePost($post_id, $formArray);
                $this->session->set_flashdata('success', 'Post updated successfully!');
                redirect('post/viewYourPost');
            }
        }
    }

    public function viewYourProfile()
    {
        $this->load->model('Post_model');

        $user = $this->session->userdata['user'];
        $id = $user['user_id'];
        $data['id'] = $user['user_id'];
        $data['name'] = $user['username'];

        $pic = $this->Post_model->getProfilePic($id);
        if (empty($pic)) {
            $data['pic'] = false;
        } else {
            $data['pic'] = $pic;
        }
        $data['user'] = $user;
        $this->load->view('users/header', $data);
        $this->load->view('users/userProfile', $data);
        $this->load->view('users/footer');
    }

    public function viewYourPost()
    {
        $this->load->model('Post_model');
        $user = $this->session->userdata['user'];
        $id = $user['user_id'];
        $data['id'] = $user['user_id'];
        $data['name'] = $user['username'];
        $posts = array();
        $pic = $this->Post_model->getProfilePic($id);
        $data['pic'] = $pic;
        $posts = $this->Post_model->getPost($id);
        $data['posts'] = $posts;

        $this->load->view('users/header', $data);
        $this->load->view('users/listPost', $data);
        $this->load->view('users/footer');
    }

    public function viewOtherPost()
    {
        $this->load->model('Post_model');
        $this->load->model('Comment_model');
        $posts = array();
        $posts = $this->Post_model->getAllPost();
        $data['posts'] = $posts;
        $comments = array();
        $comments = $this->Comment_model->getAllComments();
        $data['comments'] = $comments;
        $user = $this->session->userdata['user'];
        $id = $user['user_id'];
        $data['id'] = $user['user_id'];
        $pic = $this->Post_model->getProfilePic($id);
        $data['pic'] = $pic;
        $data['name'] = $user['username'];
        $this->load->view('users/header', $data);
        $this->load->view('users/listOtherPost', $data);
        $this->load->view('users/footer');
    }

    public function comment($post_id)
    {
        if (empty($this->input->post('comment'))) {
            $this->session->set_flashdata('failure', 'Comment should not be blank');
            redirect(base_url() . 'post/viewOtherPost');
        } else {
            $this->load->model('Comment_model');
            $user = $this->session->userdata['user'];
            $id = $user['user_id'];
            $form_array = array();
            $form_array['user_id'] = $id;
            $form_array['post_id'] = $post_id;
            $form_array['comment'] = $this->input->post('comment');

            $user = $this->Comment_model->insertComment($form_array);
            redirect(base_url() . 'post/viewOtherPost');
        }
    }

    // public function comment()
    // {
    //     $this->load->model('Comment_model');
    //     // $this->load->library('form_validation');
    //     // $this->form_validation->set_rules('name', 'Name', 'required');
    //     // $this->form_validation->set_rules('color', 'Color', 'required');
    //     // $this->form_validation->set_rules('price', 'Price', 'required');

    //     // if ($this->form_validation->run() == true) {
    //     $postId = $this->input->post('postId');
    //     $formArray = array();
    //     $formArray['user_id'] = $this->input->post('userId');
    //     $formArray['post_id'] = $this->input->post('postId');
    //     $formArray['comment'] = $this->input->post('comment');
    //     $idRow = $this->Comment_model->insertComment($formArray);

    //     $row = $this->Comment_model->getRow($idRow);
    //     $vData['row'] = $row;
    //     $rowHtml = $this->load->view('users/comment_row', $vData, true);

    //     $response['row']     = $rowHtml;
    //     $response['status']  = 1;
    //     // $response['message'] = "<div class=\"alert alert-success\">Record has been added successfully.</div>";
    //     // } else {
    //     //     $response['status'] = 0;
    //     //     $response['name']   = strip_tags(form_error('name'));
    //     //     $response['color']  = strip_tags(form_error('color'));
    //     //     $response['price']  = strip_tags(form_error('price'));
    //     // }
    //     echo json_encode($response);
    // }
}
