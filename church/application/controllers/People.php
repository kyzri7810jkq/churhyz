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
 	
 	/* EDIT
	 */
	function edit()
	{
		$data['title'] = 'Edit People';
		$this->load->model('people_mdl' , 'peoplemdl'); 
		$peps =  $this->peoplemdl->getPerson();
		if($peps->num_rows() < 1)
		{ 
			redirect(base_url('people'));
			exit;
		} 
		if($this->input->post('update'))
		{ 
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('birthday', 'Birthday', 'required');
			if ($this->form_validation->run() == TRUE)
			{   
				if($this->peoplemdl->update())
				{  
					$data['message'] = 'You have successfully updated data'; 
				}
			}    
		} 
		$data['peps'] = $peps;
		$this->load->view('admin/people/editpeople_vw', $data);  
	}
 	

 	/* Retrieve
 	 */
	function viewList()
	{
		$this->load->model('people_mdl' , 'peoplemdl'); 
		$data['title'] = 'People List'; 
		$this->load->view('admin/people/listpeople_vw', $data);
	}
	/* Search
 	 */
	function search()
	{
		$this->load->model('people_mdl' , 'peoplemdl'); 
		$data['title'] = 'Search'; 
		$this->load->view('admin/people/listpeople_vw', $data);
	}

	function remove()
	{ 
		$this->load->model('people_mdl' , 'peoplemdl');  
		if( $this->input->post('hidid')){
			if( $this->peoplemdl->remove()){
				$this->session->set_userdata('success', 'You have successfully deleted 1 record'); 
			}
		}
		redirect( base_url('people') );
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