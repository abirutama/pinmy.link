<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller { 

	public function index(){
		$data['title'] = 'Admin Panel';
		$data['page'] = 'dashboard';
		$data['user'] = $this->db->get_where('user', array('user_email' => $this->session->userdata('ses_email')))->row_array();

		// 1 Get User by Categories Data
		$category = $this->db->query('select * from category')->result_array();

		foreach($category as $cat){
			echo 'Cat No.'.$cat['category_id'].': ';
			$user_by_cat = $this->db->query('select user_id from user where category_id='.$cat['category_id'])->result_array();
			$sum_card = 0;
			foreach($user_by_cat as $user_cat){
				$count_post_by_cat = $this->db->query('select count(card_id) as card_count from card where user_id='.$user_cat['user_id'])->result_array();
				print_r($count_post_by_cat);
				foreach($count_post_by_cat as $count_card){
					//echo $count_card['card_count'];
					$sum_card =  $sum_card + $count_card['card_count'];
				}
				//echo $sum_card;
			}
			
			//echo '(count end)';
			echo '<br>';
		}

		die();
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

		// 4 Get User Registration Activity Data
		$post_created = $this->db->query('select from_unixtime(date_created, "%Y-%M") as month, COUNT(date_created) as count from card group by from_unixtime(date_created, "%Y-%M") ORDER BY date_created asc LIMIT 6')->result_array();
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
		//$this->load->view('admin/adminpanel_footer_v2');
	}

}