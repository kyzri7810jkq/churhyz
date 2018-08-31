<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Track_mdl extends CI_Model {
	  
	var $offset    = 0;
	var $per_page  = 10;
	var $limit     = '';

	function insert()
	{ 
		$data = [
			'title'  => $this->input->post('title'),
			'description' => $this->input->post('description'), 
		]; 
		return	$this->db->insert('tracktbl', $data); 
	}


	function listAll()
	{
		return $this->db->select('*')->get('tracktbl');
	}

	function remove()
	{ 
		return $this->db->delete('tracktbl', ['track_id' => $this->input->post('hidid') ]);
	}
}