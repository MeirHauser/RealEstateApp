<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Houses extends CI_Controller {

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
		$this->load->view('new');
	}
	public function submit_house()
	{
		$house = $this->input->post();
		//var_dump($house);
		$this->load->model('house');
		$house_id = $this->house->add_house($house);
		//var_dump($house_id);
		redirect('/angular');
	}
	public function house($house_id)
	{
		$this->load->model('house');
		$house = $this->house->get_house($house_id);
		$info = array(
			'house' => $house
			);
		$this->load->view('house', $info);
	}
	public function delete($house_id)
	{
		$this->load->model('house');
		$this->house->delete_house($house_id);
		redirect('/all_houses');
	}
	public function angular()
	{
		$this->load->view('angularHouses');
	}
	public function angularhouses()
	{
		$this->load->model('house');
		$houses = $this->house->get_all_houses(1);
		echo json_encode($houses);
	}
	public function angularDelete($house_id)
	{
		$this->load->model('house');
		$this->house->delete_house($house_id); 
		echo json_encode($house_id);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */