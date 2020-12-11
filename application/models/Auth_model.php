<?php
    class Auth_model extends CI_Model {

        public function send_mail_verification()
        {
                
                $config = [
                        'protocol' => 'smtp',
                        'priority' => 2,
                        'smtp_host' => 'ssl://mail.rupakara.com',
                        'smtp_user' => 'activation@pinmy.link',
                        'smtp_pass' => '~~activation~~',
                        'smtp_port' => 465,
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'newline' => "\r\n"
                ];

                $this->load->library('email',$config);
                $this->email->initialize($config);

                $this->email->from('activation@pinmy.link', 'Pinmy.link Activation');
                $this->email->to('abirutama@gmail.com');
                $this->email->subject('User Activation');
                $this->email->message('
                                Hello, please kindly verify your account by clicking url below:<br>
                                <br>
                                https://google.com
                                <br>
                                (Make sure this link has "pinmy.link" domain)
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