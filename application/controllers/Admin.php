<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller { 

	public function index(){
		$data['title'] = 'Admin Panel';
		$data['page'] = 'dashboard';
		$data['user'] = $this->db->get_where('user', array('user_email' => $this->session->userdata('ses_email')))->row_array();
		
		$date_created = $this->db->query('select from_unixtime(date_created, "%Y-%M") as month, COUNT(from_unixtime(date_created, "%Y-%M")) as count from user group by from_unixtime(date_created, "%Y-%M") ORDER BY date_created desc LIMIT 6')->result_array();
		$user_active = $this->db->query('select from_unixtime(date_created, "%Y-%M") as month, COUNT(user_id) as count_user from user WHERE is_active=1 group by from_unixtime(date_created, "%Y-%M") ORDER BY date_created desc LIMIT 6')->result_array();

		$category = $this->db->query('select * from category')->result_array();
		
		foreach($category as $cat){
			$this->db->like('category_id', $cat['category_id']);
			$this->db->from('user');
			$count_user_by_category[] = $this->db->count_all_results();
		}

		foreach($category as $cat_name){
			$cat_name_arr[] = '\''.$cat_name['category_name'].'\'';
		}
		foreach($count_user_by_category as $key=>$cat_user_count){
			$cat_user_count_arr[] = $cat_user_count[$key];
		}
		
		$data['cat_name_list'] = implode(',', $cat_name_arr);
		$data['cat_user_list'] = implode(',', $count_user_by_category);

		foreach($date_created as $user_created){
			$user_date_created[] = '\''.$user_created['month'].'\'';
		}
		foreach($date_created as $user_count){
			$user_date_created_count[] = $user_count['count'];
		}

		foreach($user_active as $count_active){
			$user_active_count[] = $count_active['count_user'];
		}
		foreach($user_active as $date_active){
			$user_active_date[] = '\''.$date_active['month'].'\'';
		}

		$data['mix_month_year'] = implode(',', $user_date_created);
		$data['mix_count'] = implode(',', $user_date_created_count);

		$data['mix_active_date'] = implode(',', $user_active_date);
		$data['mix_active'] = implode(',', $user_active_count);

		//die;
		$this->load->view('admin/adminpanel_header_v2', $data);
		$this->load->view('admin/index', $data);
		//$this->load->view('admin/adminpanel_footer_v2');
	}

}