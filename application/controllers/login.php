<?php

class Login extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index()
    {
        if($this->session->userdata('logged_in'))
        {
            if( $this->session->userdata('role') == 2)
            {
                redirect('Admin');
            }
            else
            {
                redirect('Home');
            }
        }
        $this->load->view('auth/signin');
    }
    
    function auth(){
        
        $email=$this->input->post('email',TRUE);
        $password=$this->input->post('password',TRUE);
        $result=$this->Login_model->check_user($email,$password);
        if($result->num_rows()>0)
        {
            $data=$result->row_array();
            $full_name=$data['full_name'];
            $id=$data['id'];
            $email=$data['email'];
            $food_type=$data['food_type'];
            $role=$data['role'];
            $sesdata=array(
                'id'        => $id,
                'full_name' => $full_name,
                'email'     => $email,
                'food_type' => $food_type,
                'role'      => $role,
                'logged_in'      => TRUE
            );
            $this->session->set_userdata($sesdata);
            if($role == 1)
            {
                redirect('Home');
            }
            elseif($role == 2)
            {
                redirect('Admin');
            }
        }     
        else {
            // echo "<script>alert('Access denied');history.go(-1)</script>";
            $this->session->set_flashdata('login_failed','Invalid email or password');
            redirect('login');
        }  
    }

    function logout()
    {
        $this->session->unset_userdata(['logged_in','email','full_name','food_type','role','is_in_cart','unit_price']);
        redirect('Login');
    }
}