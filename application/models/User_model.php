<?php
    class User_model extends CI_Model {

        public function set_user_active($user_email)
        {
            $user = $this->db->get_where('user', ['user_email' => $user_email])->row_array();
            if($user){
                if($user['is_active'] != 1){
                    $this->db->set('is_active', 1, FALSE);
                    $this->db->where('user_email', $user_email);
                    $update = $this->db->update('user');
                    if($update){
                        //echo 'status changed';
                        $this->session->set_flashdata('message', '<div class="notification is-success">Congratulation! Your account has been verified! Please login to access your dashboard. </div>');
                    redirect('auth');
                    }else{
                        echo 'error change status';
                    }
                }else{
                    //echo 'user already verified';
                    $this->session->set_flashdata('message', '<div class="notification is-warning">User already verified. Please login to access your dashboard. </div>');
                    redirect('auth');
                }
            }
        }

        public function insert_row_token($user_email, $token){
            $data_token = [
				'token_email' => $user_email,
                'token_code' => $new_token,
                'date_create' => time()
			];
			$this->db->insert('token_user', $data_token);
        }

        public function generate_token($user_email, $username){
            $new_token = md5($user_email.$username.rand(1,999));
            return $new_token;
        }
    }
?>