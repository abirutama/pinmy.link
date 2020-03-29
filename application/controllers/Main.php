<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller { 
	
	public function index()
	{
		echo 'under development';
		//$this->load->view('webpage/index');
	}
 
	public function preview2($user_name)
	{
		$queryProfile = $this->db->get_where('user', array('user_name' => $user_name))->row_array();
		$data['preview'] = str_replace('@', '', $user_name);
		if($queryProfile['user_layout'] == 1 || $queryProfile['user_layout'] == 2){
			$this->load->view('templates/preview', $data);
		}else if($queryProfile['user_layout'] == 3){
			$this->load->view('templates/panel_view', $data);
		}else{
			echo 'Layout not found!';
		}
	}

	public function no_user()
	{
		redirect('user');
	}
}