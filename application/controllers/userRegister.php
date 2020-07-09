<?php

class UserRegister extends MY_Controller{

    public function index()
    {  
        $this->load->view('auth/user_signup');
    }
    
    public function register_user()
    {    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('full_name','Full Name','required');
        $this->form_validation->set_rules('email','Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('confirm_password','Password Confirmation','required|matches[password]');
        
        if( $this->form_validation->run() )
        {
            $item=$this->input->post();
            $this->load->model('Login_model');
            unset($item['confirm_password']);
            if($this->Login_model->add_user($item))
            {
                $this->session->set_flashdata('success','Registered Successfully!! Please Login');
                redirect('Login');
            }   

        }
        else
        {
            $this->load->view('auth/user_signup');
        }
    }
}