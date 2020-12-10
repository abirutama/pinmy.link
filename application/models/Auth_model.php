<?php
    class Auth_model extends CI_Model {
        public $title;
        public $content;
        public $date;

        public function send_mail_verification()
        {
                $config = [
                        'smtp_host' => 'mail.pinmy.link',
                        'smtp_user' => 'no-reply@pinmy.link',
                        'smtp_pass' => '~~pinmylink~~',
                        'smtp_port' => 465,
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'newline' => "\r\n"
                ];
                $this->load->library('email', $config);

                $this->email->from('no-reply@pinmy.link', 'PINMY.LINK');
                $this->email->to('abirutama@gmail.com');
                $this->email->subject('User Activation');
                $this->email->message('Hello, please kindly verify your account by clicking url below:');
                $this->email->send();
        }
    }
?>