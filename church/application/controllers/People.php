<?php defined('BASEPATH') OR exit('No direct script access allowed');

class People extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
		$this->_checkLogin();
	}
 	
 	public function index()
 	{
 		$this->viewList();
 	}
 
	/* CRUD
	 */
	function add()
	{
		$data['title'] = 'Add New People';
		$this->load->model('people_mdl' , 'peoplemdl'); 
		if($this->input->post('lastname'))
		{ 
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('birthday', 'Birthday', 'required');
			if ($this->form_validation->run() == TRUE)
			{   
				if($this->peoplemdl->insert())
				{ 
					if( $this->input->post('store'))
						redirect(base_url('people'));
					else
					{
						$data['message'] = 'You have successfully added new data';
					}
				}
			}    
		} 
		$this->load->view('admin/people/addpeople_vw', $data);
	}
 	
 	/* Retrieve
 	 */
	function viewList()
	{
		$data['title'] = 'People List';
		$this->load->model('people_mdl' , 'peoplemdl'); 
		$this->load->view('admin/people/listpeople_vw', $data);
	}

	/* Login AUTH
	 */
	function _checkLogin()
	{		
		if( ! $this->session->userdata('userid'))
		{ redirect(base_url('auth/login')); }  
	}
}
/*  end of file  */