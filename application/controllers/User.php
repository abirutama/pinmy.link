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

	public function order(){
		//echo 'print awal: '.$arrays;
		if(isset($_POST['sort'])){
			$arrays = $_POST['sort'];
			$pisah = explode(',',$arrays);
			//echo '<br> print explode: ';
			//print_r($pisah);
			//echo '<br> print arraykeys: ';
			//print_r(array_keys($pisah));
			//echo '<br> print count array: ';
			//print_r(count($pisah));
			//echo '<br>';
			foreach($pisah as $index_sort => $card_id){
				$this->db->set('card_order', $index_sort, FALSE);
				$this->db->where('card_id', $card_id);
				$this->db->update('card');
			}
		}else{
			echo 'FORBIDDEN!';
		}
	}

	public function qr_info($user=null, $url=null)
	{
		if(stristr($_SERVER['DOCUMENT_ROOT'], 'xampp')===false){
			$if_local='';
		}else{
			$if_local='/pinmy.link';
		}
		include ($_SERVER['DOCUMENT_ROOT'].$if_local."/assets/qr/qrlib.php");
		
		$errorCorrectionLevel = 'L';
		$matrixPointSize = 10;
		$url = base_url().$user.'/'.$url.'?utm_source=pinmylink&utm_medium=qrcode&utm_campaign=qr_content_share';
		QRcode::png($url, false, $errorCorrectionLevel, $matrixPointSize, 4); 
	}
	
	public function index(){
		//set current page value
		$data['page'] = 'link';
		//getting user data by session
		$data['user'] = $this->db->get_where('user', array('user_email' => $this->session->userdata('ses_email')))->row_array();
		
		$queryCard = $this->db->select('card_id, card_title, card_slug');
		$queryCard = $this->db->order_by('card_order', 'asc');
		$queryCard = $this->db->order_by('date_created', 'desc');
		$queryCard = $this->db->get_where('card', array('user_id' => $this->session->userdata('ses_id')))->result_array();
		$data['card'] = $queryCard;
		
		$this->load->view('user/userpanel_header_v2', $data);
		$this->load->view('user/card_list_v3', $data);
		$this->load->view('user/userpanel_footer_v2', $data);
	}

	public function setting($subpage=null){
		if($subpage == 'profile'){
			//set current page value
			$data['page'] = 'setting';
			//getting user data by session
			$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
			$this->load->view('user/userpanel_header_v2', $data);
			$this->load->view('user/setting_1', $data);
			$this->load->view('user/userpanel_footer_v2', $data);
		}elseif($subpage == 'website'){
			//set current page value
			$data['page'] = 'setting';
			//getting user data by session
			$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
			$data['social'] = $this->db->get_where('social', ['user_id' => $data['user']['user_id']])->row_array();
			
			$this->form_validation->set_rules('social-twitter', 'Twitter Username', 'trim|max_length[25]');
			$this->form_validation->set_rules('social-facebook', 'Facebook Username', 'trim|max_length[25]');
			$this->form_validation->set_rules('social-instagram', 'Instagram Username', 'trim|max_length[25]');

			if($this->form_validation->run() == false){
				$this->load->view('user/userpanel_header_v2', $data);
				$this->load->view('user/setting_2', $data);
				$this->load->view('user/userpanel_footer_v2', $data);
			}else{
				$form_website = strtolower($this->input->post('other-website'));
				$form_bukalapak = strtolower($this->input->post('ecom-bukalapak'));
				$form_lazada = strtolower($this->input->post('ecom-lazada'));
				$form_shopee = strtolower($this->input->post('ecom-shopee'));
				$form_tokopedia = strtolower($this->input->post('ecom-tokopedia'));
				$form_twitter = strtolower($this->input->post('social-twitter'));
				$form_facebook = strtolower($this->input->post('social-facebook'));
				$form_instagram = strtolower($this->input->post('social-instagram'));
				$form_user_id = $this->session->userdata('ses_id');

				$data_social = [
					'other_website' => $form_website,
					'ecom_bukalapak' => $form_bukalapak,
					'ecom_lazada' => $form_lazada,
					'ecom_shopee' => $form_shopee,
					'ecom_tokopedia' => $form_tokopedia,
					'social_twitter' => $form_twitter,
					'social_facebook' => $form_facebook,
					'social_instagram' => $form_instagram,
					'user_id' => $form_user_id
				];

				if($this->db->update('social', $data_social, array('user_id' => $this->session->userdata('ses_id')))){
					$this->session->set_flashdata('message', '<div class="notification is-success">Website updated successfully!</div>');
					$error = $this->db->error();
					redirect('user/setting/website');
				}else{
					$this->session->set_flashdata('message', '<div class="notification is-danger">Website failed to update!</div>');
					$error = $this->db->error();
					redirect('user/setting/website');
				}
			}
		}elseif($subpage == 'appearance'){
			//set current page value
			$data['page'] = 'setting';
			//getting user data by session
			$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
			$data['appearance'] = $this->db->get_where('appearance', ['user_id' => $this->session->userdata('ses_id')])->row_array();

			$this->form_validation->set_rules('text-color-input', 'Text Color', 'trim');
			$this->form_validation->set_rules('accent-color-input', 'Accent Color', 'trim');

			if($this->form_validation->run() == false){
				$this->load->view('user/userpanel_header_v2', $data);
				$this->load->view('user/setting_3', $data);
				$this->load->view('user/userpanel_footer_v2', $data);
			}else{
				
				if(isset($_POST['update-avatar'])){
					if($_FILES['avatar-input']['name']){
						$ava_image = $_FILES['avatar-input']['name'];
					}else{
						redirect('user/setting/appearance');
						die();
					}
					if($ava_image){
						$config['upload_path'] = './assets/img/avatar/';
						$config['allowed_types'] = 'jpg|jpeg';
						$config['max_size'] = '300';
						$config['file_ext_tolower'] = true;
						
						$this->load->library('upload', $config);

						if($this->upload->do_upload('avatar-input')){
							$is_upload_ava = true;
							$old_ava = $data['appearance']['appearance_ava'];
							if($old_ava !== null){
								unlink(FCPATH.'assets/img/avatar/'.$old_ava);
							}
							echo $this->upload->data('file_name');
							$new_ava = $this->upload->data('file_name');
							
							$paths = pathinfo(FCPATH.'assets/img/avatar/'.$new_ava);
								$this->db->set('appearance_ava', $new_ava);
								$this->db->where('user_id', $this->session->userdata('ses_id'));
								$this->db->update('appearance');
								
								$this->session->set_flashdata('message', '<div class="notification is-success">Avatar image updated successfully!</div>');
								redirect('user/setting/appearance');
							
						}
						else{
							$this->session->set_flashdata('message', '<div class="notification is-danger">Avatar image failed to update. Please read the rules!</div>');
							redirect('user/setting/appearance');
						}
					}
				}
					
						
				if(isset($_POST['update-cover'])){
					if($_FILES['cover-input']['name']){
						$cover_image = $_FILES['cover-input']['name'];
					}else{
						redirect('user/setting/appearance');
						die();
					}
					if($cover_image){
						$config['upload_path'] = './assets/img/cover/';
						$config['allowed_types'] = 'jpg|jpeg';
						$config['max_size'] = '500';
						$config['file_ext_tolower'] = true;
						$this->load->library('upload', $config);

						if($this->upload->do_upload('cover-input')){
							$is_upload_cover = true;
							$old_cover = $data['appearance']['appearance_cover'];
							if($old_cover !== null){
								unlink(FCPATH.'assets/img/cover/'.$old_cover);
							}
							echo $this->upload->data('file_name');
							$new_cover = $this->upload->data('file_name');
							
							$paths = pathinfo(FCPATH.'assets/img/cover/'.$new_cover);
							
								$this->db->set('appearance_cover', $new_cover);
								$this->db->where('user_id', $this->session->userdata('ses_id'));
								$this->db->update('appearance');
								
								$this->session->set_flashdata('message', '<div class="notification is-success">Cover image updated successfully!</div>');
								redirect('user/setting/appearance');

						}else{
							$this->session->set_flashdata('message', '<div class="notification is-danger">Failed to upload cover image. Please read the rules.</div>');
							redirect('user/setting/appearance');
						}
					}
				}
				//$text_color_input = $this->input->post('text-color-input');
				//$accent_color_input = $this->input->post('accent-color-input');
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
				$this->load->view('user/userpanel_header_v2', $data);
				$this->load->view('user/setting_4', $data);
				$this->load->view('user/userpanel_footer_v2', $data);
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
					$this->session->set_flashdata('message', '<div class="notification is-success">MetaTag settings updated successfully!</div>');
					$error = $this->db->error();
					redirect('user/setting/seo');
				}else{
					$error = $this->db->error();
					$this->session->set_flashdata('message', '<div class="notification is-danger">MetaTag settings failed to update!</div>');
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
			$this->load->view('user/userpanel_header_v2', $data);
			$this->load->view('user/add_card_v2', $data);
			$this->load->view('user/userpanel_footer_v2', $data);
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
			$this->load->view('user/userpanel_header_v2', $data);
			$this->load->view('user/edit_card_v2', $data);
			$this->load->view('user/userpanel_footer_v2', $data);
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
				'card_thumbnail' => $this->input->post('link-thumbnail')
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
		//setting search card query by card_id and session user_id
		$this->db->select('card_id,card_order,user_id');
		$data['card'] = $this->db->get_where('card', ['card_id' => $card_id, 'user_id' => $this->session->userdata('ses_id')])->row_array();
		$current_order = $data['card']['card_order'];
		//if card content not match in db or not belong to them, then redirect
		if(!$data['card']){
			redirect('user');
			die();
		}
		//echo $data['card']['card_order'];
		//die();
		if($this->db->delete('card', array('card_id' => $card_id, 'user_id' => $this->session->userdata('ses_id')))){
			$this->session->set_flashdata('message', '<div class="notification is-success" role="alert">Card Deleted Successfully!</div>');
			redirect('user');
		}else{
			$error = $this->db->error();
			$this->session->set_flashdata('message', '<div class="notification is-danger" role="alert">Deleting Card Failed!</div>');
			redirect('user');
		}
	}

	public function highlight(){
		//set current page value
		$data['page'] = 'link';
		//getting user data by session
		$this->db->select('user_name');
		$data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('ses_email')])->row_array();
		$this->db->select('card_id, card_title');
		$this->db->order_by('card_title','ASC');
		$data['card'] = $this->db->get_where('card', array('user_id'=>$this->session->userdata('ses_id')))->result_array();

		$this->db->select('pin_item');
		$pinned = $this->db->get_where('card_pinned', array('user_id'=>$this->session->userdata('ses_id')))->row_array();
		$pinItem[0] = null;
		$pinItem[1] = null;
		$pinItem[2] = null;
		$pinItem[3] = null;
		if($pinned){
			$temp_array = explode(',',$pinned['pin_item']);
			foreach($temp_array as $key => $tempItem){
				if($temp_array[$key] > 0){
					$pinItem[$key] = $temp_array[$key];
				}
			}
		}
		$data['pinItem'] = $pinItem;

		$this->form_validation->set_rules('pinned[0]', 'Link 1', 'trim|differs[pinned[1]]|differs[pinned[2]]|differs[pinned[3]]');
		$this->form_validation->set_rules('pinned[1]', 'Link 2', 'trim|differs[pinned[0]]|differs[pinned[2]]|differs[pinned[3]]');
		$this->form_validation->set_rules('pinned[2]', 'Link 3', 'trim|differs[pinned[0]]|differs[pinned[1]]|differs[pinned[3]]');
		$this->form_validation->set_rules('pinned[3]', 'Link 4', 'trim|differs[pinned[0]]|differs[pinned[1]]|differs[pinned[2]]');

		if($this->form_validation->run() == false){
			$this->load->view('user/userpanel_header_v2', $data);
			$this->load->view('user/edit_pinned', $data);
			$this->load->view('user/userpanel_footer_v2', $data);
		}else{
			$form_pin = $this->input->post('pinned[]');
			if($this->input->post('pinned[0]')=='no_pin1'){
				$new_pin[0] = 'null';
			}else{
				$new_pin[0] = $this->input->post('pinned[0]');
			}
			if($this->input->post('pinned[1]')=='no_pin2'){
				$new_pin[1] = 'null';
			}else{
				$new_pin[1] = $this->input->post('pinned[1]');
			}
			if($this->input->post('pinned[2]')=='no_pin3'){
				$new_pin[2] = 'null';
			}else{
				$new_pin[2] = $this->input->post('pinned[2]');
			}
			if($this->input->post('pinned[3]')=='no_pin4'){
				$new_pin[3] = 'null';
			}else{
				$new_pin[3] = $this->input->post('pinned[3]');
			}
			$temp_array = implode(',',$new_pin);
			//print_r($temp_array);
			//die();
			$data_pinned = [
				'pin_item' => $temp_array
			];

			if($this->db->update('card_pinned', $data_pinned, array('user_id' => $this->session->userdata('ses_id')))){
				$this->session->set_flashdata('message', '<div class="notification is-success">Highlight Update Successfully!</div>');
				$error = $this->db->error();
				redirect('user');
			}else{
				$this->session->set_flashdata('message', '<div class="notification is-danger">Highlight Update Failed!</div>');
				$error = $this->db->error();
				redirect('user/highlight');
			}
		}
	}
}