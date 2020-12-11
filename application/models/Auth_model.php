<?php
    class Auth_model extends CI_Model {

        public function send_mail_verification()
        {
                
                $config = [
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://mail.rupakara.com',
                        'smtp_user' => 'no-reply@pinmy.link',
                        'smtp_pass' => '~~webmail~~',
                        'smtp_port' => 465,
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'newline' => "\r\n"
                ];

                $this->load->library('email',$config);

                $this->email->from('no-reply@pinmy.link', 'Pinmy.link');
                $this->email->to('abirutama@gmail.com');
                $this->email->subject('User Activation');
                $this->email->message('
                                Hello, please kindly verify your account by clicking url below: \r\n
                                Make sure this link has domain "pinmy.link"
                ');

                if ($this->email->send())
                {
                        //echo $this->email->print_debugger();
                        echo 'success';
                }else{
                        echo $this->email->print_debugger();
                        die;
                }
        }
    }
?>