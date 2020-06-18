<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller { 

	public function index(){
		$data['title'] = 'Admin Panel';
		$data['user'] = $this->db->get_where('user', array('user_email' => $this->session->userdata('ses_email')))->row_array();
		$date_created = $this->db->query('select from_unixtime(date_created, "%Y-%M") as month, COUNT(from_unixtime(date_created, "%Y-%M")) as count from user group by from_unixtime(date_created, "%Y-%M")')->result_array();
		
		//$date_created = $this->db->query('select from_unixtime(date_created, "%Y-%M") as month from user group by from_unixtime(date_created, "%Y-%M")')->result_array();
		//$date_count = $this->db->query('select COUNT(from_unixtime(date_created, "%Y-%M")) as count from user group by from_unixtime(date_created, "%Y-%M")')->result_array();
		//print_r($date_created);
		foreach($date_created as $month){
			$month_year[] = '\''.$month['month'].'\'';
		}

		foreach($date_created as $count){
			$counts[] = $count['count'];
		}

		$mix_month_year = implode(',', $month_year);
		$mix_count = implode(',', $counts);
		
		$data['mix_month_year'] = $mix_month_year;
		$data['mix_count'] = $mix_count;

		//die;
		$this->load->view('admin/adminpanel_header_v2', $data);
		//$this->load->view('user/userpanel_sidebar_v2', $data);
		//$this->load->view('user/userpanel_topbar_v2', $data);
		$this->load->view('admin/index', $data);
		//$this->load->view('admin/adminpanel_footer_v2');
	}

}