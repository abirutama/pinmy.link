<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller { 

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		
	}
	public function index()
	{
		if($this->session->userdata('ses_email')){
			redirect('user');
		}
		$this->form_validation->set_rules('email-login', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('pass-login', 'Password', 'trim|required');

		if($this->form_validation->run() == false){
			$this->load->view('auth/header_v2');
			$this->load->view('auth/login_v2');
			$this->load->view('auth/footer_v2');
		}else{
			$email = $this->input->post('email-login');
			$pass = $this->input->post('pass-login');

			$user = $this->db->get_where('user', ['user_email' => $email])->row_array();

			if($user){
				if($user['is_active'] == 1){
					if(password_verify($pass, $user['user_pass'])){
						$data = [
							'ses_id' => $user['user_id'],
							'ses_email' => $user['user_email'],
							'ses_role' => $user['role_id']
						];
						$this->session->set_userdata($data);
						redirect('user');
					}else{
						$this->session->set_flashdata('message', '<div class="notification is-danger">Email or password is invalid!</div>');
						redirect('auth');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="notification is-warning">User has not been activated!</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="notification is-danger">Email or password is invalid!</div>');
				redirect('auth');
			}
		}
	}

	public function google_login(){
		$this->load->view('auth/google_v1');
	}
	public function sign_google(){
		
		$username_auto = $this->input->post('email', true);
		$user = $this->db->get_where('user', ['user_email' => $username_auto])->row_array();
		if($user){
			$this->session->set_userdata('ses_email', $user['user_email']);
		}else{
			$username_auto = str_replace("@gmail.com","",$username_auto);
			$data_user = [
				'user_name' => $username_auto,
				'user_email' => htmlspecialchars($this->input->post('email', true)),
				'user_pass' => password_hash($this->input->post('email'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data_user);
			$new_user_id = $this->db->insert_id();
		}
	}

	public function register()
	{	
		if($this->session->userdata('ses_email')){
			redirect('user');
		}
		$this->form_validation->set_rules('username-regis', 'Username', 'required|trim|min_length[8]|alpha_numeric|is_unique[user.user_name]',[
			'is_unique' => 'This username has already registered!'
		]);
		$this->form_validation->set_rules('email-regis', 'E-mail', 'required|trim|valid_email|is_unique[user.user_email]',[
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('pass-regis', 'Password', 'required|trim|min_length[6]|matches[repass-regis]', [
			'matches' => 'Password is not match!',
			'min_length' => 'Password is too short!',
		]);
		$this->form_validation->set_rules('repass-regis', 'Password', 'required|trim|matches[pass-regis]');

		$this->db->select('category_id, category_name');
		$data['category'] = $this->db->get_where('category', ['is_active' => 1])->result_array();

		if($this->form_validation->run() == false){
			$this->load->view('auth/header_v2');
			$this->load->view('auth/register_v2',$data);
			$this->load->view('auth/footer_v2');
		}else{
			//die();
			$data_user = [
				'user_name' => htmlspecialchars($this->input->post('username-regis', true)),
				'user_email' => htmlspecialchars($this->input->post('email-regis', true)),
				'user_pass' => password_hash($this->input->post('pass-regis'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data_user);
			$new_user_id = $this->db->insert_id();

			$data_appearance = [
				'user_id' => $new_user_id
			];
			$this->db->insert('appearance', $data_appearance);

			$data_pinned = [
				'user_id' => $new_user_id
			];
			$this->db->insert('card_pinned', $data_pinned);

			$data_social = [
				'user_id' => $new_user_id
			];
			$this->db->insert('social', $data_social);

			$data_seo = [
				'meta_title' => 'Welcome to My Page',
				'user_id' => $new_user_id
			];
			$this->db->insert('seo', $data_seo);


			$this->session->set_flashdata('message', '<div class="notification is-success">Registration is success, please sign in!</div>');
			redirect('auth');
		}
	}

	public function logout(){
		$this->session->unset_userdata('ses_id');
		$this->session->unset_userdata('ses_email');
		$this->session->unset_userdata('ses_role');
		$this->session->set_flashdata('message', '<div class="notification is-warning">You have been sign out!</div>');
		redirect('auth');
	}
}