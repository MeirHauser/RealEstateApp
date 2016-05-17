<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Auth controller created in application/core/MY_Controller in order to prevent non-user access
class Houses extends Auth_Controller {

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
		$this->load->view('angularHouses');
	}
	public function new_house()
	{
		$data = array(
			'errors' => $this->session->flashdata('error')
		);
		$this->load->view('new', $data);
	}
	public function add_house()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("address", "Address", "required");
		$this->form_validation->set_rules("city", "City", "required");
		$this->form_validation->set_rules("state", "State", "required");
		if($this->form_validation->run() === FALSE)
		{
			$data = validation_errors();
			$this->session->set_flashdata('error', $data);
			redirect('/new');
		}
		else{
		$house = $this->input->post();
		$this->load->model('house');
		$house_id = $this->house->add_house($house);
		redirect('/angular');
		}
	}
	//grab individual house record
	public function house($house_id)
	{
		$this->load->model('house');
		$house = $this->house->get_house($house_id);
		$bedrooms = $this->house->get_bedrooms($house_id);
		$user_id = $this->session->userdata('user_id');
		if($house){
			if ($user_id === $house['user_id']) {
				$info = array(
				'house' => $house,
				'bedrooms' => $bedrooms
				);
			$this->load->view('house', $info);
			}
			else{
				redirect("/error");
			}
		}
		else{
			redirect("/error");
		}
	}
	public function delete($house_id)
	{
		$this->load->model('house');
		$user_id = $this->session->userdata('user_id');
		$house = $this->house->get_house($house_id);
		if($house){
			if ($user_id === $house['user_id']){
				$this->house->delete_house($house_id);
			}
		}
		redirect('/all_houses');
	}
	public function angular()
	{
		$this->load->view('angularHouses');
	}
	//Ajax call to grab all user's houses
	public function angularhouses()
	{
		$this->load->model('house');
		$id = $this->session->userdata('user_id');
		$houses = $this->house->get_all_houses($id);
		echo json_encode($houses);
	}
	//Ajax call to delete individual house record
	public function angularDelete($house_id)
	{
		$this->load->model('house');
		$this->house->delete_house($house_id); 
		echo json_encode($house_id);
	}
	//loads page 'error' page when wrong URL is submitted
	public function error(){
		$this->load->view('error');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */