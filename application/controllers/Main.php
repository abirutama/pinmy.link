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
		if(!$queryProfile){
			redirect('main');
		}

		$data['preview'] = str_replace('@', '', $user_name);
		if($queryProfile['user_layout'] == 1 || $queryProfile['user_layout'] == 2){
			$this->load->view('templates/preview', $data);
		}else if($queryProfile['user_layout'] == 3){
			$this->load->view('templates/panel_view', $data);
		}else{
			echo 'Layout not found!';
		}
	}

	public function goto($user_name=null, $card_id=null)
	{
		//echo $user_name;
		//echo $card_id;
		$data['queryProfile'] = $this->db->get_where('user', array('user_name' => $user_name))->row_array();
		if(!$data['queryProfile']){
			//redirect('main');
			echo 'Content not found!';
			die();
		}else{
			$data['queryCard'] = $this->db->get_where('card', array('user_id' => $data['queryProfile']['user_id'], 'card_slug' => $card_id))->row_array();
			$data['querySeo'] = $this->db->get_where('seo', array('user_id' => $data['queryProfile']['user_id']))->row_array();
			//var_dump($data['queryCard']);
			//die();
			if(!$data['queryCard']){
				redirect('@'.$user_name);
			}
			$this->load->view('webpage/goto', $data);
		}
	}
}