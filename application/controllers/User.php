<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller { 

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if(!$this->session->userdata('ses_email')){
			redirect('auth');
		}
	}

	public function index(){
		$data['page'] = 'link';
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();

		$this->load->view('templates/userpanel_header_v2', $data);
		$this->load->view('user/card_list_v2', $data);
		$this->load->view('templates/userpanel_footer_v2', $data);
	}

	public function profile(){
		$data['page'] = 'profile';
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
		$data['social'] = $this->db->get_where('social', ['user_id' => $this->session->userdata('ses_id')])->row_array();
		
		$this->form_validation->set_rules('social-twitter', 'Twitter Username', 'trim|max_length[25]');
		$this->form_validation->set_rules('social-facebook', 'Facebook Username', 'trim|max_length[25]');
		$this->form_validation->set_rules('social-instagram', 'Instagram Username', 'trim|max_length[25]');
		$this->form_validation->set_rules('social-snapchat', 'Snapschat Username', 'trim|max_length[25]');
		$this->form_validation->set_rules('social-youtube', 'Youtube Channel', 'trim|max_length[25]');

		if($this->form_validation->run() == false){
			$this->load->view('templates/userpanel_header_v2', $data);
			$this->load->view('user/profile_v2', $data);
			$this->load->view('templates/userpanel_footer_v2', $data);
		}else{
			$form_twitter = strtolower($this->input->post('social-twitter'));
			$form_facebook = strtolower($this->input->post('social-facebook'));
			$form_instagram = strtolower($this->input->post('social-instagram'));
			$form_snapchat = strtolower($this->input->post('social-snapchat'));
			$form_youtube = strtolower($this->input->post('social-youtube'));
			$form_user_id = $this->session->userdata('ses_id');

			$data_social = [
				'social_twitter' => $form_twitter,
				'social_facebook' => $form_facebook,
				'social_instagram' => $form_instagram,
				'social_snapchat' => $form_snapchat,
				'social_youtube' => $form_youtube,
				'user_id' => $form_user_id
			];

			if($this->db->update('social', $data_social, array('user_id' => $this->session->userdata('ses_id')))){
				$this->session->set_flashdata('message', '<div class="notification is-success">Profile Update Successfully!</div>');
				$error = $this->db->error();
				redirect('user/profile');
			}else{
				$this->session->set_flashdata('message', '<div class="notification is-danger">Profile Update Failed!</div>');
				$error = $this->db->error();
				redirect('user/profile');
			}
		}
	}

	public function setting(){
		$data['page'] = 'setting';
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
		
		$data['cover'] = $this->db->get('cover')->result_array();
		$data['layout'] = $this->db->get_where('layout', ['layout_status' => 1])->result_array();
		$data['theme'] = $this->db->get('theme')->result_array();
		//var_dump($data['cover']);
		//die();

		$this->form_validation->set_rules('setting-cover', 'Cover Image', 'trim|required');
		$this->form_validation->set_rules('setting-layout', 'Layout', 'trim|required');

		if($this->form_validation->run() == false){
			$this->load->view('templates/userpanel_header_v2', $data);
			$this->load->view('user/setting_v2', $data);
			$this->load->view('templates/userpanel_footer_v2', $data);
		}else{
			$chosen_gaid = $this->input->post('ga-tracking-id');
			$chosen_cover = $this->input->post('setting-cover');
			$chosen_layout = $this->input->post('setting-layout');

			foreach($data['cover'] as $value_cover){
				$avail_cover[] = $value_cover['cover_id'];
			}
			if (!in_array($chosen_cover, $avail_cover)){
				$chosen_cover = 2;
			}
			foreach($data['layout'] as $value_layout){
				$avail_layout[] = $value_layout['layout_id'];
			}
			if (!in_array($chosen_layout, $avail_layout)){
				$chosen_layout = 1;
			}

			$data_profile = [
				'user_cover' => $chosen_cover,
				'user_layout' => $chosen_layout,
				'user_gtag' => $chosen_gaid
			];

			if($this->db->update('user', $data_profile, array('user_id' => $this->session->userdata('ses_id')))){
				$this->session->set_flashdata('message', '<div class="notification is-success">Settings Updated Successfully!</div>');
				$error = $this->db->error();
				redirect('user/setting');
			}else{
				$error = $this->db->error();
				$this->session->set_flashdata('message', '<div class="notification is-danger">Settings Update Failed!</div>');
				redirect('user/setting');
			}
		}
	}

	public function addcard_v2(){
		$data['page'] = 'link';
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();

		$this->load->view('templates/userpanel_header_v2', $data);
		$this->load->view('user/add_card_v2', $data);
		$this->load->view('templates/userpanel_footer_v2', $data);
	}

	public function addcard(){
		$data['title'] = 'Add New Card';
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();

		$this->form_validation->set_rules('card-title', 'Title', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('card-url', 'URL', 'trim|required|valid_url');
		$this->form_validation->set_rules('card-thumbnail', 'Thumbnail', 'trim|valid_url');
		if($this->form_validation->run() == false){
			$this->load->view('templates/userpanel_header', $data);
			$this->load->view('templates/userpanel_topbar', $data);
			$this->load->view('user/add_card', $data);
			$this->load->view('templates/userpanel_footer');
		}else{
			//_addcards();
			$data_card = [
				'card_title' => $this->input->post('card-title'),
				'card_url' => $this->input->post('card-url'),
				'card_thumbnail' => $this->input->post('card-thumbnail'),
				'user_id' => $this->session->userdata('ses_id'),
				'date_created' => time()
			];

			if($this->db->insert('card', $data_card)){
				$this->session->set_flashdata('message', '<div class="notification is-success">Card Added Successfully!</div>');
				redirect('user');
			}else{
				$error = $this->db->error();
				$this->session->set_flashdata('message', '<div class="notification is-danger">Adding Car Failed!</div>');
				redirect('user');
			}
		}
	}

	public function editcard($card_id){
		$data['title'] = 'Edit Card';
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
		$data['card'] = $this->db->get_where('card', ['card_id' => $card_id, 'user_id' => $this->session->userdata('ses_id')])->row_array();

		$this->form_validation->set_rules('card-title', 'Title', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('card-url', 'URL', 'trim|required|valid_url');
		$this->form_validation->set_rules('card-thumbnail', 'Thumbnail', 'trim|valid_url');

		if($this->form_validation->run() == false){
			$this->load->view('templates/userpanel_header', $data);
			$this->load->view('templates/userpanel_topbar', $data);
			$this->load->view('user/edit_card', $data);
			$this->load->view('templates/userpanel_footer');
		}else{
			$data_card = [
				'card_title' => $this->input->post('card-title'),
				'card_url' => $this->input->post('card-url'),
				'card_thumbnail' => $this->input->post('card-thumbnail')
			];

			if($this->db->update('card', $data_card, array('card_id' => $card_id, 'user_id' =>  $this->session->userdata('ses_id')))){
				$this->session->set_flashdata('message', '<div class="notification is-success">Card Edited Successfully!</div>');
				redirect('user');
			}else{
				$error = $this->db->error();
				$this->session->set_flashdata('message', '<div class="notification is-danger">Editing Card Failed!</div>');
				redirect('user');
			}
			

		}
	}

	public function deletecard($card_id){
		if($this->db->delete('card', array('card_id' => $card_id, 'user_id' => $this->session->userdata('ses_id')))){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Card Deleted Successfully!</div>');
			redirect('user');
		}else{
			$error = $this->db->error();
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Deleting Card Failed!</div>');
			redirect('user');
		}
	}
}