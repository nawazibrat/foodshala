<?php
class Admin extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') != TRUE )
        {
            redirect('login');
        }
        if($this->session->userdata('role') != 2)
        {
            redirect('home');
        }
        $this->load->model('Item_model');
    }

    public function index()
    {
        
        $items=$this->Item_model->get_item($this->session->userdata('id'));
        $this->load->view('admin/dashboard',['items'=>$items]);
    }

    public function add_item()
    {
        $this->load->view('admin/add_item');
    }
    public function store_item()
    {
        $config = [
            'upload_path'   => './uploads/',
            'allowed_types' => 'jpeg|jpg|png',
        ];
        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Menu Name','required');
        $this->form_validation->set_rules('price','Menu Price','required|decimal');

        if( $this->form_validation->run() && $this->upload->do_upload('image'))
        {
            $item=$this->input->post();
            $data = $this->upload->data();
            $image_path = base_url("uploads/".$data['raw_name'].$data['file_ext']);
            $item['image_path'] = $image_path;
            $this->message(
                $this->Item_model->store_item($item),
                "Menu item added successfully",
                "Menu item failed to add to database"
            );
        }
        else
        {
            $upload_error= $this->upload->display_errors();
            $this->load->view('admin/add_item',compact('upload_error'));
        }
    }
    public function edit_item($id)
    {        
        $menu=$this->Item_model->find_item($id);
        $this->load->view('admin/edit_item',['menu'=>$menu]);
    }
    public function update_item($id)
    {
        $item=$this->input->post();
        $this->message(
            $this->Item_model->update_item($item,$id),
            "Menu item updated successfully",
            "Menu item failed to update into database"
        );
    }
    public function delete_item()
    {
        $item_id=$this->input->post();
        $this->message(
                        $this->Item_model->drop_item($item_id['id']),
                        "Menu item deleted successfully",
                        "Menu item failed to delete from database"
        );
    }

    private function message($success,$successMsg,$failMsg)
    {
        if($success)
        {
            $this->session->set_flashdata('info',$successMsg);
            $this->session->set_flashdata('info_class','alert-success');
        }
        else
        {
            $this->session->set_flashdata('info',$failMsg);
            $this->session->set_flashdata('info_class','alert-danger');
        }
        redirect('Admin');
    }
}