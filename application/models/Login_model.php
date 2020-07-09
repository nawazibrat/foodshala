<?php

class Login_model extends CI_Model{

    function check_user($email,$password)
    {
        $query = $this->db->get_where('users', array('email' => $email, 'password' => md5($password)));
        return $query;
    }

    function add_user($data)
    {
        $query = $this->db->insert('users', array('full_name' => $data['full_name'],
                                         'email' => $data['email'],
                                         'password' => md5($data['password']),
                                         'food_type' => $data['food_type'],
                                         'role' => $data['role']));
        return $query;
    }

    function add_admin($data)
    {
        $user = $this->db->insert('users', array('full_name' => $data['full_name'],
                                         'email' => $data['email'],
                                         'password' => md5($data['password']),
                                         'food_type' => 2,
                                         'role' => $data['role']));

        $get_user = $this->db->get_where('users', array('email' => $data['email']));
        $id = $get_user->row_array();

        $resturant = $this->db->insert('resturant', array('resturant_name' => $data['resturant_name'],
                                         'address' => $data['address'],
                                         'user_id' => $id['id'] ));
        return $resturant;
    }
}