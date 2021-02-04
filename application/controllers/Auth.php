<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller { 

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	//Halaman Login User
	public function index()
	{
		//Jika sudah terdapat session user, maka dialihkan ke dashboard user
		if($this->session->userdata('ses_email')){
			redirect('user');
		}
		//Membuat validasi field login
		$this->form_validation->set_rules('email-login', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('pass-login', 'Password', 'trim|required');

		if($this->form_validation->run() == false){
			//Jika fungsi form submit tidak berjalan, maka hanya menampilkan view
			$this->load->view('auth/header_v2');
			$this->load->view('auth/login_v2');
			$this->load->view('auth/footer_v2');
		}else{
			//Menjalankan fungsi login ketika form submit
			//Memanggil Auth_Model untuk proses login user
			$this->load->model('auth_model');
			$this->auth_model->login();
			die();
		}
	}

	public function verify($email_i=null, $token_i=null){
		//Sanitasi input parameter pada url
		$email = htmlspecialchars($email_i, true);
		$token = htmlspecialchars($token_i, true);

		if($email != null && $token != null){
			//Jika nilai parameter email dan token tidak null, maka jalankan fungsi user_verify_token pada Auth_Model
			$this->load->model('auth_model');
			$this->auth_model->user_verify_token($email, $token);
			die();
		}else{
			//Jika nilai parameter email dan token null, alihkan ke halaman login
			redirect('auth');
			die();
		}
	}

	public function register()
	{	
		//Jika sudah terdapat session user, maka alihkan ke dashboard user
		if($this->session->userdata('ses_email')){
			redirect('user');
		}

		//Membuat validasi field register
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
			//Jika form belum submit, tampilkan view
			$this->load->view('auth/header_v2');
			$this->load->view('auth/register_v2',$data);
			$this->load->view('auth/footer_v2');
		}else{
			//Ketika form tersubmit, jalankan fungsi user register dari User_Model
			$this->load->model('user_model');

			//Sanitasi input form dari user
			$post_username = htmlspecialchars($this->input->post('username-regis', true));
			$post_email = htmlspecialchars($this->input->post('email-regis', true));

			$data_user = [
				'user_name' => $post_username,
				'user_email' => $post_email,
				'user_pass' => password_hash($this->input->post('pass-regis'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];
			$this->db->insert('user', $data_user);
			$new_user_id = $this->db->insert_id();

			//Membuat nilai default untuk user baru yang terdaftar <START>
			$data_appearance = [
				'user_id' => $new_user_id
			];
			$this->db->insert('appearance', $data_appearance);

			$data_social = [
				'user_id' => $new_user_id
			];
			$this->db->insert('social', $data_social);

			$data_seo = [
				'meta_title' => '@'.$post_username.'`s Page',
				'user_id' => $new_user_id
			];
			$this->db->insert('seo', $data_seo);
			//Membuat nilai default untuk user baru yang terdaftar <END>

			//Membuat user token yang akan digunakan untuk verifikasi dan aktivasi user baru
			$token = $this->user_model->generate_token($post_email,$post_username);
			$this->user_model->insert_row_token($post_email, $token);

			//Memecah informasi pengirim email SMTP agar tidak terkena email spoofing
			$sender = "activation";
			$symbol_send = "@";
			$domain_send = "pinmy.link";
			$sendergroup = $sender.$symbol_send.$domain_send;
			$receiver = $post_email;

			//Menjalankan function send_mail_verification dari Auth_Model
			$this->load->model('auth_model');
			$this->auth_model->send_mail_verification($sendergroup, $receiver, $token);

			$this->session->set_flashdata('message', '<div class="notification is-success">Registration is success, find email with subject "Account Verification" in your  inbox or spam folder to verify your account.</div>');
			redirect('auth');
		}
	}

	//Function Logout
	public function logout(){
		$this->session->unset_userdata('ses_id');
		$this->session->unset_userdata('ses_email');
		$this->session->unset_userdata('ses_role');
		$this->session->set_flashdata('message', '<div class="notification is-warning">You have been sign out!</div>');
		redirect('auth');
	}
}