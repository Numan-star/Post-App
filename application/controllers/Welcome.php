<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    // for admin
    public function index()
    {
        $this->load->model('Admin_model');
        if (empty($this->session->userdata['admin'])) {
            redirect(base_url() . 'panel');
        }
        $users = $this->Admin_model->getUsers();
        $data = [];
        $data['users'] = $users;

        $this->load->view('admin/home', $data);
    }

    public function user()
    {
        $this->load->model('Post_model');
        if (empty($this->session->userdata['user'])) {
            redirect(base_url() . 'panel');
        }
        $user = $this->session->userdata['user'];
        $id = $user['user_id'];
        $data['id'] = $user['user_id'];
        $data['name'] = $user['username'];
        $pic = $this->Post_model->getProfilePic($id);
        $data['pic'] = $pic;
        $this->load->view('users/header', $data);
        $this->load->view('users/welcome', $data);
        $this->load->view('users/footer', $data);
    }

    public function home()
    {
        $this->load->model('Post_model');

        $user = $this->session->userdata['user'];
        $id = $user['user_id'];
        $data['id'] = $user['user_id'];
        $data['name'] = $user['username'];

        $pic = $this->Post_model->getProfilePic($id);
        $data['pic'] = $pic;

        $this->load->view('users/header', $data);
        $this->load->view('users/section', $data);
        $this->load->view('users/footer', $data);
    }

    public function userProfilePic()
    {
        $this->load->model('Post_model');

        $user = $this->session->userdata['user'];
        $id = $user['user_id'];
        $data['id'] = $user['user_id'];
        $data['name'] = $user['username'];

        $pic = $this->Post_model->getProfilePic($id);
        $data['pic'] = $pic;
        if (empty($pic)) {
            $data['check'] = false;
        } else {
            $data['check'] = true;
        }

        $this->load->view('users/header', $data);
        $this->load->view('users/profilePic', $data);
        $this->load->view('users/footer', $data);
    }

    public function deletePic($id)
    {
        $this->load->model('Post_model');
        $this->Post_model->deletePic($id);
        redirect('welcome/userProfilePic');
    }

    public function insertPicture()
    {
        $config['upload_path'] = './profilepic/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $this->session->set_flashdata('failure', $this->upload->display_errors());
            redirect(base_url() . 'welcome/userProfilePic');
        } else {
            $this->load->model('Post_model');
            $upload_data = $this->upload->data();
            $formArray = array();
            $formArray['user_id'] = $this->input->post('userId');
            $formArray['img'] = $upload_data['file_name'];
            $this->Post_model->insertPic($formArray);
            $this->session->set_flashdata('success', 'Your Pic Successfully Uploaded');
            redirect(base_url() . 'welcome/userProfilePic');
        }
    }

    public function changepass()
    {
        $this->load->model('Post_model');
        $this->load->model('Admin_model');
        $this->form_validation->set_rules('oldpass', 'Old Password', 'required');
        $this->form_validation->set_rules('newpass', 'New Password', 'required');
        $this->form_validation->set_rules('confpass', 'Confirm Password', 'required|matches[newpass]');

        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata['user'];
            $id = $user['user_id'];
            $data['id'] = $user['user_id'];
            $data['name'] = $user['username'];
            $pic = $this->Post_model->getProfilePic($id);
            $data['pic'] = $pic;
            $this->load->view('users/header', $data);
            $this->load->view('users/change_password', $data);
            $this->load->view('users/footer');
        } else {
            $user_id = $this->input->post('id');
            $oldpass = $this->input->post('oldpass');
            $newpass = $this->input->post('newpass');
            $row = $this->Admin_model->getUser($user_id);
            if ($oldpass == $row['password']) {
                $this->Post_model->updatepass($newpass, $row['user_id']);
                $this->session->set_flashdata('success', 'Password updated successfully!');
                redirect(base_url() . 'welcome/changepass');
            } else {
                $this->session->set_flashdata('failure', 'Old Password not match');
                redirect(base_url() . 'welcome/changepass');
            }
        }
    }

    // for admin and user
    public function signOut()
    {
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('user');
        redirect(base_url() . 'panel');
    }
}
