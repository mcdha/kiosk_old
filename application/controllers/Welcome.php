<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('api_model');
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->helper('Mobile_Detect'); 
        $this->load->helper('url');
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');
        $this->load->config('email');
        $this->load->library('email');
    }
    
    public function index()
    {
        $this->load->view('welcome_message');
    }
	
    function login()
    {
	$data['title'] = 'MEMBER PORTAL || Login Page';
        
	$this->load->view('forms/login_page', $data);
    }
	
    function auth()
    {	
        date_default_timezone_set('Asia/Manila');
        $password = $this->input->post('password');
        //$email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $username = $this->input->post('username');
        
        $data = array( 
		//'email'     =>  $email,
                'mobile'    =>  $mobile,
                'username'    =>  $username
	);
        $data['title'] = 'MEMBERSHIP PORTAL || Home';
        $credentials = $this->login_model->isExist($data);
        if($credentials->num_rows() <= 0){
            $data['mobile'] = $mobile;
            //$data['email'] = $email;
            $data['message_display'] = 'User Account is not yet registered. Please create account first';
            $data['title'] = 'MEMBER PORTAL';
            $this->load->view('forms/login_page', $data);
        }else{
		$row = $credentials->row();
		$hashed_password  = $row->password;
                if(password_verify($password, $hashed_password)) 
                {
                    $session_data = array(
			'username'         => $username,
                        'mobile'        => $mobile,
			'members_id'	=> $row->members_id,
                        'user_id' => $row->user_id,
                        'members_code'=> $row->members_code
                    );
                    
                    $this->session->set_userdata($session_data);
                    $now = date("Y-m-d H:i:s");
                    $_SESSION['username'] = $username;
                    $_SESSION['mobile'] = $mobile;
                    $_SESSION['user_id'] = $row->user_id;
                    $detect = new Mobile_Detect;
                    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
                    $scriptVersion = $detect->getScriptVersion();
                    //$device = $deviceType;
                    $device_cat = htmlentities($_SERVER['HTTP_USER_AGENT']);
                    $data = array( 
			'user_id'	=>  $_SESSION['user_id'], 
			'username'  	=>  $_SESSION['username'], 
                        'mobile'  	=>  $_SESSION['mobile'],
			'logtime'	=>  $now,
			'ip'	    	=>  $_SERVER['REMOTE_ADDR'],
			'device'	=>  $deviceType,
			'device_cat'	=>  $device_cat,
                    );
			
                    $token = $this->api_model->generate_token();
                  if(isset($token)){
                    if($token['status']== 200){
                        $this->db->insert('member_userlogs', $data);
                        $link = "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$row->members_code;
                        $key = $token['token'];
                        $m = $this->api_model->get_api($link,$key);
                        $members_info = json_decode($m, TRUE);
                        if($members_info['status'] == 201){
                            $data['details'] = $members_info['details'];
                            $link2 = "aapweis.aap.org.ph/aap_webhook/weis/fetchbulkmemberships/".$row->members_code;
                            $key = $token['token'];
                            $m2 = $this->api_model->get_api($link2,$key);
                            $members_record= json_decode($m2, TRUE);
                            if($members_record['status'] == 201){
                                $data['members_record'] = $members_record['details'];
                                $link3 = "aapweis.aap.org.ph/aap_webhook/weis/getavailablepoints/".$row->members_code;
                                $m3= $this->api_model->get_api($link3,$key);
                                $points= json_decode($m3, TRUE);
                                $data['rewards'] = $points['rewards'];
                                
                                $ersbenifits = "aapweis.aap.org.ph/aap_webhook/weis/GetERSBenefits/".$row->members_code;
                                $ersben= $this->api_model->get_api($ersbenifits,$key);
                                $ers= json_decode($ersben, TRUE);
                                $data['ersHistory'] = $ers['history'];
                                
                                $photolink = "aapweis.aap.org.ph/aap_webhook/weis/GetMembersPhoto/".$row->members_code;
                                $photo= $this->api_model->get_photo($photolink,$key);
                                $data['img']= base64_encode($photo);
                                
                                
                                
                            }else{
                                $data['title'] = "Error || 210";
                                $this->load->view('errors/aap/error_210', $data);
                            }
                            
                            $data['title'] = 'MEMBERSHIP PORTAL || Home';
                            $data['message_display'] = 'Successfully Logged-in!';
                            $this->load->view('forms/dashboard', $data);
                        }else{
                            $data['title'] = "Error || 210";
                            $this->load->view('errors/aap/error_210', $data);
                        }
                    }else{
                              $data['title'] = "Error || 401";
                              $this->load->view('errors/aap/error_401', $data);
                    } 
                   }else{
                        $data['title'] = "Error || 401";
                        $this->load->view('errors/aap/error_401_1', $data);
                   }
		}else{
                    $data['message_display'] = "Username and Password didn't match!";
                    $this->load->view('forms/login_page', $data);
                    return FALSE;
		}
        }
    }
	
    function registration_mobile()
    {
	$data['title'] = 'CREATE USER ACCOUNT || MOBILE';
	$this->load->view('forms/login_reg', $data);
    }
    
    function registration_email()
    {
	$data['title'] = 'CREATE USER ACCOUNT || EMAIL';
	$this->load->view('forms/login_reg_email', $data);
    }
    
    function email_registration()
    {
	$data['title'] = 'CREATE USER ACCOUNT';
        $button = $this->input->post('button');
	$password = $this->input->post('pword');
        $code = $this->input->post('memberscode');
        $bday = $this->input->post('birthday');
        $bday_convert = date("m/d/Y", strtotime($bday));
        $email = $this->input->post('email');
	$data = array(
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'birthday' => $bday,
            'members_code' => $code,
            'date_created' => date('Y-m-d')
	);
        if($button == 1){
            $sgc_otp = $this->input->post('otp');
            var_dump($sgc_otp);
            var_dump($_SESSION['start']);
            $d = time() - $_SESSION['start'];
            $idletime = 600;//10 mins
            if ($d > $idletime){
                $data['title'] = 'MEMBERSHIP PORTAL || Create Account';
                $data['message_display'] = 'Session Timeout! Try Again';
                $this->load->view('forms/login_reg_email', $data);
            }else{
                if($_SESSION['otp'] == $sgc_otp){
                    $data = array(
                    'email' => $_SESSION['email'],
                    'password' => $_SESSION['password'],
                    'birthday' => $_SESSION['birthday'],
                    'members_code' => $_SESSION['members_code'],
                    'members_id' => $_SESSION['members_id'],
                    'date_created' => date('Y-m-d')
                );
                    $this->db->insert('member_useraccount',$data);
                    $this->email_reg_notification($_SESSION['email']);
                    $data['title'] = 'MEMBERSHIP PORTAL || Welcome to AAP!';
                    $data['message_display'] = 'Welcome to AAP Member Portal !';
                    $this->load->view('forms/login_page', $data);

                } else { 
                    $data = array(
                    'email' => $_SESSION['email'],
                    'password' => $_SESSION['password'],
                    'birthday' => $_SESSION['birthday'],
                    'members_code' => $_SESSION['members_code'],
                    'members_id' => $_SESSION['members_id'],
                    'otp' => $_SESSION['otp'],          
                    );

                    $data['title'] = 'MEMBERSHIP PORTAL || Verify OTP';
                    $data['message_display'] = 'Incorrect OTP.Try again!';
                    $this->load->view('forms/verify_email', $data);
                }			
            }	

        } elseif ($button === '2') {

            $data = array(
                    'email' => $_SESSION['email'],
                    'password' => $_SESSION['password'],
                    'birthday' => $_SESSION['birthday'],
                    'members_code' => $_SESSION['members_code'],
                    'members_id' => $_SESSION['members_id']         
                    );
                    $otp = $this->generate_otp();
                    $data['otp'] = $otp;
                    $this->email_otp_notification($_SESSION['email'],$otp);
                    $data['title'] = 'MEMBERSHIP PORTAL || Verify OTP';
                    $data['message_display'] = 'Retry OTP!';
                    $this->load->view('forms/verify_email', $data);

        } else{      
                $isExist = $this->login_model->isExist_email($data);
                if($isExist > 0){
                    $data['email'] = $email;
                    $data['memberscode'] = $code;
                    $data['birthday'] = $bday;
                    $data['message_display'] = 'User account already exist!';
                    $data['title'] = 'CREATE USER ACCOUNT';
                    $this->load->view('forms/login_reg_email', $data);
                }else{

                    $token = $this->api_model->generate_token();
                    if($token['status']== 200){
                        $key = $token['token'];
                        $link= "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$code;
                        $m = $this->api_model->get_api($link,$key);
                        $members_info = json_decode($m, TRUE);
                        $status = $members_info['status'];
                        if($status == 201){
                            $details = $members_info['details'];
                           if(isset($details)){
                                foreach($details as $d){
                                    $id = $d['members_id'];
                                    $mcode = $d['members_code'];
                                    $pcode = $d['members_pincode'];
                                    $bd = $d['members_birthdate'];
                                }

                            if($code !== $pcode){
                                if($code !== $mcode){
                                    $data['email'] = $email;
                                    $data['memberscode'] = $code;
                                    $data['birthday'] = $bday;
                                    $data['message_display'] = 'PINCODE did not matched!';
                                    $this->load->view('forms/login_reg_email', $data);
                                }else{
					$data['title'] = 'MEMBERSHIP PORTAL || Verify Email Address';
                                $data['email'] = $email;
                                $data['members_id'] = $id;
                                $otp = $this->generate_otp();

                                $data['otp'] = $otp;
                                $this->email_otp_notification($email,$otp);
                                $this->load->view('forms/verify_email', $data);
				}
                            }elseif($bd != $bday_convert) {
                                    $data['email'] = $email;
                                    $data['memberscode'] = $code;
                                    $data['birthday'] = $bday;
                                    $data['title'] = 'MEMBER PORTAL || Create Account';
                                    $data['message_display'] = 'Birthday did not matched!!';
                                    $this->load->view('forms/login_reg_email', $data);
                            }else{
                                //send otp to email address
                                $data['title'] = 'MEMBERSHIP PORTAL || Verify Email Address';
                                $data['email'] = $email;
                                $data['members_id'] = $id;
                                $otp = $this->generate_otp();

                                $data['otp'] = $otp;
                                $this->email_otp_notification($email,$otp);
                                $this->load->view('forms/verify_email', $data);
                            }
                        }


                        }else{
                            $data['title'] = "Error || 210";
                            $this->load->view('errors/aap/error_210', $data);
                        }

                    }else{
                        $data['title'] = "Error || 401";
                        $this->load->view('errors/aap/error_401', $data);                   
                    }
                }
        }        
    }
    
    function mobile_registration()
    {
        $data['title'] = 'CREATE USER ACCOUNT';
        $button = $this->input->post('button');
	$password = $this->input->post('pword');
        $code = $this->input->post('memberscode');
        $bday = $this->input->post('birthday');
        $bday_convert = date("m/d/Y", strtotime($bday));
        $mobile = $this->input->post('mobile');
	$data = array(
            'mobile' => $mobile,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'birthday' => $bday,
            'members_code' => $code,
            'date_created' => date('Y-m-d')
	);
        if($button == 1){
            $sgc_otp = $this->input->post('otp');
            $d = time() - $_SESSION['start'];
            $idletime = 600;//10 mins
            if ($d > $idletime){
                $data['title'] = 'MEMBERSHIP PORTAL || Create Account';
                $data['message_display'] = 'Session Timeout! Try Again';
                $this->load->view('forms/login_reg_email', $data);
            }else{
                if($_SESSION['otp'] == $sgc_otp){
                    $data = array(
                    'mobile' => $_SESSION['mobile'],
                    'password' => $_SESSION['password'],
                    'birthday' => $_SESSION['birthday'],
                    'members_code' => $_SESSION['members_code'],
                    'members_id' => $_SESSION['members_id'],
                    'date_created' => date('Y-m-d')
                );
                    $this->db->insert('member_useraccount',$data);
                    $this->mobile_reg_notification($_SESSION['mobile']);
                    $data['title'] = 'MEMBER PORTAL || Welcome to AAP!';
                    $data['message_display'] = 'Welcome to AAP Member Portal !';
                    $this->load->view('forms/login_page', $data);

                } else { 
                    $data = array(
                    'mobile' => $_SESSION['mobile'],
                    'password' => $_SESSION['password'],
                    'birthday' => $_SESSION['birthday'],
                    'members_code' => $_SESSION['members_code'],
                    'members_id' => $_SESSION['members_id'],
                    'otp' => $_SESSION['otp'],          
                    );

                    $data['title'] = 'MEMBER PORTAL || Verify OTP';
                    $data['message_display'] = 'Incorrect OTP.Try again!';
                    $this->load->view('forms/verify', $data);
                }			
            }	

        } elseif ($button === '2') {

            $data = array(
                    'mobile' => $_SESSION['mobile'],
                    'password' => $_SESSION['password'],
                    'birthday' => $_SESSION['birthday'],
                    'members_code' => $_SESSION['members_code'],
                    'members_id' => $_SESSION['members_id']         
                    );
                    $otp = $this->generate_otp();
                    $data['otp'] = $otp;
                    $this->mobile_otp_notification($_SESSION['mobile'],$otp);
                    $data['title'] = 'MEMBER PORTAL || Verify OTP';
                    $data['message_display'] = 'Retry OTP!';
                    $this->load->view('forms/verify', $data);

        } else{      
                $isExist = $this->login_model->isExist_mobile($data);
                if($isExist > 0){
                    $data['mobile'] = $mobile;
                    $data['memberscode'] = $code;
                    $data['birthday'] = $bday;
                    $data['message_display'] = 'User account already exist!';
                    $data['title'] = 'CREATE USER ACCOUNT';
                    $this->load->view('forms/login_reg', $data);
                }else{

                    $token = $this->api_model->generate_token();
                    if($token['status']== 200){
                        $key = $token['token'];
                        $link= "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$code;
                        $m = $this->api_model->get_api($link,$key);
                        $members_info = json_decode($m, TRUE);
                        $status = $members_info['status'];
                        if($status == 201){
                            $details = $members_info['details'];
                           if(isset($details)){
                                foreach($details as $d){
                                    $id = $d['members_id'];
                                    $mcode = $d['members_code'];
                                    $pcode = $d['members_pincode'];
                                    $bd = $d['members_birthdate'];
                                }

                            if($code !== $pcode){
                                if($code !== $mcode){
                                    $data['mobile'] = $mobile;
                                    $data['memberscode'] = $code;
                                    $data['birthday'] = $bday;
                                    $data['message_display'] = 'PINCODE did not matched!';
                                    $this->load->view('forms/login_reg', $data);
                                }
                            }elseif($bd != $bday_convert) {
                                   $data['mobile'] = $mobile;
                                    $data['memberscode'] = $code;
                                    $data['birthday'] = $bday;
                                    $data['title'] = 'MEMBER PORTAL|| Create Account';
                                    $data['message_display'] = 'Birthday did not matched!!';
                                    $this->load->view('forms/login_reg', $data);
                            }else{
                                //send otp to email address

                                $data['title'] = 'MEMBER PORTAL || Verify Mobile Number';
                                $data['mobile'] = $mobile;
                                $data['members_id'] = $id;
                                $otp = $this->generate_otp();

                                $data['otp'] = $otp;
                                
                                $result_itextmo = $this->mobile_otp_notification($mobile, $otp);
                                var_dump($result_itextmo);
			    
					if ($result_itextmo == ""){	
						$data['title'] = 'MEMBER PORTAL || Verify Mobile Number';
						$data['message_display'] = "No response from server!!!";
						$this->load->view('forms/login_reg', $data);
					}else if ($result_itextmo == '2000 = SUCCESS'){
						
						$data['title'] = 'MEMBER PORTAL|| Verify Mobile Number';
						$data['mobile'] = $mobile;
						$this->load->view('forms/verify', $data);
					}else{	
						$data['title'] = 'MEMBER PORTAL';
						$data['message_display'] = "Error Num ". $result_itextmo . " was encountered!";
						$this->load->view('forms/login_reg', $data);
					}
                               
                            }
                          }
                        }else{
                            $data['title'] = "Error || 210";
                            $this->load->view('errors/aap/error_210', $data);
                        }
                    }else{
                        $data['title'] = "Error || 401";
                        $this->load->view('errors/aap/error_401', $data);                   
                    }
                }
        } 
    }
	
    function get_towns() 
    {
	$this->load->model('dashboard_model');
	if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
	    $this->dashboard_model->get_town($q);
	}
    }
	
    function get_cities() 
    {
	$this->load->model('dashboard_model');
	if (isset($_GET['term'])){
	    $q = strtolower($_GET['term']);
	    $this->dashboard_model->get_city($q);
	}
    }
	
    function forgotpassword()
    {
	$data['title'] = 'MEMBER PORTAL || Forgot Password';
	$this->load->view('forms/forgotpassword_view', $data);
    }
	
    /*added 6/26/18 isms gateway*/
    function ismscURL($link){

        $http = curl_init($link);

        curl_setopt($http, CURLOPT_RETURNTRANSFER, TRUE);
        $http_result = curl_exec($http);
        $http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
        curl_close($http);

        return $http_result;
     }
    
    //add june 10, 2020
    function profile()
    {
	$data['title'] = 'My Profile';
        $uid = $this->session->userdata('user_id');
        $query = $this->login_model->get_userinfo($uid);
        $data['userinfo'] = $query->row();
        $mcode = $this->session->userdata('members_code');
        $token = $this->api_model->generate_token();
                    if($token['status']== 200){
                        $link = "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$mcode;
                        $key = $token['token'];
                        $m = $this->api_model->get_api($link,$key);
                        $members_info = json_decode($m, TRUE);
                        if($members_info['status'] == 201){
                            $data['details'] = $members_info['details'];
                            
                            $photolink = "aapweis.aap.org.ph/aap_webhook/weis/GetMembersPhoto/".$mcode;
                            $photo= $this->api_model->get_photo($photolink,$key);
                            $data['img'] = base64_encode($photo);
                            
                            $data['title'] = 'User acount information';
                            $data['message_display'] = 'Successfully Logged-in!';
                            $this->load->view('forms/myprofile', $data);
                        }else{
                            $data['title'] = "Error || 210";
                            $this->load->view('errors/aap/error_210', $data);
                        }
                    }else{
                        $data['title'] = "Error || 401";
                        $this->load->view('errors/aap/error_401', $data);
                    }       
        
        
    }
    
    function logout()
    {
	$newdata = array(
	    'mobile'  =>'',
            'username'  =>'',
	    'members_id' => ''
	);
	
	$this->session->unset_userdata($newdata);
	$this->session->sess_destroy();
	redirect('welcome/login');
    }
    
    function email_reg_notification($emailto){

        //SMTP & mail configuration
        $config = array(
            'protocol'  => $this->config->item('protocol'),
            'smtp_host' => $this->config->item('smtp_host'),
            'smtp_port' => $this->config->item('smtp_port'),
            'smtp_user' => $this->config->item('smtp_user'),
            'smtp_pass' => $this->config->item('smtp_pass'),
            'mailtype'  => $this->config->item('mailtype'),
            'charset'   => $this->config->item('charset'),
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $from = $this->config->item('smtp_user');

        //Email content
        $htmlContent = '<h1>Welcome!</h1>';
        $htmlContent .= '<p>Your accounte has been regitered</p>';

        $this->email->to($emailto);
        $this->email->from($from,'Notification');
        $this->email->subject('User Account Registration');
        $this->email->message($htmlContent);

        //Send email
        $this->email->send();
    }
    
     function email_otp_notification($emailto, $otp){
        
        
        $config = array(
            'protocol'  => $this->config->item('protocol'),
            'smtp_host' => $this->config->item('smtp_host'),
            'smtp_port' => $this->config->item('smtp_port'),
            'smtp_user' => $this->config->item('smtp_user'),
            'smtp_pass' => $this->config->item('smtp_pass'),
            'mailtype'  => $this->config->item('mailtype'),
            'charset'   => $this->config->item('charset')
        );
        
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $from = $this->config->item('smtp_user');
        
        //Email content
        $htmlContent = '<h1>Email OTP</h1>';
        $htmlContent .= '<p>Hi, your one-time password is <b>'.$otp.'.</b>. Please enter the OTP within ten minutes to complete the registration of your account in the AAP website.</p>';

        $this->email->to($emailto);
        $this->email->from($from,'Notification');
        $this->email->subject('One-time password');
        $this->email->message($htmlContent);

        //Send email
        if($this->email->send()) {
            $this->session->set_flashdata("email_sent","Email sent successfully."); 
        }else {
            $d = $this->email->print_debugger();
            $this->session->set_flashdata("email_sent",$d); 
        }
    }
    
    private function generate_otp(int $length = 6)
    {
        $otp = "";
        $chars = 'ABCDEFGHJKLMNOPRQSTUVWXYZ0123456789';
        for ($i = 0; $i < $length; $i++) {
            $otp .= $chars[rand(0, strlen($chars) - 1)];
        }
        
        return $otp;
    }
    
     function mobile_otp_notification($mobile, $otp){
            $message = "Hi, your One-Time Password is ". $otp.". Please enter the OTP within ten minutes to complete the registration of your account in the AAP website.";
            $message = html_entity_decode($message, ENT_QUOTES, 'utf-8'); 
            $message = urlencode($message);
            
            $a = $this->config->item('smsusername');
            $b = $this->config->item('smspassword');
            $c = $this->config->item('smssender');
			      
            $username = urlencode($a);
            $password = urlencode($b);
            $sender_id = urlencode($c);
            
            $str = preg_replace('/[^0-9]/','', $mobile);
            $destination = preg_replace('/^0/','63', $str);
            
            $fp = "https://www.isms.com.my/isms_send.php";
            $fp .= "?un=$username&pwd=$password&dstno=$destination&msg=$message&type=1&sendid=$sender_id&agreedterm=YES";
            $result = $this->ismscURL($fp);
            
            return $result;
     }
    
    function mobile_reg_notification($mobile){
     
            $message = "Your mobile number is now succesfully registered. You can now login in Member Portal ";
            $message = html_entity_decode($message, ENT_QUOTES, 'utf-8'); 
            $message = urlencode($message);
            
            $a = $this->config->item('smsusername');
            $b = $this->config->item('smspassword');
            $c = $this->config->item('smssender');
			      
            $username = urlencode($a);
            $password = urlencode($b);
            $sender_id = urlencode($c);
            
            $str = preg_replace('/[^0-9]/','', $mobile);
            $destination = preg_replace('/^0/','63', $str);
            
            $fp = "https://www.isms.com.my/isms_send.php";
            $fp .= "?un=$username&pwd=$password&dstno=$destination&msg=$message&type=1&sendid=$sender_id&agreedterm=YES";
            $result = $this->ismscURL($fp);
            
            return $result;
     }
     
    function forgot_mobile()
    {
	$data['title'] = 'Forgot Password';
        
	$this->load->view('forms/forgotpassword_mobile', $data);
    }
    
    function mobileauth()
    {
        $data['title'] = 'FORGOT PASSWORD';
        $button = $this->input->post('button');
        $mobile = $this->input->post('mobile');
        
	$data = array(
            'mobile' => $mobile
	);
        if($button == 1){
            $sgc_otp = $this->input->post('otp');
            $d = time() - $_SESSION['start'];
            $idletime = 600;//10 mins
            if ($d > $idletime){
                $data['title'] = 'FORGOT PASSWORD || MOBILE OTP';
                $data['message_display'] = 'Session Timeout! Try Again';
                $this->load->view('forms/forgotpassword_mobile', $data);
            }else{
                if($_SESSION['otp'] == $sgc_otp){
                    $data = array(
                    'mobile' => $_SESSION['mobile']
                    );
                    $credentials = $this->login_model->mobileauth($data);
                    if($credentials->num_rows() <= 0){
                        $data['mobile'] = $_SESSION['mobile'];
                        $data['message_display'] = 'User Account is not yet registered. Please create account first';
                        $data['title'] = 'MEMBER LOGIN';
                        $this->load->view('forms/login_page', $data);
                    }else{
                        $row = $credentials->row();
                        $session_data = array(
                            'mobile'        => $_SESSION['mobile'],
                            'members_id'	=> $row->members_id,
                            'user_id'       => $row->user_id,
                            'members_code'  => $row->members_code
                        );

                        $this->session->set_userdata($session_data);
                        $now = date("Y-m-d H:i:s");
                        $_SESSION['mobile'] = $mobile;
                        $_SESSION['user_id'] = $row->user_id;
                        $detect = new Mobile_Detect;
                        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
                        $scriptVersion = $detect->getScriptVersion();
                        //$device = $deviceType;
                        $device_cat = htmlentities($_SERVER['HTTP_USER_AGENT']);
                        $data = array( 
                            'user_id'	=>  $_SESSION['user_id'], 
                            'username'  	=>  $_SESSION['mobile'], 
                            'logtime'	=>  $now,
                            'ip'	    	=>  $_SERVER['REMOTE_ADDR'],
                            'device'	=>  $deviceType,
                            'device_cat'	=>  $device_cat,
                        );

                        $token = $this->api_model->generate_token();
                        //var_dump($token['status']);
                        if($token['status']== 200){
                            $this->db->insert('member_userlogs', $data);
                            $link = "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$row->members_code;
                            $key = $token['token'];
                            $m = $this->api_model->get_api($link,$key);
                            $members_info = json_decode($m, TRUE);
                            if($members_info['status'] == 201){
                                $data['details'] = $members_info['details'];
                                $link2 = "aapweis.aap.org.ph/aap_webhook/weis/fetchbulkmemberships/".$row->members_code;
                                $key = $token['token'];
                                $m2 = $this->api_model->get_api($link2,$key);
                                $members_record= json_decode($m2, TRUE);
                                if($members_record['status'] == 201){
                                    $data['members_record'] = $members_record['details'];
                                    $link3 = "aapweis.aap.org.ph/aap_webhook/weis/getavailablepoints/".$row->members_code;
                                    $m3= $this->api_model->get_api($link3,$key);
                                    $points= json_decode($m3, TRUE);
                                    $data['rewards'] = $points['rewards'];

                                }else{
                                    $data['title'] = "Error || 210";
                                    $this->load->view('errors/aap/error_210', $data);
                                }

                                $data['title'] = 'MEMBERSHIP PORTAL || Home';
                                $data['message_display'] = 'Successfully Logged-in!';
                                $this->load->view('forms/dashboard', $data);
                            }else{
                                $data['title'] = "Error || 210";
                                $this->load->view('errors/aap/error_210', $data);
                            }
                        }else{
                              $data['title'] = "Error || 401";
                              $this->load->view('errors/aap/error_401', $data);
                        } 
                    }

                } else { 
                    $data = array(
                    'mobile' => $_SESSION['mobile'],
                    'otp' => $_SESSION['otp']        
                    );

                    $data['title'] = 'FORGOT PASSWORD || MOBILE OTP';
                    $data['message_display'] = 'Incorrect OTP.Try again!';
                    $this->load->view('forms/mobile_auth', $data);
                }			
            }	

        } elseif ($button === '2') {

            $data = array(
                    'mobile' => $_SESSION['mobile']         
                    );
                    $otp = $this->generate_otp();
                    $data['otp'] = $otp;
                    $this->mobile_otp_notification($_SESSION['mobile'],$otp);
                    $data['title'] = 'MEMBER PORTAL || Verify OTP';
                    $data['message_display'] = 'Retry OTP!';
                    $this->load->view('forms/mobile_auth', $data);

        } else{ 
            $credentials = $this->login_model->mobileauth($data);
            if($credentials->num_rows() <= 0){
                $data['message_display'] = 'Mobile number is not yet registered. Please create an account first.';
                $data['title'] = 'MEMBERSHIP PORTAL';
                $this->load->view('forms/forgotpassword_mobile', $data);
            }else{
                $otp = $this->generate_otp();
                $data['otp'] = $otp;
                $this->mobile_otp_notification($mobile,$otp);
                $this->load->view('forms/mobile_auth', $data);
            }
        } 
    }
    
    function forgot_password()
    {
	$data['title'] = 'Forgot Password';
        
	$this->load->view('forms/forgotpassword_view', $data);
    }
    
    function forgot_password_auth()
    {
        $data['title'] = 'FORGOT PASSWORD';
        $button = $this->input->post('button');
        $username = $this->input->post('username');
        $pword = $this->input->post('pword');
        
	$data = array(
            'username' => $username,
            'pword' => password_hash($pword, PASSWORD_DEFAULT),
	);
        
        if($button == '1'){
            $credentials = $this->login_model->userauth1($data);
            if($credentials->num_rows() <= 0){
                $data['message_display'] = 'Email Address is not yet registered. Please create an account first.';
                $data['title'] = 'MEMBER LOGIN';
                $this->load->view('forms/forgotpassword_view', $data);
            }else{
                $otp = $this->generate_otp();
                $data['otp'] = $otp;
                $this->email_otp_notification($username,$otp);
                $data['title'] = 'FORGOT PASSWORD || Verify OTP';
                $this->load->view('forms/forgotpassword_auth2', $data);
            }
        }elseif($button == '2'){
            $credentials = $this->login_model->userauth($data);
            if($credentials->num_rows() <= 0){
                $data['message_display'] = 'Mobile number is not yet registered. Please create an account first.';
                $data['title'] = 'MEMBER PORTAL';
                $this->load->view('forms/forgotpassword_view', $data);
            }else{
                $otp = $this->generate_otp();
                $data['otp'] = $otp;
                $this->mobile_otp_notification($username,$otp);
                $data['title'] = 'FORGOT PASSWORD || Verify OTP';
                $this->load->view('forms/forgotpassword_auth', $data);
            }
        }elseif($button == '3') {
            $data = array(
                'username' => $_SESSION['username'],
                'pword' => $_SESSION['pword']
            );
            $otp = $this->generate_otp();
            $data['otp'] = $otp;
            $this->mobile_otp_notification($_SESSION['username'],$otp);
            $data['title'] = 'MEMBER PORTAL || Verify OTP';
            $data['message_display'] = 'Retry OTP!';
            $this->load->view('forms/forgotpassword_auth', $data);           
            
        }elseif($button == '4'){
            $data = array(
                'username' => $_SESSION['username'],
                'pword' => $_SESSION['pword']
            );
            $otp = $this->generate_otp();
            $data['otp'] = $otp;
            $this->email_otp_notification($_SESSION['username'],$otp);
            $data['title'] = 'MEMBER PORTAL || Verify OTP';
            $data['message_display'] = 'Retry OTP!';
            $this->load->view('forms/forgotpassword_auth', $data); 
            
        }elseif($button == '5'){
            $sgc_otp = $this->input->post('otp');
            $d = time() - $_SESSION['start'];
            $idletime = 600;//10 mins
            if ($d > $idletime){
                $data['title'] = 'FORGOT PASSWORD || Mobile Number';
                $data['message_display'] = 'Session Timeout! Try Again';
                $this->load->view('forms/forgotpassword_view', $data);
            }else{
                if($_SESSION['otp'] == $sgc_otp){
                    $data = array(
                        'password' => $_SESSION['pword'] 
                    );
                    
                    $this->db->where('mobile', $_SESSION['username']);
                    $this->db->update('member_useraccount', $data);
                    $data['title'] = 'FORGOT PASSWORD || Mobile Number';
                    $data['message_display'] = 'Succesfully updated your record';
                    $this->load->view('forms/login_page', $data);
                    
                } else { 
                    $data = array(
                    'username' => $_SESSION['username'],
                    'otp' => $_SESSION['otp'],
                    'pword' => $_SESSION['pword']
                    );

                    $data['title'] = 'FORGOT PASSWORD || Mobile Number';
                    $data['message_display'] = 'Incorrect OTP.Try again!';
                    $this->load->view('forms/forgotpassword_auth', $data);
                }
            }
        }elseif($button == '6'){
            $sgc_otp = $this->input->post('otp');
            $d = time() - $_SESSION['start'];
            $idletime = 600;//10 mins
            if ($d > $idletime){
                $data['title'] = 'FORGOT PASSWORD || Email Address';
                $data['message_display'] = 'Session Timeout! Try Again';
                $this->load->view('forms/forgotpassword_view', $data);
            }else{
                if($_SESSION['otp'] == $sgc_otp){
                    
                    $data = array(
                        'password' => $_SESSION['pword'] 
                    );
                    
                    $this->db->where('email', $_SESSION['username']);
                    $this->db->update('member_useraccount', $data);
                    $data['title'] = 'FORGOT PASSWORD || Email Address';
                    $data['message_display'] = 'Succesfully updated your record';
                    $this->load->view('forms/login_page', $data);
                    
                } else { 
                    $data = array(
                    'username' => $_SESSION['username'],
                    'otp' => $_SESSION['otp'],
                    'pword' => $_SESSION['pword']
                    );

                    $data['title'] = 'FORGOT PASSWORD || Email Address';
                    $data['message_display'] = 'Incorrect OTP.Try again!';
                    $this->load->view('forms/forgotpassword_auth2', $data);
                }
            }
        }
        
	
    }
    
    
    
    
}
