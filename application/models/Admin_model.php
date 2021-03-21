<?php
    class Admin_model extends CI_Model {

        //Mengubah status user_active saat proses verifikasi akun baru
        public function delete_user_data($user_id, $user_email, $date_created)
        {
            $find_user = $this->db->select('user_id');
            $find_user = $this->db->get_where('user', array('user_id' => $user_id, 'user_email' => $user_email, 'date_created' => $date_created), 1, 0)->row_array();
            if($find_user){
                'true';
            }else{
                'false';
            }
        }
    }
?>