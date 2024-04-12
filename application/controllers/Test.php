<?php
class Test extends CI_Controller
{
        public function __construct()
        {
            parent::__construct();
            
        }
        
        function ticket(){
           try {
            $this->load->library('ReceiptPrint');
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            
            if($ip == '192.168.0.251'){
                $user = 'smb://Kiosk1/EPSONTM-T82';
                $ticket = "K-001";
				var_dump($user);
				var_dump($ticket);
            }else if($ip == '192.168.0.252'){
                $user = 'smb://192.168.0.252/EPSONTM-T82';
                $ticket = "K-002";
				var_dump($user);
				var_dump($ticket);
            }else{
				$user = 'smb://Kiosk1/EPSONTM-T82';
				//$user = 'KIOSK 1';
                $ticket = "K-001";
				var_dump($user);
				var_dump($ticket);

            }

            
            $this->receiptprint->connect($user);
             
            $this->receiptprint->print_test_receipt('Hello World!');
           } catch (Exception $e) {
             log_message("error", "Error: Could not print. Message ".$e->getMessage());
             var_dump($e->getMessage());
             $this->receiptprint->close_after_exception();
           }
        }
}

