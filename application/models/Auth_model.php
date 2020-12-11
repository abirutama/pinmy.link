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

                $this->email->from($datae['email_address'], 'Pinmy.link Activation');
                $this->email->to($email_receiver);
                $this->email->subject('User Activation');
                $this->email->message('Activation Link: <a href="https://pinmy.link/'.$token.'" target="_blank">Click Here</a>');

                if ($this->email->send())
                {
                        echo 'success';
                }
        }
    }
?>