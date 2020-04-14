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
		$strip = str_replace('@', '', $user_name);
		$queryProfile = $this->db->get_where('user', array('user_name' => $strip))->row_array();
		$data['profile'] = $queryProfile;
		//print_r($queryProfile);
		//die();
		if(!$queryProfile){
			redirect('main');
			die();
		}

		
		
		//$queryCover = $this->db->get_where('cover', array('cover_id' => $queryProfile['user_cover']))->row_array();
		$queryCard = $this->db->order_by('card_id', 'DESC');
		$queryCard = $this->db->get_where('card', array('user_id' => $queryProfile['user_id']))->result_array();
		$data['card'] = $queryCard;

		$querySocial = $this->db->get_where('social', array('user_id' => $queryProfile['user_id']))->row_array();
		$data['social'] = $querySocial;
		
		$querySeo = $this->db->get_where('seo', array('user_id' => $queryProfile['user_id']))->row_array();
		$data['seo'] = $querySeo;

		
			$this->load->view('templates/template_2', $data);
		
	}
	public function template2(){
		$this->load->view('templates/template_2');
	}
	public function goto($user_name=null, $card_id=null)
	{
		$data['queryProfile'] = $this->db->get_where('user', array('user_name' => $user_name))->row_array();
		if(!$data['queryProfile']){
			redirect('main');
			//echo 'Content not found!';
			die();
		}else{
			$data['queryCard'] = $this->db->get_where('card', array('user_id' => $data['queryProfile']['user_id'], 'card_slug' => $card_id))->row_array();
			$data['querySeo'] = $this->db->get_where('seo', array('user_id' => $data['queryProfile']['user_id']))->row_array();
			//var_dump($data['queryCard']);
			//die();
			if(!$data['queryCard']){
				redirect('@'.$user_name);
				die();
			}
			$this->load->view('webpage/goto_v2', $data);
		}
	}
}