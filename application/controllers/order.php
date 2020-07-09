<?php

class order extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role') == 2)
        {
            redirect('admin');
        }
        if(!$this->session->userdata('logged_in'))
        {
            redirect('login');
        }
    }

    public function index()
    {   
        $this->load->model('cart_model');
        $items=$this->cart_model->get_order($this->session->userdata('id'));
        $this->load->view('public/myOrders',compact('items'));
    }

    public function drop($food_id)
    {
        $this->load->model('cart_model');
        $items=$this->cart_model->remove_item($food_id,$this->session->userdata('id'));
        redirect('order');
    }
}