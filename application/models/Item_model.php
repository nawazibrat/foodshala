<?php

class Item_model extends CI_Model{

    function get_item($id)
    {
        $query = $this->db->get_where('foods', array('user_id' => $id));
        return $query->result();
    }

    function store_item($data)
    {
        $query = $this->db->insert('foods', array('user_id' => $data['id'], 
                                         'food_name' => $data['name'],
                                         'food_price' => $data['price'],
                                         'food_desc' => $data['description'],
                                         'image_relative_path' => $data['image_path'],
                                         'type' => $data['type']));
        return $query;
    }

    function find_item($id)
    {
        $query = $this->db->get_where('foods', array('id' => $id));
        return $query->row();
    }

    function update_item($data,$id)
    {
        return $this->db->where('id',$id)->update('foods', array('food_name' => $data['name'],
                                                    'food_price' => $data['price'],
                                                    'food_desc' => $data['description'],
                                                    'type' => $data['type']));
    }

    function drop_item($id)
    {
        $details = $this->db->get_where('foods', array('id' => $id))->row();
        $this->load->helper('file');
        $str= trim($details->image_relative_path,'http://localhost/foodshala/');
        unlink($str);
        return $this->db->delete('foods', ['id'=>$id]);
    }
}