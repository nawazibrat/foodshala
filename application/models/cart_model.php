<?php

class cart_model extends CI_Model{

    function get_item($id)
    {
        $query = $this->db->select('*')
                            ->from('carts')
                            ->where('carts.user_id',$id)
                            ->where('carts.status',0)
                            ->join('foods','foods.id = carts.food_id')
                            ->get();

        return $query->result();
    }

    function store_item($food_id,$user_id)
    {
        $query = $this->db->insert('carts', array('user_id' => $user_id, 
                                         'food_id' => $food_id,
                                         'quantity' => 1,
                                         'price' => $this->session->userdata('unit_price'),
                                         'status'=> 0,
                                         'sub_total' => $this->session->userdata('unit_price') ));
        return $query;
    }

    function remove_item($food_id,$user_id)
    {
        return $this->db->delete('carts', ['food_id'=>$food_id, 'user_id'=>$user_id]);
    }

    function place_order($user_id)
    {
        return $this->db->where('user_id',$user_id)->update('carts', array('status' => 1));
    }

    function get_order($user_id)
    {
        $query = $this->db->select('*')
                            ->from('carts')
                            ->where('carts.user_id',$user_id)
                            ->where('carts.status',1)
                            ->join('foods','foods.id = carts.food_id')
                            ->get();

        return $query->result();
    }
}