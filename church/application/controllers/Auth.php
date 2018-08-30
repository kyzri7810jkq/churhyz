<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $message = '';

	public function login()
	{   
		$this->load->model('login_mdl' , 'loginmdl'); 
		if($this->input->post('login'))
		{   
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('username', 'username', 
				'required|xss_clean|trim|callback_check_login'); 
			if ($this->form_validation->run() == TRUE)
			{       
				list($data) = $this->loginmdl->check_login()->result();
				$data = array(
					'userid' => $data->user_id
				);
				$this->session->set_userdata($data);
				redirect(base_url('dashboard'));
				return;
			} 
		} 
		$data = array('message' => $this->message);
		$this->load->view('admin/login_vw'  , $data); 
	}

	function check_login()
	{
		$this->load->model('login_mdl' , 'loginmdl');   
     	if($this->loginmdl->check_login()->num_rows() == 1){   
         	return true; 
     	}else{ 
	        $this->form_validation->set_message('check_login', 'Invalid Username or Password'); 
	        return false; 
	     } 
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}