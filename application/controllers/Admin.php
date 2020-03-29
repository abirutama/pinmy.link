<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller { 

	public function index(){
		$data['title'] = 'Admin Panel';
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();


		$this->load->view('templates/userpanel_header', $data);
		$this->load->view('templates/userpanel_sidebar', $data);
		$this->load->view('templates/userpanel_topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/userpanel_footer');
	}

}