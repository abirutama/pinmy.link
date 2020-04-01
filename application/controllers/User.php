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

	public function setting($subpage){

		if($subpage == 'theme'){
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
		}else if($subpage == 'seo'){
			$data['page'] = 'setting';
			$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();

			//var_dump($data['cover']);
			//die();

			$this->form_validation->set_rules('ga-tracking-id', 'GA Tracking ID', 'trim|required');

			if($this->form_validation->run() == false){
				$this->load->view('templates/userpanel_header_v2', $data);
				$this->load->view('user/settingb_v2', $data);
				$this->load->view('templates/userpanel_footer_v2', $data);
			}else{
				$chosen_gaid = $this->input->post('ga-tracking-id');
			}
		}
	}

	public function addcard(){
		$data['page'] = 'link';
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();

		$this->form_validation->set_rules('link-title', 'Title', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('link-destination', 'URL Destination', 'trim|required|valid_url');
		$this->form_validation->set_rules('link-thumbnail', 'URL Thumbnail', 'trim|valid_url');

		if($this->form_validation->run() == false){
			$this->load->view('templates/userpanel_header_v2', $data);
			$this->load->view('user/add_card_v2', $data);
			$this->load->view('templates/userpanel_footer_v2', $data);
		}else{
			//_addcards();
			$data_card = [
				'card_title' => $this->input->post('link-title'),
				'card_url' => $this->input->post('link-destination'),
				'card_thumbnail' => $this->input->post('link-thumbnail'),
				'user_id' => $this->session->userdata('ses_id'),
				'date_created' => time()
			];

			if($this->db->insert('card', $data_card)){
				$this->session->set_flashdata('message', '<div class="notification is-success">New Link Added Successfully!</div>');
				redirect('user');
			}else{
				$error = $this->db->error();
				$this->session->set_flashdata('message', '<div class="notification is-danger">Add New Link Failed!</div>');
				redirect('user');
			}
		}
	}

	public function editcard($card_id){
		$data['page'] = 'link';
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
		$data['card'] = $this->db->get_where('card', ['card_id' => $card_id, 'user_id' => $this->session->userdata('ses_id')])->row_array();

		$this->form_validation->set_rules('link-title', 'Title', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('link-destination', 'URL Destination', 'trim|required|valid_url');
		$this->form_validation->set_rules('link-thumbnail', 'URL Thumbnail', 'trim|valid_url');

		if($this->form_validation->run() == false){
			$this->load->view('templates/userpanel_header_v2', $data);
			$this->load->view('user/edit_card_v2', $data);
			$this->load->view('templates/userpanel_footer_v2', $data);
		}else{
			$data_card = [
				'card_title' => $this->input->post('link-title'),
				'card_url' => $this->input->post('link-destination'),
				'card_thumbnail' => $this->input->post('link-thumbnail'),
			];

			if($this->db->update('card', $data_card, array('card_id' => $card_id, 'user_id' =>  $this->session->userdata('ses_id')))){
				$this->session->set_flashdata('message', '<div class="notification is-success">Link Edited Successfully!</div>');
				redirect('user');
			}else{
				$error = $this->db->error();
				$this->session->set_flashdata('message', '<div class="notification is-danger">Edit Link Failed!</div>');
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