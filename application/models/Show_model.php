<?php

class Show_model extends CI_Model{

    function get_item($limit,$offset)
    {
        $query = $this->db->get('foods',$limit,$offset);
        return $query->result();
    }

    function get_item_by_id($id)
    {
        $query = $this->db->get_where('foods', array('id' => $id))->row();
        $is_present = $this->db->get_where('carts', array('food_id' => $query->id, 'status'=>0))->row();
        if($is_present)
            $this->session->set_userdata('is_in_cart',true);
        else
            $this->session->set_userdata('is_in_cart',false);

        return $query;
    }

    function num_rows()
    {
        $query = $this->db->get('foods');
        return $query->num_rows();
    }
}