<?php
    class Auth_model extends CI_Model {

        public function send_mail_verification()
        {
                $config = [
                        'protocol' => 'smtp',
                        'smtp_host' => 'mail.pinmy.link',
                        'smtp_user' => 'no-reply@pinmy.link',
                        'smtp_timeout' => 5,
                        'smtp_pass' => '~~pinmylink~~',
                        'smtp_port' => 465,
                        'smtp_crypto' => 'ssl',
                        'mailtype' => 'text',
                        'charset' => 'utf-8',
                        'newline' => "\r\n"
                ];
                $this->load->library('email', $config);

                $this->email->from('no-reply@pinmy.link');
                $this->email->to('hello@abirutama.com');
                $this->email->subject('User Activation');
                $this->email->message('Hello, please kindly verify your account by clicking url below:');

                if ($this->email->send())
                {
                        //echo $this->email->print_debugger();
                }else{
                        echo $this->email->print_debugger();
                }
        }
    }
?>