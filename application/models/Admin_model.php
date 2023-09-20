<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model
{
    function adminlogin($username, $password)
    {
        $this->db->where('admin', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin');
        $admin = $query->row_array();
        return $admin;
    }

    function userlogin($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        $user = $query->row_array();
        return $user;
    }

    function getUsers()
    {
        $users = $this->db->get('users')->result_array();
        return $users;
    }

    function getUser($id)
    {
        $this->db->where('user_id', $id);
        $user = $this->db->get('users')->row_array();
        return $user;
    }

    function addUser($formArray)
    {
        $this->db->insert('users', $formArray);
    }

    function updateUser($id, $formArray)
    {
        $this->db->where('user_id', $id);
        $this->db->update('users', $formArray);
    }

    function getCountries()
    {
        $countries = $this->db->get('countries')->result_array();
        return $countries;
    }

    function getStatesOfACountry($country_id)
    {
        $this->db->where('country_id', $country_id);
        $states = $this->db->get('states')->result_array();
        return $states;
    }

    function getCitiesOfAState($state_id)
    {
        $this->db->where('state_id', $state_id);
        $cities = $this->db->get('cities')->result_array();
        return $cities;
    }
}
