<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller { 
	
	public function index()
	{
		//echo 'under development';
		$this->load->view('webpage/index');
	}
	public function redirect_user($user_name){
		redirect(base_url('u/').$user_name);
	}
	public function redirect_goto($user_name, $post){
		redirect(base_url('u/').$user_name.'/'.$post);
	}
	public function preview2($user_name){
		
		$strip = str_replace('@', '', $user_name);
		$queryProfile = $this->db->get_where('user', array('user_name' => $strip, 'is_active' => 1))->row_array();
		$data['profile'] = $queryProfile;

		if(!$queryProfile){
			redirect('main');
			die();
		}

		$queryCard = $this->db->order_by('card_order asc');
		$queryCard = $this->db->order_by('date_created desc');
		$queryCard = $this->db->get_where('card', array('user_id' => $queryProfile['user_id']))->result_array();
		$data['card'] = $queryCard;

		$querySocial = $this->db->get_where('social', array('user_id' => $queryProfile['user_id']))->row_array();
		$data['social'] = $querySocial;
		
		$querySeo = $this->db->get_where('seo', array('user_id' => $queryProfile['user_id']))->row_array();
		$data['seo'] = $querySeo;

		$queryAppearance = $this->db->get_where('appearance', array('user_id' => $queryProfile['user_id']))->row_array();
		$data['appearance'] = $queryAppearance;
		
		$this->load->view('templates/template_with_ad', $data);
		
	}

	public function goto($user_name_i=null, $card_id_i=null)
	{
		$user_name = $user_name_i;
		$card_id = $card_id_i;
		$data['queryProfile'] = $this->db->get_where('user', array('user_name' => $user_name))->row_array();
		if(!$data['queryProfile']){
			redirect('main');
			die();
		}else{
			$data['queryCard'] = $this->db->get_where('card', array('user_id' => $data['queryProfile']['user_id'], 'card_slug' => $card_id))->row_array();
			$data['querySeo'] = $this->db->get_where('seo', array('user_id' => $data['queryProfile']['user_id']))->row_array();

			if(!$data['queryCard']){
				redirect('u/'.$user_name);
				die();
			}
			$this->load->view('webpage/goto_v2', $data);
		}
	}

	public function password($string){
		echo password_hash($string, PASSWORD_DEFAULT);
	}
}