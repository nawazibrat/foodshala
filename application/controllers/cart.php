<?php

class cart extends MY_Controller{

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
        $items=$this->cart_model->get_item($this->session->userdata('id'));
        $this->load->view('public/cart',compact('items'));
    }

    public function store($food_id)
    {   
        $this->load->model('cart_model');
        $item_by_id=$this->cart_model->store_item($food_id,$this->session->userdata('id'));
        $this->session->set_flashdata('success','Menu item added to your cart');
        redirect('Home/show_invidual/'.$food_id);
    }

    public function checkout()
    {   
        $this->load->model('cart_model');
        $items=$this->cart_model->place_order($this->session->userdata('id'));
        $this->session->set_flashdata('success','Your order has been placed');
        redirect('cart');
    }

    public function drop($food_id)
    {
        $this->load->model('cart_model');
        $items=$this->cart_model->remove_item($food_id,$this->session->userdata('id'));
        redirect('cart');
    }
}