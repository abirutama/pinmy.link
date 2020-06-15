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
			$data['title'] = 'Login to existing account | Bioku.link';
			$this->load->view('auth/header_v2', $data);
			$this->load->view('auth/login_v2', $data);
			$this->load->view('auth/footer_v2');
		}else{
			$this->_login();
		}

	}

	private function _login(){
		if($this->session->userdata('ses_email')){
			redirect('user');
		}
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

	public function register_v2(){
		$this->load->view('auth/header_v2');
		$this->load->view('auth/register_v2');
		$this->load->view('auth/footer_v2');
	}

	public function register()
	{	
		if($this->session->userdata('ses_email')){
			redirect('user');
		}
		$this->form_validation->set_rules('username-regis', 'Username', 'required|trim|is_unique[user.user_name]',[
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

		if($this->form_validation->run() == false){
			$data['title'] = 'Register a new account | Bioku.link';
			$this->load->view('auth/header_v2');
			$this->load->view('auth/register_v2');
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