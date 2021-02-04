<?php
    class User_model extends CI_Model {

        //Mengubah status user_active saat proses verifikasi akun baru
        public function set_user_active($user_email)
        {
            //Cocokan user_email dengan record pada database
            $user = $this->db->get_where('user', ['user_email' => $user_email])->row_array();
            if($user){
                //Jika pada record database user belum aktif, maka lakukan update status user_active
                if($user['is_active'] != 1){
                    $this->db->set('is_active', 1, FALSE);
                    $this->db->where('user_email', $user_email);
                    $update = $this->db->update('user');
                    if($update){
                        //User berhasil diaktivasi dan alihkan ke login
                        $this->session->set_flashdata('message', '<div class="notification is-success">Congratulation! Your account has been verified! Please login to access your dashboard. </div>');
                        redirect('auth');
                    }else{
                        //Terjadi kesalahan pada proses aktivasi, harap hubungi administrator
                        $this->session->set_flashdata('message', '<div class="notification is-danger">User verification failed! Please contact the Administrator </div>');
                        redirect('auth');
                    }
                }else{
                    //Jika recored database user sudah aktif, beri informasi dan alihkan ke halaman login
                    $this->session->set_flashdata('message', '<div class="notification is-warning">User already verified. Please login to access your dashboard. </div>');
                    redirect('auth');
                }
            }
        }

        //Insert record token baru pada database untuk user yang baru saja registrasi  
        public function insert_row_token($user_email, $token){
            $data_token = [
				'token_email' => $user_email,
                'token_code' => $token,
                'date_create' => time()
			];
			$this->db->insert('token_user', $data_token);
        }

        //Hapus user token dari database (setelah proses aktivasi berhasil)
        public function delete_row_token($user_email, $token){
            $data_token = [
				'token_email' => $user_email,
                'token_code' => $token
			];
			$this->db->delete('token_user', $data_token);
        }

        //Fungsi generate token secara random
        public function generate_token($user_email, $username){
            $new_token = md5($user_email.$username.rand(1,999));
            return $new_token;
        }
    }
?>