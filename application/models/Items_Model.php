<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items_Model extends CI_Model {

	public function __construct() { 
		parent::__construct(); 
		$this->load->database();
	} 

	public function getItemsByRange($from, $to){
		$this->db->where('quantity >=', $from);
		$this->db->where('quantity <=', $to);
		$query=$this->db->get('items');
		$result=$query->result();
		return $result;
	}
	
	public function getAllItems(){
		$query=$this->db->get('items');
		$result=$query->result();
		return $result;
	}

	public function AddItem($name){
		$this->name = $name; // please read the below note
        $this->quantity = 1;
        $this->db->insert('items', $this);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}

	public function RemoveItem($name){
		$this->db->delete('items', array('name' => $name));
		$flag = $this->db->affected_rows();
		return $flag;
	}

	public function DecrementItem($name){
		$this->db->where('name', $name);
		$this->db->set('quantity', 'quantity-1', FALSE);
		$this->db->update('items');
		$flag = $this->db->affected_rows();
		return $flag;
	}

	public function IncrementItem($name){
		$this->db->where('name', $name);
		$this->db->set('quantity', 'quantity+1', FALSE);
		$this->db->update('items');
		$flag = $this->db->affected_rows();
		return $flag;
	}

	public function EditItem($item){
		$data = array(
            "name" => $item['name'],
            "quantity" => $item['quantity']
    	);
		$this->db->where('id', $item['id']);
		$this->db->set($data, FALSE);
		$this->db->update('items');
		$flag = $this->db->affected_rows();
		return $flag;
	}
}
