<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Track extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
		$this->_checkLogin();
	}
 	 
 	/* Retrieve
 	 */
	function index()
	{
		$this->load->model('track_mdl'); 
		$data['title'] = 'CC8 Track'; 
		$this->load->view('admin/track/listtrack_vw', $data);
	}

	/* ADD track
	 */
	function add()
	{
		$data['title'] = 'Add New Track';
		$this->load->model('track_mdl'); 
		if($this->input->post('submit'))
		{ 
			$this->form_validation->set_rules('title', 'title', 'required|xss_clean');
			$this->form_validation->set_rules('description', 'description', 'required'); 
			if ($this->form_validation->run() == TRUE)
			{   
				$query = $this->track_mdl->insert();
				if( $query )
				{  
					$data['message'] = 'You have successfully added new data'; 
				}
			}    
		} 
		$this->load->view('admin/track/addtrack_vw', $data);
	}

 
	function remove()
	{ 
		$this->load->model('track_mdl');  
		if( $this->input->post('hidid')){
			if( $this->track_mdl->remove()){
				$this->session->set_userdata('success', 'You have successfully deleted 1 record'); 
			}
		}
		redirect( base_url('track') );
	}

	/* Login AUTH
	 */
	function _checkLogin()
	{		
		if( ! $this->session->userdata('userid'))
		{ redirect(base_url('auth/login')); }  
	}
 }