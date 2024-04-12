<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('api_model');
            $this->load->model('dashboard_model');
            $this->load->library('xmlrpc');
            $this->load->library('xmlrpcs');
            $this->load->config('email');
            $this->load->library('email');
        }
	
        function home()
        {
            $data['title'] = 'Member Portal || Home';
            $mcode = $this->session->userdata('members_code');
            $token = $this->api_model->generate_token();
			$baseURL = 'aapweis.aap.org.ph';
                if(isset($token)){ 
                    if($token['status']== 200){
                        $link = $baseURL."/aap_webhook/weis/fetchmemberinfo/".$mcode;
                        $key = $token['token'];
                        $m = $this->api_model->get_api($link,$key);
                        $members_info = json_decode($m, TRUE);
                      
                        if($members_info['status'] == 201){
                            $data['details'] = $members_info['details'];
                            $link2 = $baseURL."/aap_webhook/weis/fetchbulkmemberships/".$mcode;
                            $key = $token['token'];
                            $m2 = $this->api_model->get_api($link2,$key);
                            $members_record= json_decode($m2, TRUE);
                            if($members_record['status'] == 201){
                                $data['members_record'] = $members_record['details'];
                                
                                $link3 = $baseURL."/aap_webhook/weis/getavailablepoints/".$mcode;
                                $m3= $this->api_model->get_api($link3,$key);
                                $points= json_decode($m3, TRUE);
                                $data['rewards'] = $points['rewards'];
                                
                                $link4 = $baseURL."/aap_webhook/weis/fetchmembership/".$mcode;
                                $m4= $this->api_model->get_api($link4,$key);
                                $vehicle= json_decode($m4, TRUE);
                                
                                $ersbenifits = $baseURL."/aap_webhook/weis/GetERSBenefits/".$mcode;
                                $ersben= $this->api_model->get_api($ersbenifits,$key);
                                $ers= json_decode($ersben, TRUE);
                                $data['ersHistory'] = $ers['history'];
                                
                                $photolink = $baseURL."/aap_webhook/weis/GetMembersPhoto/".$mcode;
                                $photo= $this->api_model->get_photo($photolink,$key);
                                $data['img'] = base64_encode($photo);
                                
                            }else{
                                $data['title'] = "Error || 210";
                                $this->load->view('errors/aap/error_210', $data);
                            }
                            $data['title'] = 'Member Portal || Home';
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
        }
        
        function renew()
        {
            $id = $_SESSION['vehicleinfohead'];
            $data['title'] = 'Member Portal || Renewal form';
			$baseURL = 'aapweis.aap.org.ph';
            $mcode = $this->session->userdata('members_code');
            $token = $this->api_model->generate_token();
                if(isset($token)){
                    if($token['status']== 200){
                        $link = $baseURL."/aap_webhook/weis/fetchmemberinfo/".$mcode;
                        $key = $token['token'];
                        $m = $this->api_model->get_api($link,$key);
                        $members_info = json_decode($m, TRUE);
                        if($members_info['status'] == 201){
                            $data['details'] = $members_info['details'];
                            
                            $link2 = $baseURL."/aap_webhook/weis/fetchmembership/".$id;
                            $key = $token['token'];
                            
                            $photolink = $baseURL."/aap_webhook/weis/GetMembersPhoto/".$mcode;
                            $photo= $this->api_model->get_photo($photolink,$key);
                            $data['img'] = base64_encode($photo);
                            $m2 = $this->api_model->get_api($link2,$key);
                            $members_record= json_decode($m2, TRUE);
                            if($members_record['status'] == 201){
                                $data['membership'] = $members_record['details']['membership'][0];
                                $data['vehicle'] = $members_record['details']['membership']['vehicles'];
                                $data['id'] = $id;
                                $data['title'] = 'Member Portal || Renewal';
                                $data['message_display'] = 'Successfully Logged-in!';
                                $this->load->view('forms/renew_view', $data);
                            }else{
                                $data['title'] = "Error || 210";
                                $this->load->view('errors/aap/error_210', $data);
                            }
                            
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
        }
        

        
        private function generate_refnum($prefix, int $length = 6)
        {
            $otp = "";
           
            $chars = 'ABCDEFGHJKLMNOPRQSTUVWXYZ0123456789';
           // $numbers = "0123456789";
            for ($i = 0; $i < $length; $i++) {
                $otp .= $chars[rand(0, strlen($chars) - 1)];
            }
            $ref = $prefix.''.date("Ymd").''.$otp;
            return $ref;
        }
        
        function back()
        {
            $data['title'] = 'Member Portal || Home';
            $mcode = $this->session->userdata('members_code');
            $baseURL = 'aapweis.aap.org.ph';
            $token = $this->api_model->generate_token();
                    if($token['status']== 200){
                        $link = $baseURL."/aap_webhook/weis/fetchmemberinfo/".$mcode;
                        $key = $token['token'];
                        $m = $this->api_model->get_api($link,$key);
                        $members_info = json_decode($m, TRUE);
                        if($members_info['status'] == 201){
                            $data['details'] = $members_info['details'];
                            $link2 = $baseURL."/aap_webhook/weis/fetchbulkmemberships/".$mcode;
                            $key = $token['token'];
                            $m2 = $this->api_model->get_api($link2,$key);
                            $members_record= json_decode($m2, TRUE);
                            if($members_record['status'] == 201){
                                $data['members_record'] = $members_record['details'];
                                
                                $link3 = $baseURL."/aap_webhook/weis/getavailablepoints/".$mcode;
                                $m3= $this->api_model->get_api($link3,$key);
                                $points= json_decode($m3, TRUE);
                                $data['rewards'] = $points['rewards'];
                                
                                $link4 = $baseURL."/aap_webhook/weis/fetchmembership/".$mcode;
                                $m4= $this->api_model->get_api($link4,$key);
                                $vehicle= json_decode($m4, TRUE);
                                
                                $ersbenifits = $baseURL."/aap_webhook/weis/GetERSBenefits/".$mcode;
                                $ersben= $this->api_model->get_api($ersbenifits,$key);
                                $ers= json_decode($ersben, TRUE);
                                $data['ersHistory'] = $ers['history'];
                                
                                $photolink = $baseURL."/aap_webhook/weis/GetMembersPhoto/".$mcode;
                                $photo= $this->api_model->get_photo($photolink,$key);
                                $data['img'] = base64_encode($photo);
                                
                            }else{
                                $data['title'] = "Error || 210";
                                $this->load->view('errors/aap/error_210', $data);
                            }
                            $data['title'] = 'Member Portal || Home';
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
        
        function checkout()
        {
            $data['title'] = 'Member Portal || Checkout';
            
            $payment = $this->input->post('payment');
            $branch = $this->input->post('branch');  
            $ref = $this->input->post('ref');
            $amount = $this->input->post('amount');
            $emailto = $this->input->post('email');
            
            $data = array(
                'reference_number' => $ref,
                'mode_of_payment' => $payment,
                'total_amount' => $amount,
            );
            $this->db->insert('member_payment', $data);
            if(isset($emailto)){
                $this->email_payment($emailto, $payment, $ref, $branch, $amount);
            }
            
            $mcode = $this->session->userdata('members_code');
            $token = $this->api_model->generate_token();
                    if($token['status']== 200){
                        $link = "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$mcode;
                        $key = $token['token'];
                        $m = $this->api_model->get_api($link,$key);
                        $members_info = json_decode($m, TRUE);
                        if($members_info['status'] == 201){
                            $data['details'] = $members_info['details'];
                            $link2 = "aapweis.aap.org.ph/aap_webhook/weis/fetchbulkmemberships/".$mcode;
                            $key = $token['token'];
                            $m2 = $this->api_model->get_api($link2,$key);
                            $members_record= json_decode($m2, TRUE);
                            if($members_record['status'] == 201){
                                $data['members_record'] = $members_record['details'];
                                
                                $link3 = "aapweis.aap.org.ph/aap_webhook/weis/getavailablepoints/".$mcode;
                                $m3= $this->api_model->get_api($link3,$key);
                                $points= json_decode($m3, TRUE);
                                $data['rewards'] = $points['rewards'];
                                
                                $link4 = "aapweis.aap.org.ph/aap_webhook/weis/fetchmembership/".$mcode;
                                $m4= $this->api_model->get_api($link4,$key);
                                $vehicle= json_decode($m4, TRUE);
                                
                                $ersbenifits = "aapweis.aap.org.ph/aap_webhook/weis/GetERSBenefits/".$mcode;
                                $ersben= $this->api_model->get_api($ersbenifits,$key);
                                $ers= json_decode($ersben, TRUE);
                                $data['ersHistory'] = $ers['history'];
                                
                                $photolink = "aapweis.aap.org.ph/aap_webhook/weis/GetMembersPhoto/".$mcode;
                                $photo= $this->api_model->get_photo($photolink,$key);
                                $data['img'] = base64_encode($photo);
                                
                            }else{
                                $data['title'] = "Error || 210";
                                $this->load->view('errors/aap/error_210', $data);
                            }
                            $data['title'] = 'MemberPortal || Home';
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
        
        function renewal()
        {
            
        $status = $this->input->post('status');
        $record = $this->input->post('record');  
        $branch = $this->input->post('branch');
        $plantype = $this->input->post('plantype');
        
        $fn = $_SESSION['fn'];
        $ln = $_SESSION['ln'];
        
        $imglic = $this->input->post('imglic');
        $idpicture = $this->input->post('idpicture');
          
        //$ispidp = $this->input->post('ispidp');
        $aq = $this->input->post('aq');
        $payment = $this->input->post('paymentmethod');
        $email = $this->input->post('email');
        
        $mcode = $this->input->post('pin');;
        
        //for file upload
        
        $image = NULL;
        $imagelic = NULL;
        $config['upload_path'] = 'assets/uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['max_size'] = 0;
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('idpicture')){
             $image = $this->upload->data('file_name');
        }
        if ($this->upload->do_upload('imglic'))
        {
            $imagelic = $this->upload->data('file_name');
        }
        
        
        $application_date = date("Y-m-d");
        $d = NULL;
        $d2 = NULL;
        $dradio = NULL;
        $lic = NULL;
        $licexp = NULL;
        $lictype = NULL;
        $card = NULL;
        $sr = NULL;
        
                        if($plantype === '1'){
				$amount = 2240;
                                $type = '1 - YEAR REGULAR MEMBERSHIP';
                                $prefix = 'R';
			}else if($plantype === '2'){
				$amount = 896;
                                $type = '1 - YEAR MEMBERSHIP LITE';
                                $prefix = 'L';
                        }else if($plantype === '3'){
				$amount = 3920;
                                $type ='1 - YEAR PIDP MEMBERSHIP';
                                $prefix = 'P';
                                $lic = strtoupper($this->input->post('lic'));
                                $licexp = $this->input->post('licexp');
                                $card = $this->input->post('card');  
                                $lictype = $this->input->post('lictype');
                                $r = $this->input->post('restriction');
                                $sr = serialize($r);
                                $d = $this->input->post('d');
                                
                                $dradio = $this->input->post('dradio');
                                if($dradio == 'SINGLE'){
                                    $paddl = 0;
                                    $d2 = NULL;
                                }else{
                                    $paddl = 560;
                                    $d2 = 'JAPAN';
                                }
                                $amount = $amount + $paddl;
			}else if($plantype === '4'){
				$amount = 1680;
                                $type ='1 - YEAR ASSOCIATE MEMBERSHIP';
                                $prefix = 'A';
			}else if($plantype === '5'){
				$amount = 5600;
                                $type ='3 - YEAR REGULAR MEMBERSHIP';
                                $prefix = 'R';
			}else if($plantype === '6'){
				$amount = 8960;
                                $type ='3 - YEAR PIDP MEMBERSHIP';
                                $prefix = 'P';
                                
                                $d = $this->input->post('d');
                                $lic = strtoupper($this->input->post('lic'));
                                $licexp = $this->input->post('licexp');
                                $card = $this->input->post('card');  
                                $lictype = $this->input->post('lictype');
                                $r = $this->input->post('restriction');
                                $sr = serialize($r);
                                $dradio = $this->input->post('dradio');
                                if($dradio == 'SINGLE'){
                                    $paddl = 0;
                                    $d2 = NULL;
                                }else{
                                    $paddl = 560;
                                    $d2 = 'JAPAN';
                                }
                                $amount = $amount + $paddl;
			}else if($plantype === '7'){
				$amount = 4200;
                                $type ='3 - YEAR ASSOCIATE MEMBERSHIP';
                                $prefix = 'A';
			}else if($plantype === '8'){
				$amount = 600;
                                $type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 1';
                                $prefix = 'B';
                        }else if($plantype === '9'){
				$amount = 900;
                                $type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 2';
                                $prefix = 'B';
                        }else if($plantype === '10'){
				$amount = 1500;
                                $type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 3';
                                $prefix = 'B';
                        }else if($plantype === '11'){
				$amount = 2500;
                                $type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 4';
                                $prefix = 'B';
                        }else if($plantype === '12'){
				$amount = 400;
                                $type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 1';
                                $prefix = 'B';
                        }else if($plantype === '13'){
				$amount = '1322.17';
                                $type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 3';
                                $prefix = 'B';
                        }else{
                            $amount = 0;
                            $type ='Please select plan type';
                        }

        $ref = $this->generate_refnum($prefix);
        $data = array(
                    'category' => 'ONLINE',
                    'platform' => 'WEBPORTAL',
                    'typesofapplication' => 'RENEW',
                    'application_date'  => $application_date,
                    'pincode' => $mcode,
                    'branch' 	=> $branch,
                    'members_lastname' => $ln,
                    'members_firstname' 	=> $fn,
                    'plan_type' 	=> $type,
                    'plantype_id' 	=> $plantype,
                    'members_destination' 	=> $d,
                    'members_destination2' 	=> $d2,
                    'members_licenseno'  => $lic,
                    'members_licenseexpirationdate' 	=> $licexp,
                    'members_licensetype' 	=> $lictype,
                    'members_licensecard' 	=> $card,
                    'members_licenserest'  => $sr,
                    'pidp' => $dradio,
                    'idpicture' => $image,
                    'imglic' => $imagelic,
                    'reference_number' => $ref,
                    'status' => 'PENDING',
                    'is_aq' => $aq
		);
        $this->db->insert('members_application', $data);
        if(isset($email)){
            $this->email_confirmation($email,$ref, $plantype);
        }
        
        if($payment === 'CREDIT CARD'){
            $percent = 2.8;
            $transaction_fee = 5.00;
            $bankcharge = $amount * ($percent/100);
            $total = $amount + $bankcharge + $transaction_fee;
            
            $transaction_uuid = $this->input->post('transaction_uuid');
            $unsigned_field_names = $this->input->post('unsigned_field_names');
            $signed_date_time = $this->input->post('signed_date_time');
            $params = array(
                'access_key' => $this->config->item('access_key'),
                'profile_id' => $this->config->item('profile_id'),
                'transaction_uuid' => $transaction_uuid,
                'signed_field_names' => $this->config->item('signed_field_names'),
                'unsigned_field_names' => $unsigned_field_names,
                'signed_date_time' => $signed_date_time,
                'locale' => $this->config->item('locale'),
                'transaction_type' => $this->config->item('transaction_type'),
                'currency' => $this->config->item('currency'),
                'reference_number' => $ref,
                'auth_trans_ref_no' => $ref,
                'amount' => $total
            );
            
            $info = array(
                'email' => $email,
                'payment' => $payment,
                'refnum' => $ref,
                'branch' => $branch,
                'types' => $type,
                'transaction_fee' => $transaction_fee,
                'bankcharge' => $bankcharge,
                'amount' => $total
            );
            
            $signature = $this->sign($params);
            $params['signature'] = $signature;
            $data['params'] = $params;
            $data['info'] = $info;
            
            $this->load->view('forms/confirm', $data);
            
        }else{
            $info = array(
                'email' => $email,
                'payment' => $payment,
                'refnum' => $ref,
                'branch' => $branch,
                'types' => $type,
                'amount' => $amount
            );
            
            $data['info'] = $info;
            
            
            $this->load->view('forms/confirm_payment', $data);
        }
    }    
        function sign ($params) {
            $secret_key = $this->config->item('secret_key');
            return $this->signData($this->buildDataToSign($params), $secret_key);
        }

        function signData($data, $secretKey) {
              return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
        }

        function buildDataToSign($params) {
                  $signedFieldNames = explode(",",$params["signed_field_names"]);
                  foreach ($signedFieldNames as $field) {
                     $dataToSign[] = $field . "=" . $params[$field];
                  }
                  return $this->commaSeparate($dataToSign);
        }

        function commaSeparate ($dataToSign) {
              return implode(",",$dataToSign);
        }

    
    function getDestination() {
	$token = $this->api_model->generate_token();
            if(isset($token)){ 
                if($token['status']== 200){
                    $link = $baseURL."/aap_webhook/weis/getdestination";
                    $key = $token['token'];
                    $m = $this->api_model->get_api($link,$key);
                    $destination = json_decode($m, TRUE);
                    
                    if($destination['status'] == 201){
                        $data['data'] = $destination['data'];
                        if (isset($_GET['term'])){
                            foreach ($destination['data'] as $c ){
                               $q= strtolower($_GET['term']);
                               $found = $this->like($c['destination_name'],$q);
                                if($found){
                                 $row_set[] = array(
                                    'destination' => htmlentities(stripslashes($c['destination_name'])),
                                    'remarks' => htmlentities(stripslashes($c['remarks']))
                                    );
                                }
                           }
                          echo json_encode($row_set);
                        }
                       
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
    }
  
function like($str, $searchTerm) {
        $searchTerm = strtolower($searchTerm);
        $str = strtolower($str);
        $pos = strpos($str, $searchTerm);
        if ($pos === false)
            return false;
        else
        return true;
    }
        
        
    function cancelled() 
    {
        $button = $this->input->post('button'); 
        $id = $this->input->post('id');
        $email = $this->input->post('email');
	if($button == 'YES')
	{
            $this->db->where('reference_number', $id);
            $this->db->delete('members_application');
            
            echo "<script>
            setTimeout(function() { alert('Your renewal application was cancelled. Redirecting to Dashboard..'); }, 100);
            </script>";
            $mcode = $this->session->userdata('members_code'); 
            $token = $this->api_model->generate_token();
                if(isset($token)){ 
                    if($token['status']== 200){
                        $link = "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$mcode;
                        $key = $token['token'];
                        $m = $this->api_model->get_api($link,$key);
                        $members_info = json_decode($m, TRUE);
                      
                        if($members_info['status'] == 201){
                            $data['details'] = $members_info['details'];
                            $link2 = "aapweis.aap.org.ph/aap_webhook/weis/fetchbulkmemberships/".$mcode;
                            $key = $token['token'];
                            $m2 = $this->api_model->get_api($link2,$key);
                            $members_record= json_decode($m2, TRUE);
                            if($members_record['status'] == 201){
                                $data['members_record'] = $members_record['details'];
                                
                                $link3 = "aapweis.aap.org.ph/aap_webhook/weis/getavailablepoints/".$mcode;
                                $m3= $this->api_model->get_api($link3,$key);
                                $points= json_decode($m3, TRUE);
                                $data['rewards'] = $points['rewards'];
                                
                                $link4 = "aapweis.aap.org.ph/aap_webhook/weis/fetchmembership/".$mcode;
                                $m4= $this->api_model->get_api($link4,$key);
                                $vehicle= json_decode($m4, TRUE);
                                
                                $ersbenifits = "aapweis.aap.org.ph/aap_webhook/weis/GetERSBenefits/".$mcode;
                                $ersben= $this->api_model->get_api($ersbenifits,$key);
                                $ers= json_decode($ersben, TRUE);
                                $data['ersHistory'] = $ers['history'];
                                
                                $photolink = "aapweis.aap.org.ph/aap_webhook/weis/GetMembersPhoto/".$mcode;
                                $photo= $this->api_model->get_photo($photolink,$key);
                                $data['img'] = base64_encode($photo);
                                
                                $data['title'] = 'Member Portal || Home';
                                $data['message_display'] = 'Cancelled Online Application';
                                if(isset($email)){
                                    $this->email_cancelled($email,$id);
                                }

                                $this->load->view('forms/dashboard', $data);
                            }else{
                                $data['title'] = "Error || 210";
                                $this->load->view('errors/aap/error_210', $data);
                            }
                            
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

	}
    }  
    
    function email_cancelled($emailto, $id){
        
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
        $htmlContent = '<p>AAP MEMBERSHIP APPLICATION REFERENCE NO.</p>';
        $htmlContent .= '<h3>'.$id.'</h3>';
        $htmlContent .= '<p>Your Application Was Cancelled.</p><br>';
        $htmlContent .= '<p>Please be advised that your online application did not push through. Your information and the requirements that you uploaded were not saved in our system.</p>';
	$htmlContent .= '<p>If you wish to re-apply, please log on to www.aap.org.ph and go through the online application process again.</p>';
	$htmlContent .= '<p>For inquiries, you may call (63 2) 8705-33-33 or email membershipservices@aap.org.ph.</p><br>';
	$htmlContent .= '<p>Thank you and drive safely!</p>';

        $this->email->to($emailto);
        $this->email->from($from,'Automobile Association Philippines - Online Application');
        $this->email->cc('alerts@aap.org.ph', 'Copy of Cancelled AAP Online Application');
        $this->email->subject('Cancelled AAP Online Application');
        $this->email->message($htmlContent);

        //Send email
        if($this->email->send()) {
            $this->session->set_flashdata("email_sent","Email sent successfully."); 
        }else {
            $d = $this->email->print_debugger();
            $this->session->set_flashdata("email_sent",$d); 
        }
    }
      
    function email_confirmation($emailto, $id, $plantype){
        
        
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
        
    if($plantype == '3' OR $plantype == '6'){
       
        $htmlContent = '<p>PIDP APPLICATION REFERENCE NO.</p>';
        $htmlContent .= '<h3>'.$id.'</h3>';
        $htmlContent .= '<p>Thank you for applying online!</p><br>';
        $htmlContent .= '<p>We are now processing your application. Please use this reference number when inquiring about your Philippine international driving permit (PIDP).</p>';
        $htmlContent .= '<p>For payment options and details, please check <a href="https://www.aap.org.ph/">www.aap.org.ph.</a></p>';
	$htmlContent .= '<p>As soon as we have confirmed your payment, we will notify you when your PIDP will be available and provide delivery information.</p>';
	$htmlContent .= '<p>For inquiries, you may call (63 2) 8705-33-33 or email membershipservices@aap.org.ph.</p><br>';
        $htmlContent .= '<p>Thank you and drive safely!</p>';
        
        $this->email->subject('PIDP Application Reference No.'.$id.' - Renewal Confirmation');
            
    }else{
        //Email content
        $htmlContent = '<p>AAP MEMBERSHIP APPLICATION REFERENCE NO.</p>';
        $htmlContent .= '<h3>'.$id.'</h3>';
        $htmlContent .= '<p>Thank you for applying online!</p><br>';
        $htmlContent .= '<p>We are now processing your application. Please use this reference number when inquiring about your AAP Membership.</p>';
        $htmlContent .= '<p>For payment options and details, please check <a href="https://www.aap.org.ph/">www.aap.org.ph.</a></p>';
	$htmlContent .= '<p>As soon as we have confirmed your payment, we will notify you when your AAP Membership kit will be available and provide delivery information.</p>';
	$htmlContent .= '<p>For inquiries, you may call (63 2) 8705-33-33 or email membershipservices@aap.org.ph.</p><br>';
        $htmlContent .= '<p>Thank you and drive safely!</p>';
        
        $this->email->subject('AAP Membership Application Reference No.'.$id.' - Renewal Confirmation');
    }
    
        $this->email->to($emailto);
        $this->email->from($from,'Automobile Association Philippines - Online Application');
        $this->email->cc('alerts@aap.org.ph', 'Copy of Confirmation of Online Application');
        
        $this->email->message($htmlContent);

        //Send email
        if($this->email->send()) {
            $this->session->set_flashdata("email_sent","Email sent successfully."); 
        }else {
            $d = $this->email->print_debugger();
            $this->session->set_flashdata("email_sent",$d); 
        }
    }
    
    
    function email_payment($emailto, $payment,$refnum,$branch,$amount){
        
        
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
        
        $amount = number_format($amount, 2);
        if($payment == 'CASH'){

            $htmlContent = '<p>CASH PAYMENT</p>';
            $htmlContent .= '<p> Reference No. '.$refnum.'</p>';
            $htmlContent .= '<p> Please pay at '.$branch.' Office.</p>';
            $htmlContent .= '<p> Amount to pay: <span>&#8369;</span> '.$amount.'</p>';
            
        }else if($payment == 'BDO'){
            
            $htmlContent = '<p>BDO Bill Payment</p><br>';
            $htmlContent .= '<p> Fill out the BDO Bills Payment Slip with the following:</p>';
            $htmlContent .= '<p> a. Company name - Automobile Association Philippines</p>';
            $htmlContent .= '<p> b. Institution code - # 0136</p>';
            $htmlContent .= "<p> c. Subscriber's acct number – Reference # generated by the website for onlineapplicationor call 705-3333 loc. 211 or 225 to get a temporary pin# for payment.</p>";
            $htmlContent .= "<p> d. Subscriber's account name – member's full name - Upon teller's validation, the BDO Payment Slip serves as your official receipt</p>";
            
        }else if($payment == 'BPI'){
            
            $htmlContent = "<p>BPI's check free payments</p>";
            $htmlContent .= "<p>Types of payment: online payment (Express Online); mobile payment (Express Mobile); phone payment (Express Phone); and ATM payment (Express Teller ATM)</p>";
            $htmlContent .= "<p>How it works:</p>";
            $htmlContent .= "<p>- Enroll your account through phone banking, BPI website or one-time visit to BPI branch of account and enroll your AAP membership number or temporary pin # as your referencenumber in BPI's Bill Payment Facility</p>";
            $htmlContent .= "<p>- Pay your membership dues using the desired payment options mentioned above</p>";
            $htmlContent .= "<p>Note:Applicable for renewal/old member's with alpha numeric membership number and BPI card holders only or you may call 705-3333 loc. 211 and get a temporary pin # for payment.</p>";
            $htmlContent .= "<p>For more information on BPI payments, visit <a href='www.bpiexpressonline.com'>www.bpiexpressonline.com</a> or call 89-100.</p>";
            $htmlContent .= "<p>For online application assistance, email info@aap.org.ph or call 705-3333</p>";
            
        }else if($payment == 'CEBUANA'){   
            $htmlContent = "<p>Cebuana Lhuillier</p></br>";
            $htmlContent .= "<p>AAP members can also pay through Cebuana Lhuillier branches by following these simple steps:</p>";
            $htmlContent .= "<p>1. Fill out the Pera Padala Form:</p>";
            $htmlContent .= "<p>Sender's Name: ( Your name)</p>";
            $htmlContent .= "<p>Receiver's Name: AUTOMOBILE ASSOCIATION OF THE PHILIPPINES INC.</p>";
            $htmlContent .= "<p>Transaction Type: COLLECTION</p>";
            $htmlContent .= "<p>Amount: <span>&#8369;</span> ".$amount." </p>";
            $htmlContent .= "<p>Reference No.: ".$refnum."</p>";
            $htmlContent .= "<p>* a. New Membership: You can get your Reference No. from the message prompt after successfully applying for AAP membership online at www.aap.org.ph</p>";
            $htmlContent .= "<p> b. Renewal: Your AAP Member's Code (located above your name in your AAP membership card) will serve as your Reference No.</p>";
            $htmlContent .= "<p>2. Present the Pera Padala Form and cash to the branch personnel<p>";
            $htmlContent .= "<p>3. Get your validated Pera Padala Form to serve as your proof of payment<p><br/>";
            $htmlContent .= "<p>NOTE: <span>&#8369;</span> 15 will be charged for every transaction.</p>";

        }else if($payment == 'CHECK'){  
            $htmlContent = "<p>Check Payment</p>";
            $htmlContent .= '<p>Check Payment payable to : "Automobile Association of the Philippines, Inc."</p>';
            
        }else if($payment == 'PICK-UP'){ 
            $htmlContent = "<p>Collector's Pick-Up</p>";
            $htmlContent .= '<p>You may call 705-3333 to schedule for pick-up within Metro Manila.</p>';
        }
        
        
        $this->email->subject('Payment Method');
        $this->email->to($emailto);
        $this->email->from($from,'Automobile Association Philippines - Online Application');
        $this->email->cc('alerts@aap.org.ph', 'Copy of Confirmation of Online Application');
        
        $this->email->message($htmlContent);

        //Send email
        if($this->email->send()) {
            $this->session->set_flashdata("email_sent","Email sent successfully."); 
        }else {
            $d = $this->email->print_debugger();
            $this->session->set_flashdata("email_sent",$d); 
        }
    }
    
    function insert_union_paymentmethod()
    {
	
	$pm=$this->input->post('pm');
        $ref=$this->input->post('ref');
        $amount=$this->input->post('amount');
        $data = array(
            'reference_number' => $ref,
            'mode_of_payment' => $pm,
            'total_amount' => $amount
                
        );
	$this->db->insert('member_payment', $data); 
    }
    function applypromocode()
    {
        
        $code = $this->input->post('promocode');
        $result = $this->db->where(array("promo_code"=>  strtoupper(trim($code))))->get('promo')->result_array();
        if (count($result) > 0){
                echo json_encode(array(
                                        "statusCode"=>200,
                                        "value"=>$result[0]['promo_amount'],
                                        "type" =>$result[0]['promo_type'],
                                        "now" => date('Y-m-d'),
                                        "start" =>$result[0]['promo_start'],
                                        "end" =>$result[0]['promo_end']
                                ));
        }
        else{
                echo json_encode(array("statusCode"=>201));
        }
    }
       
}
