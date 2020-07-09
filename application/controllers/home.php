<?php

class Home extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role') == 2)
        {
            redirect('admin');
        }
    }

    public function index()
    {   
        $this->load->model('Show_model');

        $this->load->library('pagination');
        $config = [
            'base_url'   => base_url('home/index'),
            'per_page'   => 10,
            'total_rows' => $this->Show_model->num_rows(),
        ];
        
        $this->pagination->initialize($config);
        $items=$this->Show_model->get_item($config['per_page'], $this->uri->segment(3));
        $this->load->view('public/index_food',['items'=>$items]);
    }

    public function show_invidual($id)
    {   
        $this->load->model('Show_model');
        $item_by_id=$this->Show_model->get_item_by_id($id);
        $this->load->view('public/show_item',['item'=>$item_by_id]);
    }
}