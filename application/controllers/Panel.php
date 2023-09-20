<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{
    // for admin and user
    public function index()
    {
        $this->load->model('Admin_model');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('home');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $admin = $this->Admin_model->adminlogin($username, $password);
            $user = $this->Admin_model->userlogin($username, $password);

            if (!empty($admin)) {
                $this->session->set_userdata('admin', $admin);
                redirect(base_url() . 'welcome');
            } elseif (!empty($user)) {
                $this->session->set_userdata('user', $user);
                redirect(base_url() . 'welcome/home');
            } else {
                $this->session->set_flashdata('errorMsg', 'Either Username/Password is incorrect');
                redirect(base_url());
            }
        }
    }

    // for user
    public function register()
    {
        $this->load->model('Admin_model');
        $countries = $this->Admin_model->getCountries();
        $data = [];
        $data['countries'] = $countries;
        $this->load->view('registerUser', $data);
    }

    // for admin
    public function edit($id)
    {
        $this->load->model('Admin_model');

        $user = $this->Admin_model->getUser($id);
        $countries = $this->Admin_model->getCountries();
        $states = $this->Admin_model->getStatesOfACountry($user['country']);
        $cities = $this->Admin_model->getCitiesOfAState($user['state']);

        $data = [];
        $data['countries'] = $countries;
        $data['user'] = $user;
        $data['states'] = $states;
        $data['cities'] = $cities;
        $this->load->view('admin/edit', $data);
    }

    // for admin
    public function updateUser($id)
    {
        $this->load->model('Admin_model');

        $this->load->library('form_validation');
        $response = [];

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('username', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');

        if ($this->form_validation->run() == true) {
            $formData = [];
            $formData['username'] = $this->input->post('username');
            $formData['email'] = $this->input->post('email');
            $formData['country'] = $this->input->post('country');
            $formData['state'] = $this->input->post('state');
            $formData['city'] = $this->input->post('city');
            $this->Admin_model->updateUser($id, $formData);
            $response['status'] = 1;
            $this->session->set_flashdata('success', 'Your information is Successfully Updated');
        } else {

            $response['username'] = form_error('username');
            $response['email'] = form_error('email');
            $response['country'] = form_error('country');
            $response['state'] = form_error('state');
            $response['city'] = form_error('city');
            $response['status'] = 0;
        }

        echo json_encode($response);
    }

    // for admin
    public function getStates()
    {
        $country_id = $this->input->post('country_id');
        $this->load->model('Admin_model');
        $states = $this->Admin_model->getStatesOfACountry($country_id);

        $data = [];
        $data['states'] = $states;
        $statesString = $this->load->view('states-select', $data, true);

        $response['states'] = $statesString;
        echo json_encode($response);
    }

    // for admin
    public function getCities()
    {
        $state_id = $this->input->post('state_id');
        $this->load->model('Admin_model');
        $cities = $this->Admin_model->getCitiesOfAState($state_id);

        $data = [];
        $data['cities'] = $cities;
        $citiesString = $this->load->view('cities-select', $data, true);

        $response['cities'] = $citiesString;
        echo json_encode($response);
    }

    // for admin
    public function saveUser()
    {
        $this->load->model('Admin_model');

        $this->load->library('form_validation');
        $response = [];

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('username', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');

        if ($this->form_validation->run() == true) {
            $formData = [];
            $formData['username'] = $this->input->post('username');
            $formData['password'] = $this->input->post('password');
            $formData['email'] = $this->input->post('email');
            $formData['country'] = $this->input->post('country');
            $formData['state'] = $this->input->post('state');
            $formData['city'] = $this->input->post('city');
            $formData['dob'] = $this->input->post('dob');
            $this->Admin_model->addUser($formData);
            $response['status'] = 1;
            $this->session->set_flashdata('success', 'Your Account is Successfully Created Now You Can Easly Login');
        } else {

            $response['username'] = form_error('username');
            $response['password'] = form_error('password');
            $response['email'] = form_error('email');
            $response['country'] = form_error('country');
            $response['state'] = form_error('state');
            $response['city'] = form_error('city');
            $response['status'] = 0;
        }

        echo json_encode($response);
    }
}
