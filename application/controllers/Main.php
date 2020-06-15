<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller { 
	
	public function index()
	{
		//echo 'under development';
		$this->load->view('webpage/index');
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

		$test = $this->db->like('card_id', 50);
		//$test = $this->db->or_like('card_id', 49);
		$test = $this->db->get('card')->result_array();
		//print_r($test);
		
		//$queryCover = $this->db->get_where('cover', array('cover_id' => $queryProfile['user_cover']))->row_array();
		$queryCard = $this->db->order_by('card_id', 'DESC');
		$queryCard = $this->db->get_where('card', array('user_id' => $queryProfile['user_id']))->result_array();
		$data['card'] = $queryCard;

		$querySocial = $this->db->get_where('social', array('user_id' => $queryProfile['user_id']))->row_array();
		$data['social'] = $querySocial;
		
		$querySeo = $this->db->get_where('seo', array('user_id' => $queryProfile['user_id']))->row_array();
		$data['seo'] = $querySeo;

		$queryAppearance = $this->db->get_where('appearance', array('user_id' => $queryProfile['user_id']))->row_array();
		$data['appearance'] = $queryAppearance;

		$pinned = $this->db->get_where('card_pinned', array('user_id'=>$queryProfile['user_id']))->row_array();
		if($pinned){
			$queryPinned = $this->db->select('card_id, card_title, card_slug, card_thumbnail');
			$temp_array = explode(',',$pinned['pin_item']);
			if($temp_array[0]==null){
				$temp_array[0]=-9;
			}
			if($temp_array[1]==null){
				$temp_array[1]=-9;
			}
			if($temp_array[2]==null){
				$temp_array[2]=-9;
			}
			if($temp_array[3]==null){
				$temp_array[2]=-9;
			}
			//$queryPinned = $this->db->like('card_id', $temp_array[0]);
			if($temp_array>1){
				foreach($temp_array as $key => $tempItem){
					$next = $key+1;
					$queryPinned = $this->db->or_like('card_id', $temp_array[$key]);
				}
			}
			$queryPinned = $this->db->get_where('card', array('user_id' => $queryProfile['user_id']))->result_array();
			$data['pinned'] = $queryPinned;
		}
		
		$this->load->view('templates/template_2', $data);
		
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