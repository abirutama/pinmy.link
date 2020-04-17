<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller { 

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if(!$this->session->userdata('ses_email')){
			redirect('auth');
			die();
		}
	} 

	public function index(){
		//set current page value
		$data['page'] = 'link';
		//getting user data by session
		$data['user'] = $this->db->get_where('user', array('user_email' => $this->session->userdata('ses_email')))->row_array();
		
		$queryCard = $this->db->select('card_id, card_title');
		$queryCard = $this->db->order_by('card_id', 'DESC');
		$queryCard = $this->db->get_where('card', array('user_id' => $this->session->userdata('ses_id')))->result_array();
		$data['card'] = $queryCard;

		$pinned = $this->db->get_where('card_pinned', array('user_id'=>$this->session->userdata('ses_id')))->row_array();
		if($pinned){
			$queryPinned = $this->db->select('card_id, card_title');
			$temp_array = explode(',',$pinned['pin_item']);
			if($temp_array[0]==null){
				$temp_array[0]=-9;
			}
			$queryPinned = $this->db->like('card_id', $temp_array[0]);
			if($temp_array>1){
				foreach($temp_array as $key => $tempItem){
					$next = $key+1;
					$queryPinned = $this->db->or_like('card_id', $temp_array[$key]);
				}
			}
			$queryPinned = $this->db->get_where('card', array('user_id' => $this->session->userdata('ses_id')))->result_array();
			$data['pinned'] = $queryPinned;
		}
		
		$this->load->view('templates/userpanel_header_v2', $data);
		$this->load->view('user/card_list_v2', $data);
		$this->load->view('templates/userpanel_footer_v2', $data);
	}

	public function profile(){
		//set current page value
		$data['page'] = 'profile';
		//getting user data by session
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

	public function setting($subpage=null){

		if($subpage == 'theme'){
			//set current page value
			$data['page'] = 'setting';
			//getting user data by session
			$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
			$data['cover'] = $this->db->get('cover')->result_array();
			$data['layout'] = $this->db->get_where('layout', ['layout_status' => 1])->result_array();
			$data['theme'] = $this->db->get('theme')->result_array();

			$this->form_validation->set_rules('setting-cover', 'Cover Image', 'trim|required');
			$this->form_validation->set_rules('setting-layout', 'Layout', 'trim|required');

			if($this->form_validation->run() == false){
				$this->load->view('templates/userpanel_header_v2', $data);
				$this->load->view('user/setting_v2', $data);
				$this->load->view('templates/userpanel_footer_v2', $data);
			}else{
				$chosen_cover = $this->input->post('setting-cover');
				$chosen_layout = $this->input->post('setting-layout');

				//Create whitelisting array items, so users can't input randomly
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
				//Create whitelisting array items, so users can't input randomly

				$data_theme = [
					'user_cover' => $chosen_cover,
					'user_layout' => $chosen_layout,
				];

				if($this->db->update('user', $data_theme, array('user_id' => $this->session->userdata('ses_id')))){
					$this->session->set_flashdata('message', '<div class="notification is-success">Settings Updated Successfully!</div>');
					$error = $this->db->error();
					redirect('user/setting/theme');
				}else{
					$error = $this->db->error();
					$this->session->set_flashdata('message', '<div class="notification is-danger">Settings Update Failed!</div>');
					redirect('user/setting/theme');
				}
			}
		}else if($subpage == 'seo'){
			//set current page value
			$data['page'] = 'setting';
			//getting user data by session
			$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
			$data['seo'] = $this->db->get_where('seo', ['user_id' => $this->session->userdata('ses_id')])->row_array();

			$this->form_validation->set_rules('meta-title', 'Meta Title', 'trim|min_length[10]|max_length[60]');
			$this->form_validation->set_rules('meta-description', 'Meta Description', 'trim|max_length[160]');
			$this->form_validation->set_rules('meta-keyword', 'Meta Keyword', 'trim|max_length[160]');
			$this->form_validation->set_rules('meta-robot', 'Meta Robots', 'trim');
			$this->form_validation->set_rules('meta-rating', 'Meta Rating', 'trim');
			$this->form_validation->set_rules('ga-tracking-id', 'GA Tracking ID', 'trim');

			if($this->form_validation->run() == false){
				$this->load->view('templates/userpanel_header_v2', $data);
				$this->load->view('user/settingb_v2', $data);
				$this->load->view('templates/userpanel_footer_v2', $data);
			}else{
				$chosen_title = $this->input->post('meta-title');
				$chosen_desc = $this->input->post('meta-description');
				$chosen_keyword = $this->input->post('meta-keyword');
				$chosen_robot = $this->input->post('meta-robot');
				$chosen_rating = $this->input->post('meta-rating');
				$chosen_gaid = $this->input->post('ga-tracking-id');

				if($chosen_robots < 0 || $chosen_robots > 1){
					$chosen_robots = 1;
				}
				if($chosen_rating < 0 || $chosen_rating > 1){
					$chosen_rating = 0;
				}

				$data_meta = [
					'meta_title' => $chosen_title,
					'meta_description' => $chosen_desc,
					'meta_keyword' => $chosen_keyword,
					'meta_robot' => $chosen_robot,
					'meta_rating' => $chosen_rating,
					'gtag_id' => $chosen_gaid
				];

				if($this->db->update('seo', $data_meta, array('user_id' => $this->session->userdata('ses_id')))){
					$this->session->set_flashdata('message', '<div class="notification is-success">Settings Updated Successfully!</div>');
					$error = $this->db->error();
					redirect('user/setting/seo');
				}else{
					$error = $this->db->error();
					$this->session->set_flashdata('message', '<div class="notification is-danger">Settings Update Failed!</div>');
					redirect('user/setting/seo');
				}
			}
		}else{
			redirect('user');
			die();
		}
	}

	public function addcard(){
		//set current page value
		$data['page'] = 'link';
		//getting user data by session
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();

		$this->form_validation->set_rules('link-title', 'Title', 'trim|required|min_length[6]|max_length[120]');
		$this->form_validation->set_rules('link-destination', 'URL Destination', 'trim|required|valid_url');
		$this->form_validation->set_rules('link-thumbnail', 'URL Thumbnail', 'trim|valid_url');

		if($this->form_validation->run() == false){
			$this->load->view('templates/userpanel_header_v2', $data);
			$this->load->view('user/add_card_v2', $data);
			$this->load->view('templates/userpanel_footer_v2', $data);
		}else{
			//Creating Card SLUG START
			$next_id = $this->db->query("SHOW TABLE STATUS LIKE 'card'")->row(0)->Auto_increment;
			$clean_title = preg_replace('/[^\p{L}\p{N}\s]/u', '', strtolower($this->input->post('link-title')));
			$temp_title = str_replace(' ', '-', $clean_title);
			$card_slug = $temp_title.'-'.$next_id;
			//Creating Card SLUG END

			//Collecting POST Value to Array
			$data_card = [
				'card_title' => $this->input->post('link-title'),
				'card_slug' => $card_slug,
				'card_url' => $this->input->post('link-destination'),
				'card_thumbnail' => $this->input->post('link-thumbnail'),
				'user_id' => $this->session->userdata('ses_id'),
				'date_created' => time()
			];

			//Inserting Data to table
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

	public function editcard($card_id=null){
		//set current page value
		$data['page'] = 'link';
		//getting user data by session
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
		$data['card'] = $this->db->get_where('card', ['card_id' => $card_id, 'user_id' => $this->session->userdata('ses_id')])->row_array();

		//if card content not found in db, then redirect
		if(!$data['card']){
			redirect('user');
			die();
		}

		$this->form_validation->set_rules('link-title', 'Title', 'trim|required|min_length[6]|max_length[120]');
		$this->form_validation->set_rules('link-destination', 'URL Destination', 'trim|required|valid_url');
		$this->form_validation->set_rules('link-thumbnail', 'URL Thumbnail', 'trim|valid_url');

		if($this->form_validation->run() == false){
			$this->load->view('templates/userpanel_header_v2', $data);
			$this->load->view('user/edit_card_v2', $data);
			$this->load->view('templates/userpanel_footer_v2', $data);
		}else{
			//Creating Card SLUG START
			$clean_title = preg_replace('/[^\p{L}\p{N}\s]/u', '', strtolower($this->input->post('link-title')));
			$arrayTitle = explode(" ",$clean_title);
	
			if(count($arrayTitle) < 6){
				$temp_title = str_replace(' ', '-', $clean_title);
			}else{
				$temp_title = $arrayTitle[0].'-'.$arrayTitle[1].'-'.$arrayTitle[2].'-'.$arrayTitle[3].'-'.$arrayTitle[4];
			}
			
			$card_slug = $temp_title.'-'.$card_id;
			//Creating Card SLUG END

			$data_card = [
				'card_title' => $this->input->post('link-title'),
				'card_slug' => $card_slug,
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

	public function deletecard($card_id=null){
		//getting user data by session
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
		$data['card'] = $this->db->get_where('card', ['card_id' => $card_id, 'user_id' => $this->session->userdata('ses_id')])->row_array();

		//if card content not found in db, then redirect
		if(!$data['card']){
			redirect('user');
			die();
		}

		if($this->db->delete('card', array('card_id' => $card_id, 'user_id' => $this->session->userdata('ses_id')))){
			$this->session->set_flashdata('message', '<div class="notification is-success" role="alert">Card Deleted Successfully!</div>');
			redirect('user');
		}else{
			$error = $this->db->error();
			$this->session->set_flashdata('message', '<div class="notification is-danger" role="alert">Deleting Card Failed!</div>');
			redirect('user');
		}
	}

	public function pinned(){
		//set current page value
		$data['page'] = 'link';
		//getting user data by session
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
		$data['card'] = $this->db->select('card_id, card_title');
		$data['card'] = $this->db->order_by('card_title','ASC');
		$data['card'] = $this->db->get_where('card', array('user_id'=>$this->session->userdata('ses_id')))->result_array();

		$pinned = $this->db->get_where('card_pinned', array('user_id'=>$this->session->userdata('ses_id')))->row_array();
		$pinItem[0] = null;
		$pinItem[1] = null;
		$pinItem[2] = null;
		if($pinned){
			$temp_array = explode(',',$pinned['pin_item']);
			foreach($temp_array as $key => $tempItem){
				$pinItem[$key] = $temp_array[$key];
			}
		}
		$data['pinItem'] = $pinItem;

		$this->form_validation->set_rules('pinned[]', 'Twitter Username', 'trim|max_length[25]');

		if($this->form_validation->run() == false){
			$this->load->view('templates/userpanel_header_v2', $data);
			$this->load->view('user/edit_pinned', $data);
			$this->load->view('templates/userpanel_footer_v2', $data);
		}else{
			$form_pin = $this->input->post('pinned[]');
			print_r($form_pin);
			die();
			$data_pinned = [
				'pin_item' => $form_pin,
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
}