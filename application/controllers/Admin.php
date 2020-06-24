<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller { 

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('ses_role')!=1){
			redirect('auth');
			die();
		}
	} 

	public function campaign(){
		/*
		$today = time();
		$this->db->select('*');
		$this->db->from('campaign');
		$this->db->where('campaign_start <', $today);
		$this->db->where('campaign_end >', $today);
		$count_campaign = $this->db->count_all_results();
		$rand_campaign = rand(0,$count_campaign-1);
		$data['campaign'] = $this->db->query('select * from campaign where '.$today.' BETWEEN campaign_start AND campaign_end')->result_array()[$rand_campaign];

		print_r($data['campaign']);*/
	}

	public function list($table=null){
		$list = $table;
		if($list=='category'){
			$data['page'] = 'category';
            $data['title'] = 'List Category';
            $data['active'] = 'category';
            $data['list'] = $this->db->select('category_name as Category Name, is_active as Status, category_id as ID');
            $data['list'] = $this->db->order_by('category_name', 'asc');
            $data['list'] = $this->db->get('category');
        }elseif($list=='user'){
			$data['page'] = 'user';
            $data['title'] = 'List User';
            $data['active'] = 'user';
            $data['list'] = $this->db->select('from_unixtime(date_created, "%Y-%m-%d") as "Register Date", user_name as Username, user_email as Email, is_active as Status, user_id as ID');
			$data['list'] = $this->db->where('role_id', 2);
			$data['list'] = $this->db->order_by('date_created', 'DESC');
            $data['list'] = $this->db->get('user');
        }elseif($list=='campaign'){
			$data['page'] = 'campaign';
            $data['title'] = 'List Campaign';
            $data['active'] = 'campaign';
            $data['list'] = $this->db->select('campaign_title as Campaign Title, campaign_url as URL, from_unixtime(campaign_start, "%Y-%m-%d") as "Date Start", from_unixtime(campaign_end, "%Y-%m-%d") as "Date End", , campaign_id as ID');
            $data['list'] = $this->db->order_by('campaign_start', 'asc');
            $data['list'] = $this->db->get('campaign');
        }else{
            redirect('admin');
            die();
		}
		
		$this->load->view('admin/adminpanel_header_v2', $data);
		$this->load->view('admin/list-table-data', $data);
		$this->load->view('admin/adminpanel_footer_v2');
	}

	public function edit_category($cat_id=null)
	{
		$data['page'] = 'category';
		$data['category'] = $this->db->get_where('category', ['category_id' => $cat_id])->row_array();

		if(!$data['category']){
			redirect('admin/list/category');
			die();
		}

		$this->form_validation->set_rules('cat-name', 'Category Name', 'trim|required|min_length[10]|max_length[120]');

		if($this->form_validation->run() == false){
			$this->load->view('admin/adminpanel_header_v2', $data);
			$this->load->view('admin/edit_category', $data);
			$this->load->view('admin/adminpanel_footer_v2');
		}else{
			if($this->input->post('cat-status')){
				$is_active = 1;
			}else{
				$is_active = 0;
			}
			$data_cat = [
				'category_name' => $this->input->post('cat-name'),
				'is_active' => $is_active
			];
			if($this->db->update('category', $data_cat, array('category_id' => $cat_id))){
				$this->session->set_flashdata('message', '<div class="notification is-success">Category Edited Successfully!</div>');
				redirect('admin/list/category');
			}else{
				$error = $this->db->error();
				$this->session->set_flashdata('message', '<div class="notification is-danger">Edit Category Failed!</div>');
				redirect('admin/list/category');
			}
		}
	}

	public function index(){
		$data['page'] = 'dashboard';
		$data['user'] = $this->db->get_where('user', array('user_email' => $this->session->userdata('ses_email')))->row_array();
	
		// 1 Get User by Categories Data
		$get_category_data = $this->db->query('select * from category')->result_array();
		
		foreach($get_category_data as $cat_list){
			$get_user_by_cat[] = $this->db->query('select user_id from user where category_id='.$cat_list['category_id'])->result_array();
		}
		foreach($get_user_by_cat as $key1=>$user_by_cat){
			foreach($user_by_cat as $key2=>$child_group){
				$i = 0;
				$user_id_temp[$key1][] = $user_by_cat[$key2]['user_id'];
			}
			$i++;
		}
		//print_r($user_id_temp);
		foreach($user_id_temp as $key3=>$user_id_pop){
			//echo 'group '.$key3.' = <br>';
			$get_sum_post = 0;
			foreach($user_id_pop as $key4=>$pop){
				//echo '----index('.$key4.')---user_id('.$user_id_temp[$key3][$key4].') = ';
				//$user_id_by_cat[] = $user_id_temp[$key3][$key4];
				$card_count = $this->db->query('select count(card_id) as card_count from card where user_id='.$user_id_temp[$key3][$key4])->row_array();
				//echo $card_count['card_count'].'<br>';
				$get_sum_post = $get_sum_post + $card_count['card_count'];
			}
			$mix_sum[] = $get_sum_post;
		}
		$data['total_post_by_cat_list'] = implode(',', $mix_sum);
		//echo $data['total_post_by_cat_list'];
		//die();
		foreach($get_category_data as $cat){
			$this->db->like('category_id', $cat['category_id']);
			$this->db->from('user');
			$count_user_by_category[] = $this->db->count_all_results();
		}
		foreach($get_category_data as $cat_name){
			$cat_name_arr[] = '\''.$cat_name['category_name'].'\'';
		}
		foreach($count_user_by_category as $key=>$cat_user_count){
			$cat_user_count_arr[] = $cat_user_count[$key];
		}
		//storing array to var
		$data['cat_name_list'] = implode(',', $cat_name_arr);
		$data['cat_user_list'] = implode(',', $count_user_by_category);

		// 2 Get User Registration Activity Data
		$date_created = $this->db->query('select from_unixtime(date_created, "%Y-%M") as month, COUNT(from_unixtime(date_created, "%Y-%M")) as count from user group by from_unixtime(date_created, "%Y-%M") ORDER BY date_created desc LIMIT 6')->result_array();
		foreach($date_created as $user_created){
			$user_date_created[] = '\''.$user_created['month'].'\'';
		}
		foreach($date_created as $user_count){
			$user_date_created_count[] = $user_count['count'];
		}
		//storing array to var
		$data['mix_month_year'] = implode(',', $user_date_created);
		$data['mix_count'] = implode(',', $user_date_created_count);

		// 3 Get User Activation Data
		$user_active = $this->db->query('select from_unixtime(date_created, "%Y-%M") as month, COUNT(user_id) as count_user from user WHERE is_active=1 group by from_unixtime(date_created, "%Y-%M") ORDER BY date_created desc LIMIT 6')->result_array();
		foreach($user_active as $count_active){
			$user_active_count[] = $count_active['count_user'];
		}
		foreach($user_active as $date_active){
			$user_active_date[] = '\''.$date_active['month'].'\'';
		}
		//storing array to var
		$data['mix_active_date'] = implode(',', $user_active_date);
		$data['mix_active'] = implode(',', $user_active_count);

		// 4 Get Post Activity Data
		$post_created = $this->db->query('select from_unixtime(date_created, "%Y-%M") as month, COUNT(date_created) as count from card group by from_unixtime(date_created, "%Y-%M") ORDER BY date_created desc LIMIT 6')->result_array();
		foreach($post_created as $post_date){
			$post_date_created[] = '\''.$post_date['month'].'\'';
		}
		foreach($post_created as $post_count){
			$post_date_created_count[] = $post_count['count'];
		}
		//storing array to var
		$data['mix_post_date'] = implode(',', $post_date_created);
		$data['mix_post_count'] = implode(',', $post_date_created_count);

		//die;
		$this->load->view('admin/adminpanel_header_v2', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('admin/adminpanel_footer_v2');
	}

}