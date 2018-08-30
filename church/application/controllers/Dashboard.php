<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
		$this->_checkLogin();
	}
	public function index()
	{
		$this->_loadModels();
		$this->_loadTemplate();
	}
	function _loadModels()
	{
		$this->load->model('users_mdl' , 'usersmdl'); 
	}
	function _checkLogin()
	{		
		if( ! $this->session->userdata('userid'))
		{ redirect(base_url('auth/login')); }  
	}
	function _loadTemplate()
	{ 
		$this->load->view('admin/template/dashboard_vw');
	}
}

/*  end of file  */