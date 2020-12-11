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
                $this->email->to('bagusprasojo1212@gmail.com');
                $this->email->subject('User Activation');
                $this->email->message('Activation Link: <a href="http://pinmy.link" target="_blank">Click Here</a>');

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