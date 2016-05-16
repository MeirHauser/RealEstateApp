<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$id = $this->session->userdata('user_id');
		if ($id) {
			redirect('/angular');
		}
		else{
			$data = array(
			'errors' => $this->session->flashdata('error'),
			'logout' => $this->session->flashdata('logout'),
			'login' => $this->session->flashdata('login_message'),
		);
		$this->load->view('login', $data);
		}
		
	}
	public function login()
	{
		$this->load->model('login');
		$email = mysql_real_escape_string($_POST['email']);
	 	$password = mysql_real_escape_string($_POST['password']);
	 	$user_query = "SELECT * FROM users WHERE users.email = '{$email}'";
	 	$user = $this->login->get_user($email);
	 	if(!empty($user))
	 	{
	  		$encrypted_password = md5($password . '' . $user['salt']);
	  		if($user['password'] == $encrypted_password)
	  		{
	  			$this->session->set_userdata('user_id', $user['ID']);
	   			redirect('/angular');
	  		}
	  		else
	  		{	
	   			$this->session->set_flashdata('error', 'invalid email or password');
	  		} 
	 	}
	 	else
	 	{
	  		$this->session->set_flashdata('error', 'invalid email or password');
	 	}
	 	redirect('/welcome');
		
	}
	public function sign_up()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "required|is_unique[users.email]|valid_email");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		$this->form_validation->set_rules("first_name", "First Name", "required");
		$this->form_validation->set_rules("last_name", "Last Name", "required");
		if($this->form_validation->run() === FALSE)
		{
			$data = validation_errors();
			$this->session->set_flashdata('error', $data);
			redirect('/welcome');
		}
		else
		{
			$this->output->enable_profiler(TRUE); 
			$this->load->model('login');
			$email = mysql_real_escape_string($this->input->post('email'));
			$password = mysql_real_escape_string($this->input->post('password'));
			$first_name = mysql_real_escape_string($this->input->post('first_name'));
			$last_name = mysql_real_escape_string($this->input->post('last_name'));
			$salt = bin2hex(openssl_random_pseudo_bytes(22));
			$encrypted_password = md5($password . '' . $salt);
			$user_info = array(
				'email' => $email,
				'password' => $encrypted_password,
				'salt' => $salt,
				'last_name' => $last_name,
				'first_name' => $first_name
			);
			$user = $this->login->sign_up($user_info);
			$this->session->set_userdata('user_id', $user);
	   		redirect('/angular');
		}
	}
	public function sign_out()
	{
		$this->output->enable_profiler(TRUE);
		$this->session->sess_destroy();
		$this->session->set_flashdata('error', 'you have successfully logged out');
		redirect('/welcome');
	}
	public function get_user_info()
	{
		$this->load->model('login');
		$user_info = $this->login->get_user_info();
		echo $user_info;
	}
	public function edit_user_info()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "required|valid_email");
		$this->form_validation->set_rules("first_name", "First Name", "required");
		$this->form_validation->set_rules("last_name", "Last Name", "required");
		if($this->form_validation->run() === FALSE)
		{
			$data = validation_errors();
			$this->session->set_flashdata('error', $data);
			redirect('/angular');
		}
		else{
			$this->load->model('login');
			$email = mysql_real_escape_string($this->input->post('email'));
			$first_name = mysql_real_escape_string($this->input->post('first_name'));
			$last_name = mysql_real_escape_string($this->input->post('last_name'));
			$user_info = array(
				'email' => $email,
				'last_name' => $last_name,
				'first_name' => $first_name
			);
			$this->login->edit_user_info($user_info);
			redirect('/angular');
		}
		
	}
}