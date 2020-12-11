<?php
    class Auth_model extends CI_Model {

        public function send_mail_verification()
        {
                $this->load->library('email');

                $config['protocol']    = 'smtp';
                $config['smtp_host']    = 'ssl://mail.rupakara.com';
                $config['smtp_port']    = '465';
                $config['smtp_timeout'] = '3';
                $config['smtp_user']    = 'no-reply@pinmy.link';
                $config['smtp_pass']    = '~~webmail~~';
                $config['charset']    = 'utf-8';
                $config['newline']    = "\r\n";
                $config['mailtype'] = 'text'; // or html
                $config['validation'] = TRUE; // bool whether to validate email or not      

$this->email->initialize($config);

                $this->email->from('no-reply@pinmy.link');
                $this->email->to('abirutama@gmail.com');
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