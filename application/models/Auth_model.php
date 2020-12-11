<?php
    class Auth_model extends CI_Model {

        public function send_mail_verification($email_sender, $email_receiver, $token)
        {
                $datae = $this->db->get_where('email_sender', ['email_address' => $email_sender])->row_array();
                $config = [
                        'protocol' => 'smtp',
                        'priority' => 2,
                        'smtp_host' => 'ssl://mail.rupakara.com',
                        'smtp_user' => $datae['email_address'],
                        'smtp_pass' => $datae['email_pass'],
                        'smtp_port' => 465,
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'newline' => "\r\n"
                ];

                $this->load->library('email',$config);
                $this->email->initialize($config);

                $this->email->from($datae['email_address'], 'Pinmy.link Verification');
                $this->email->to($email_receiver);
                $this->email->subject('Account Verification');
                $this->email->message('Click link below to verify your account: <br><a href="https://pinmy.link/auth/verify/'.$email_receiver.'/'.$token.'" target="_blank">https://pinmy.link/auth/verify/'.$email_receiver.'/'.$token.'</a>');

                $this->email->send();
        }

        public function user_verify_token($email_get, $token_get){
                $this->load->model('user_model');
                $get_verify_token = $this->db->get_where('token_user', ['token_email' => $email_get, 'token_code' => $token_get])->row_array();
                if($get_verify_token){
                        echo $email = $get_verify_token['token_email'];
                        echo $token = $get_verify_token['token_code'];
                        $this->user_model->set_user_active($email_get);
                        $this->user_model->delete_row_token($email_get, $token_get);
                }else{
                        echo 'token not found';
                }

        }
    }
?>