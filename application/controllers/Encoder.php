<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encoder  extends CI_Controller
{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('encoder_model');
            $this->load->model('dashboard_model');
            $this->load->model('api_model');
        }
    	public function index($msg = NULL)
        {
            $data['title'] = 'Encoder Login';
            $data['msg'] = $msg;
            $this->load->view('encoder/encoder_login',$data);
        }

        public function loginAuth()
        {
            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $user_data = array(
                'username' => $username,
                'password' => $password
            );
            //var_dump($user_data);
            $domain = $this->config->item('weis_api');
			$token = $this->api_model->generate_token($domain);
			
                if(isset($token)){ 
                    if($token['status']== 200){
                        $key = $token['token'];
                        $url =  $domain."/weis/fetchuser";
						//var_dump($url);
                        //$url = 'aapweis.aap.org.ph/aap_webhook/weis/fetchuser';
                        $m = $this->post_api($url, $user_data, $key);
                        $status = $m['status'];
                        //var_dump($m['userinfo'][0]);
                       
                        if($status === 201){
                            $today = date("Y-m-d");
                            $data['result_online'] = $this->db->select('*')->where('category="ONLINE"')->get('members_application');
                            $data['result_kiosk'] = $this->db->select('*')->where('category="KIOSK"')->get('members_application');
                            $data['daily_online'] = $this->db->select('*')->where('category="ONLINE" AND application_date = "'.$today.'"')->get('members_application');
                            $data['daily_kiosk'] = $this->db->select('*')->where('category="KIOSK" AND application_date = "'.$today.'"')->get('members_application');
                            $user_info = array(
                                    'user_id' => $m['userinfo'][0]['user_id'],
                                    'fname' => $m['userinfo'][0]['user_firstname'],
                                    'lname' => $m['userinfo'][0]['user_lastname'],
                                    'username' => $m['userinfo'][0]['user_username'],
                                    'branch' => $m['userinfo'][0]['branch_name'],
                                    'branch_id' => $m['userinfo'][0]['branch_id'],
                                    );
                            
                            $this->session->set_userdata($user_info);
                            $data['fname'] = $m['userinfo'][0]['user_firstname'];
                            $data['lname'] = $m['userinfo'][0]['user_lastname'];
                            $data['bname'] = $m['userinfo'][0]['branch_name'];
                            $data['title'] = 'Encoder Dashboard';
                            $data['footer'] = $this->config->item('footer');
                            $this->load->view('encoder/dashboard',$data);
                        }else{
                            $msg = '<font color=red>Invalid username and/or password.</font><br />';
                            $this->index($msg);
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
        
        public function home()
        {
                $today = date("Y-m-d");
                $data['result_online'] = $this->db->select('*')->where('category="ONLINE"')->get('members_application');
                $data['result_kiosk'] = $this->db->select('*')->where('category="KIOSK"')->get('members_application');
                $data['daily_online'] = $this->db->select('*')->where('category="ONLINE" AND application_date = "'.$today.'"')->get('members_application');
                $data['daily_kiosk'] = $this->db->select('*')->where('category="KIOSK" AND application_date = "'.$today.'"')->get('members_application');
                $data['fname'] = $this->session->userdata('fname');
                $data['lname'] = $this->session->userdata('lname');
                $data['bname'] = $this->session->userdata('branch');
                $data['title'] = 'Encoder Dashboard';
                
                $data['footer'] = $this->config->item('footer');
                $this->load->view('encoder/dashboard',$data);
        }
	
	function onlineDashboard()
	{
            
            $data['title'] = 'Mobile Dashboard';
            $data['title'] = 'Kiosk Dashboard';
            $data['result_online'] =  $this->db->select('*')->where('category="MOBILE" AND status != "SUCCESS"')->get('members_application');
            $data['fname'] = $this->session->userdata('fname');
            $data['lname'] = $this->session->userdata('lname');
            $data['bname'] = $this->session->userdata('branch');
            $this->load->view('encoder/online',$data);
            
	}
            	
	function kioskDashboard()
	{
            $data['title'] = 'Kiosk Dashboard';
            $n = $this->db->select('*')->where('category="KIOSK" AND (status != "SUCCESS" AND status != "CANCELLED") ')->get('members_application');
            $data['result_kiosk'] =  $n;
			$data['fname'] = $this->session->userdata('fname');
            $data['lname'] = $this->session->userdata('lname');
            $data['bname'] = $this->session->userdata('branch');
            $this->load->view('encoder/kiosk',$data);
	}
        
        function review(){
            
            $id = $this->uri->segment(4);
            $status = $this->uri->segment(3);
            $data['title'] = 'Process Application';
            $data['result_info'] = $this->encoder_model->get_application($id);
            if($status == 'NEW'){
                $this->load->view('encoder/review_application',$data);
            }else{
                $result = $this->encoder_model->get_application($id);
                foreach ($result->result() as $row){
                    $mcode = $row->pincode;
                }
               
                $domain = $this->config->item('weis_api');
				$token = $this->api_model->generate_token($domain);
                if(isset($token)){ 
                    if($token['status']== 200){
                        $link = $domain."/weis/fetchmemberinfo/".$mcode;
                        $key = $token['token'];
                        $m = $this->api_model->get_api($link,$key);
                        $members_info = json_decode($m, TRUE);
                      
                        if($members_info['status'] == 201){
                            $data['details'] = $members_info['details'];
                            $data['status'] = $status;
                            $link2 =  $domain."/weis/fetchbulkmemberships/".$mcode;
                            $key = $token['token'];
                            $m2 = $this->api_model->get_api($link2,$key);
                            $members_record= json_decode($m2, TRUE);
                            if($members_record['status'] == 201){
                                $data['members_record'] = $members_record['details'];
                                
                                $photolink =  $domain."/weis/GetMembersPhoto/".$mcode;
                                $photo= $this->api_model->get_photo($photolink,$key);
                                $data['img'] = base64_encode($photo);
                                $this->load->view('encoder/review_renewal',$data);
                                
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
        
        function review_result(){
            
            $button = $this->input->post('button');
            
            if($button == 'SAVE'){
                $id = $this->input->post('id');
                //var_dump($id);
                $remarks = $this->input->post('remarks');
                $status = $this->input->post('status');
                $data = [
                    'remarks' => $remarks,
                    'status' => $status,
                ];
                $this->db->where('application_id', $id);
                $this->db->update('members_application', $data);
                $data['title'] = 'Online Dashboard';
                $data['result_online'] =  $this->db->select('*')->where('category="ONLINE"')->get('members_application');
                $this->load->view('encoder/online',$data);
                
            }else{
                 
                
            } 
        }
	
	function monthJson()
	{
		$sql = "SELECT count(s.countA) as mid FROM member_month as m LEFT JOIN(SELECT date_format(application_date,'%m') as m, application_id as countA from members_application WHERE category = 'ONLINE')s ON m.month_code = s.m GROUP BY m.month_code";
		$query = $this->db->query($sql)->result();
		echo json_encode($query);
	}
        
        
        function kiosk_application()
        {
            $id = $this->uri->segment(4);
            $status = $this->uri->segment(3);
            $data['title'] = 'Process Application';
            $data['result_info'] = $this->encoder_model->get_application($id);
            $data['fname'] = $this->session->userdata('fname');
            $data['lname'] = $this->session->userdata('lname');
            $data['bname'] = $this->session->userdata('branch');
            $data['card'] = array('CARD', 'NON CARD');
            $data['lictype'] = array('PROFESSIONAL', 'NON-PROFESSIONAL');
            $data['initiator'] = $this->encoder_model->get_initiator();
            if($status == 'NEW'){
               
                $result = $this->encoder_model->get_application($id);
                foreach ($result->result() as $row){
                    $city = $row->members_housecity;
                    $province = $row->members_housedistrict;
                    $country1 = $row->members_destination;
                }
               $result_province = $this->encoder_model->get_province($province);
                foreach ($result_province as $row){
                    $dname = $row->district_name;
                    $did = $row->district_id;
                }
                
                $result_city = $this->encoder_model->get_city($city,$did);
               
                foreach ($result_city as $row){
                    $cname = $row->city_name;
                }
                
                $result_coutry1 = $this->encoder_model->get_country($country1);
                foreach ($result_coutry1 as $row){
                    $c1 = $row->ad_name;
                }
                $data['city'] = isset($cname)?$cname:'';
                $data['province'] = isset($dname)?$dname:'';
                $data['country1'] = isset($c1)?$c1:'';
                $this->load->view('encoder/review_new',$data);
            }else{
                $result = $this->encoder_model->get_application($id);
                foreach ($result->result() as $row){
                    $pin = $row->pincode;
                    $rec = $row->record_id;
                }
                $rs = $this->member_data($pin,$rec);
                $data['records'] = $rs;
                $this->load->view('encoder/review_renewal',$data);
            }
        }
        function online_application()
        {
            $id = $this->uri->segment(4);
            $status = $this->uri->segment(3);
            $data['title'] = 'Process Application';
            $data['result_info'] = $this->encoder_model->get_application($id);
            $data['fname'] = $this->session->userdata('fname');
            $data['lname'] = $this->session->userdata('lname');
            $data['bname'] = $this->session->userdata('branch');
            $data['card'] = array('CARD', 'NON CARD');
            $data['lictype'] = array('PROFESSIONAL', 'NON-PROFESSIONAL');
            $data['initiator'] = $this->encoder_model->get_initiator();
            if($status == 'NEW'){
               
                $result = $this->encoder_model->get_application($id);
                foreach ($result->result() as $row){
                    $city = $row->members_housecity;
                    $province = $row->members_housedistrict;
                    $country1 = $row->members_destination;
                }
               $result_province = $this->encoder_model->get_province($province);
                foreach ($result_province as $row){
                    $dname = $row->district_name;
                    $did = $row->district_id;
                }
                
                $result_city = $this->encoder_model->get_city($city,$did);
               
                foreach ($result_city as $row){
                    $cname = $row->city_name;
                }
                
                $result_coutry1 = $this->encoder_model->get_country($country1);
                foreach ($result_coutry1 as $row){
                    $c1 = $row->ad_name;
                }
                $data['city'] = isset($cname)?$cname:'';
                $data['province'] = isset($dname)?$dname:'';
                $data['country1'] = isset($c1)?$c1:'';
                $this->load->view('encoder/review_new_online',$data);
            }else{
               $result = $this->encoder_model->get_application($id);
                foreach ($result as $row){
                    $id = $row->pincode;
                    $rec = $row->record_id;
                }
                $rs = $this->member_data($id,$rec);
                
                $data['result'] = $rs;
                $this->load->view('encoder/review_renewal_online',$data);
            }
        }
        
        function change_status(){
            
            $button = $this->input->post('button');
            $getstatus = $this->input->post('getstatus');
            if($button == 'SAVE'){
                $id = $this->input->post('id');
                $remarks = $this->input->post('remarks');
                
                $data = [
                    'remarks' => $remarks,
                    'status' => $getstatus,
                ];
                $this->db->where('application_id', $id);
                $this->db->update('members_application', $data);
                $this->kioskDashboard();
                
            }else{
                 
                $id = $this->input->post('id');
                
                $uradio = $this->input->post('uradio');
                $pin = $this->input->post('pin');
                $memid = $this->input->post('memid');
                $adate = $this->input->post('adate');
                $aq = $this->input->post('aq');
                
                if($aq == 'YES'){
                    $aq = '1';
                }else if($aq == NULL){
                    $aq = '0';
                }else{
                    $aq = '0';
                }
                
                $salutation = $this->input->post('salutation');
                $fname = strtoupper($this->input->post('fname'));
                $mname = strtoupper($this->input->post('mname'));
                $lname = $this->input->post('lname');
				
                $bday = $this->input->post('bday');
                $bplace = $this->input->post('bplace');
                $sex = $this->input->post('sex');
                $cstatus = $this->input->post('cstatus');
                $occupation = strtoupper($this->input->post('occupation'));
                $h1 = strtoupper($this->input->post('h1'));
                $h2 = strtoupper($this->input->post('h2'));
                $city = strtoupper($this->input->post('city'));
                $province = strtoupper($this->input->post('province'));
                $zip = $this->input->post('zip');
                $oh1 = strtoupper($this->input->post('oh1'));
                $oh2 = strtoupper($this->input->post('oh2'));
                $ocity = strtoupper($this->input->post('ocity'));
                $oprovince = strtoupper($this->input->post('oprovince'));
                $ozip = $this->input->post('ozip');
				$company = $this->input->post('company');
                $mailing = $this->input->post('mailing');
                if($mailing == 'HOME ADDRESS'){
                    $mailing = "HOUSE ADDRESS";
                }else{
                    $mailing;
                }
                $mobile = $this->input->post('mobile');
                $email = $this->input->post('email');
				$amobile = $this->input->post('amobile');
                $aemail = $this->input->post('aemail');
			
			if($uradio == '1'){
				if($email == ''){
					$email = "";
				}else{
					$email;
				}
				
				if($aemail == ''){
					$aemail = "";
				}else{
					$aemail;
				}
			}else{
				if($email == ''){
					$email = "NONE";
				}else{
					$email;
				}
				
				if($aemail == ''){
					$aemail = "NONE";
				}else{
					$aemail;
				}
			}
			
				
				
				$tel = $this->input->post('tel');
				$atel = $this->input->post('atel');
                $citizenship = $this->input->post('citizenship');
                $nationality = $this->input->post('nationality');
                $acr = $this->input->post('acr');
                $destination = $this->input->post('d');
                
                $lic = $this->input->post('lic');
                $licexp = $this->input->post('licexp');
                $card = $this->input->post('card');
                $lictype = $this->input->post('lictype');
                $res = $this->input->post('restriction');
               
                $sr = serialize($res);
                
                
                $rname = $this->input->post('rname');
                $rcontact = $this->input->post('rcontact');
                $raddress = $this->input->post('raddress');
                
                $cs1 = $this->input->post('cs1');
                if($cs1 == 'YES'){
                    $cs1 = '1';
                }else if($cs1 == NULL){
                    $cs1 = '0';
                }else{
                    $cs1 = '0';
                }
                $plate1 = strtoupper($this->input->post('plate1'));
                $make1 = strtoupper($this->input->post('make1'));
                $model1 = strtoupper($this->input->post('model1'));
                $year1 = strtoupper($this->input->post('year1'));
                $color1 = strtoupper($this->input->post('color1'));
                $fuel1 = strtoupper($this->input->post('fuel1'));
                $trans1 = strtoupper($this->input->post('trans1'));
                
                $cs2 = $this->input->post('cs2');
                if($cs2 == 'YES'){
                    $cs2 = '1';
                }else if($cs2 == NULL){
                    $cs2 = '0';
                }else{
                    $cs2 = '0';
                }
                $plate2 = strtoupper($this->input->post('plate2'));
                $make2 = strtoupper($this->input->post('make2'));
                $model2 = strtoupper($this->input->post('model2'));
                $year2 = strtoupper($this->input->post('year2'));
                $color2 = strtoupper($this->input->post('color2'));
                $fuel2 = strtoupper($this->input->post('fuel2'));
                $trans2 = strtoupper($this->input->post('trans2'));
               
                $types = strtoupper($this->input->post('types'));
                $mem = strtoupper($this->input->post('mem'));
                $plan = strtoupper($this->input->post('plan'));
              
                
                $rec = $this->input->post('recordno');
                $insurance = $this->input->post('insurance');
                $activedate = $this->input->post('activedate');
                $expiredate = $this->input->post('expiredate');
                $initiator = $this->input->post('initiator');
				
                $pidp_plantype = $this->input->post('pidp_plantype');
               
                $vehicles = array(
                    array(
                    'is_conduction' =>  $cs1,   
                    'plateno' => $plate1,
                    'brand' => $make1,
                    'model' => $model1,
                    'year' => $year1,
                    'color' => $color1,
                    'fuel_type' => $fuel1,
                    'transmission_type' => $trans1,
                    'registration_date' => $adate
                    ),
                    array(
                    'is_conduction' =>  $cs2,    
                    'plateno' => $plate2,
                    'brand' => $make2,
                    'model' => $model2,
                    'year' => $year2,
                    'color' => $color2,
                    'fuel_type' => $fuel2,
                    'transmission_type' => $trans2,
                    'registration_date' => $adate
                    )
                );
                
			
                $member[] = array(
                    'set' => $types,
                    'record_no' => $rec,
                    'branch' => '1',
                    'type' => $mem,
                    'initiator' => $initiator,
                    'plantype' => $plan,
                    'category' => 'KIOSK',
                    'insuranceno' => $insurance,
                    'registrationdate' => $adate,
                    'activedate' => $activedate,
                    'expiredate' => $expiredate,
                    'pidpplantype' => $pidp_plantype,
                    'pidp_no' => '',
                    'licenseno' => $lic,
                    'licensetype' => $lictype,
                    'loclicenseexpdate' => $licexp,
                    'cardtype' => $card,
                    'representative' => utf8_encode($rname),
                    'repcontact' => utf8_encode($rcontact),
                    'repaddress' => utf8_encode($raddress),
                    'restrictions' => $sr,
                    'vehicles' => $vehicles
                    
                );
			
                
                $json_data = array(
                    'to_update' => $uradio,
                    'members_id' => $memid,
                    'pincode' => $pin,
                    'registration_date' => $adate,
                    'is_onlineaq' => $aq,
                    'title' => $salutation,
                    'lastname' => utf8_encode($lname),
                    'firstname' => utf8_encode($fname),
                    'middlename' =>utf8_encode($mname),
                    'birthdate' => $bday,
                    'birthplace' => $bplace,
                    'gender' => $sex,
                    'civilstatus' => $cstatus,
                    'occupation' => $occupation,
                    'housebuildingst' => utf8_encode($h1),
                    'housebarangay' => utf8_encode($h2),
                    'housecity' => utf8_encode($city),
                    'houseprovince' => utf8_encode($province),
                    'housezipcode' => $zip,
					'housephoneno' => $tel,
                    'officebuildingst' => utf8_encode($oh1),
                    'officebarangay' => utf8_encode($oh2),
                    'officecity' => utf8_encode($ocity),
                    'officeprovince' => utf8_encode($oprovince),
                    'officezipcode'  =>  $ozip,
					'officephoneno' => $atel,
					'businessname' => $company,
                    'mobileno' => $mobile,
                    'emailaddress' => utf8_encode($email),
					'alternate_mobileno' => $amobile,
                    'alternate_emailaddress' => utf8_encode($aemail),
                    'mailingpreference' => $mailing,
                    'citizenship' => $citizenship,
                    'otherdetailscitizenship' => $nationality,
                    'acrno' => $acr,
                    'destination' => $destination,
                    'membership' => $member
                );
                
                $membership_data = json_encode($json_data);
				//var_dump($membership_data);
				$domain = $this->config->item('weis_api');
				$token = $this->api_model->generate_token($domain);
                if(isset($token)){ 
                    if($token['status']== 200){
                        $key = $token['token'];
                        $m = $this->post_member($membership_data,$key);
                        
                        
                        if($m['status'] == 201){
                           $rdata['status'] = 'SUCCESS';
                           if(isset($m['msg'])){
                                $data['msg'] = $m['msg'] ;
                            }else{
                                 $data['msg'] = 'ERROR FOUND';
                            }
                        }else if($m['status'] == 402){
                            if(!empty($m['msg'])){
                                $data['msg'] = $m['details']['message'];
                            }else{
                                 $data['msg'] = 'ERROR FOUND';
                            }
                            $rdata['status'] = $getstatus;
                        }else{
                            if(isset($m['msg'])){
                                $data['msg'] = $m['details']['message'];
                            }else{
                                 $data['msg'] = 'ERROR FOUND';
                            }
                            $rdata['status'] = $getstatus;
                        }
                        
                        $this->db->where('application_id', $id);
                        $this->db->update('members_application', $rdata);
                        $data['title'] = "Confirmation Page";
                        $this->load->view('encoder/success_kiosk', $data);
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
        
    function post_member($member,$secretKey){
        
            //$url = 'aapweis.aap.org.ph/aap_webhook/weis/Member';
			$domain = $this->config->item('weis_api');
            $url = $domain.'/weis/Member';
            /* Init cURL resource */
            $ch = curl_init($url);
           
            /* Init cURL resource */
            $ch = curl_init($url);
            
             /* set return type json */
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            
            /* Array Parameter Data */
            //$data =  json_encode($k, JSON_UNESCAPED_SLASHES);
            $data = $member;
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:' . $secretKey));
            /* set return type json */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            /* execute request */
            $result = curl_exec($ch);
            
            $transaction = json_decode($result, TRUE);
            
            /* close cURL resource */
            curl_close($ch);  
            
            return $transaction;
    }
    
    function post_api($url,$data,$secretKey){
        

            /* Init cURL resource */
            $ch = curl_init($url);
           
            /* Init cURL resource */
            $ch = curl_init($url);
            
             /* set return type json */
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            
            /* Array Parameter Data */
            $data =  json_encode($data, JSON_UNESCAPED_SLASHES);
            
            //var_dump($data);
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:' . $secretKey));
            /* set return type json */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            /* execute request */
            $result = curl_exec($ch);
            
            $transaction = json_decode($result, TRUE);
            
            /* close cURL resource */
            curl_close($ch);  
            
            return $transaction;
    }
    
    function logout()
    {
	$newdata = array(
	    'userid' => '',
                    'fname' => '',
                    'lname' => '',
                    'username' => '',
                    'branch' => ''
	);
	
	$this->session->unset_userdata($newdata);
	$this->session->sess_destroy();
	redirect('encoder');
    }
    
    function getTowns() {
		$this->load->model('dashboard_model');
		if (isset($_GET['term'])){
	      $q = strtolower($_GET['term']);
	      $this->dashboard_model->get_town($q);
	    }
	}
    
    function getCities() {
	$this->load->model('dashboard_model');
	if (isset($_GET['term'])){
	    $q = strtolower($_GET['term']);
            $this->dashboard_model->get_city($q);
	}
    }
    
    function getDestination() {
	$this->load->model('kiosk_model');
	if (isset($_GET['term'])){
	    $q = strtolower($_GET['term']);
            $this->kiosk_model->get_destination($q);
	}
    }
    
    //added May 15, 2021
    
    function membership_settings()
    {
       
        $query = $this->db->get('membership_type');
        $data['query_result'] = $query->result();
        
        $data['title'] = 'Membership Settings';
        $data['user_id'] = $this->session->userdata('user_id');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['bname'] = $this->session->userdata('branch');
        $data['footer'] = $this->config->item('footer');
        $this->load->view('encoder/membership_settings',$data);
    }
    
    function typeofmembership()
    {
        date_default_timezone_set('Asia/Manila');
        $button = $this->input->post('btnaction');
       
        $domain = $this->config->item('weis_api');
		$token = $this->api_model->generate_token($domain);
      
        if(isset($token)){
            if($token['status']== 200){
                $key = $token['token'];
                $link = $domain."/weis/getsponsor";
                $s = $this->api_model->get_api($link,$key);
                $sresult = json_decode($s, TRUE);
                
                //button condtion
                $msg = '';
                $now = date('Y-m-d H:i:s');
                if(isset($button)){
                    if($button === 'ADDLINK'){
                            $btn = 'ADD';
                        $data['disabled'] = 'required';
                    }else if($button === 'EDITLINK'){
                            $btn = 'EDIT';
                            $id = $this->input->post('membership_id');
                            $query = $this->db->get_where('membership_type', array('membership_id' => $id));
                            foreach ($query->result() as $row) 
                            {  
                                $id = $row->membership_id;
                                $sponsor = $row->sponsor_id;
                                $mname = $row->membership_name;
                                $mcode = $row->membership_code;
                                $mnum = $row->vehicle_num;
                                $mstatus = $row->membership_status;
                                
                                $data = array(
                                'id'        =>$id,
                                'mid'        =>$sponsor,
                                'mname'   =>$mname,
                                'mcode'   =>$mcode,
                                'mnum'=> $mnum,
                                'mstatus' =>$mstatus,
                                'disabled' => 'disabled'    
                                );
                            }
                    }else if($button === 'EDIT'){
                            $btn = 'EDIT';
                            $id = $this->input->post('membership_id');
                            $mid = $this->input->post('mid');
                            $mname = $this->input->post('mname');
                            $mcode1 = $this->input->post('mcode');
                            $mcode = strtoupper($mcode1);
                            $mnum = $this->input->post('mnum');
                            $mstatus = $this->input->post('mstatus');
                            
                            $data = array(
                                //'sponsor_id'        =>$mid,
                                'membership_name'   =>$mname,
                                'membership_code'   =>$mcode,
                                'vehicle_num'=> $mnum,
                                'membership_status' =>$mstatus,
                                'update_when'=> $now,
                                'update_by' => $this->session->userdata('user_id'),
                            );
                            $this->db->where('membership_code',$mcode);
                            $query2 = $this->db->get('membership_type');
                            if ($query2->num_rows() > 0){
                                
                               
                                $query3 = $this->db->get_where('membership_type', array('membership_id' => $id,'membership_code'=>$mcode));
                                if ($query3->num_rows() > 0){
                                    $this->db->where('membership_id',$id);
                                    $this->db->update('membership_type', $data);
                                    $res = ($this->db->affected_rows() != 1) ? FALSE : TRUE;

                                    if($res === TRUE){
                                        $msg = "<p style='color:green'>Type of membership successfully updated.</p>";
                                            $query = $this->db->get_where('membership_type', array('membership_id' => $id));
                                            foreach ($query->result() as $row) 
                                            {  
                                                $id = $row->membership_id;
                                                $mid = $row->sponsor_id;
                                                $mname = $row->membership_name;
                                                $mcode = $row->membership_code;
                                                $mnum = $row->vehicle_num;
                                                $mstatus = $row->membership_status;

                                                $data = array(
                                                'id'        =>$id,
                                                'mid'        =>$mid,
                                                'mname'   =>$mname,
                                                'mcode'   =>$mcode,
                                                'mnum'  => $mnum,
                                                'mstatus' =>$mstatus,
                                                'disabled' => 'disabled' 
                                                );
                                            }

                                    } else {
                                           $msg =  "<p style='color:red'>ERROR: Could not able to execute sql query. Please try again " ;
                                    } 
                                }else{
                                    $msg =  "<p style='color:red'>ERROR: Could not able to edit. Code is already exist.</p>";
                                    $query = $this->db->get_where('membership_type', array('membership_id' => $id));
                                        foreach ($query->result() as $row) 
                                        {  
                                            $id = $row->membership_id;
                                            $mid = $row->sponsor_id;
                                            $mname = $row->membership_name;
                                            $mcode = $row->membership_code;
                                            $mnum = $row->vehicle_num;
                                            $mstatus = $row->membership_status;

                                            $data = array(
                                            'id'        =>$id,
                                            'mid'        =>$mid,
                                            'mname'   =>$mname,
                                            'mcode'   =>$mcode,
                                            'mnum'  => $mnum,
                                            'mstatus' =>$mstatus,
                                            'disabled' => 'disabled'     
                                            );
                                        }
                                }
                            }else{
                                $this->db->where('membership_id',$id);
                                    $this->db->update('membership_type', $data);
                                    $res = ($this->db->affected_rows() != 1) ? FALSE : TRUE;

                                    if($res === TRUE){
                                        $msg = "<p style='color:green'>Type of membership successfully updated.</p>";
                                            $query = $this->db->get_where('membership_type', array('membership_id' => $id));
                                            foreach ($query->result() as $row) 
                                            {  
                                                $id = $row->membership_id;
                                                $mid = $row->sponsor_id;
                                                $mname = $row->membership_name;
                                                $mcode = $row->membership_code;
                                                $mnum = $row->vehicle_num;
                                                $mstatus = $row->membership_status;

                                                $data = array(
                                                'id'        =>$id,
                                                'mid'        =>$mid,
                                                'mname'   =>$mname,
                                                'mcode'   =>$mcode,
                                                'mnum'  => $mnum,
                                                'mstatus' =>$mstatus,
                                                'disabled' => 'disabled' 
                                                );
                                            }

                                    } else {
                                           $msg =  "<p style='color:red'>ERROR: Could not able to execute sql query. Please try again " ;
                                    } 
                            }    
                    }else if($button === 'ADD'){
                            $btn = 'ADD';
                            $mid = $this->input->post('mid');
                            $mname = $this->input->post('mname');
                            $mcode1 = $this->input->post('mcode');
                            $mcode = strtoupper($mcode1);
                            $mnum = $this->input->post('mnum');
                            $mstatus = $this->input->post('mstatus');
                            
                            $data = array(
                                'sponsor_id'        =>$mid,
                                'membership_name'   =>$mname,
                                'membership_code'   =>$mcode,
                                'vehicle_num'=> $mnum,
                                'membership_status' =>$mstatus,
                                'added_by' => $this->session->userdata('user_id'),
                                'added_when'=> $now
                                
                            );
                           
                            $this->db->where('sponsor_id',$mid);
                            $query = $this->db->get('membership_type');
                            
                            if ($query->num_rows() > 0){
                               $msg =  "<p style='color:red'>ERROR: Could not able to add. Type of membership already exist.</p>";
                            }else{
                                $this->db->where('membership_code',$mcode);
                                $query2 = $this->db->get('membership_type');
                                if ($query2->num_rows() > 0){
                                    $msg =  "<p style='color:red'>ERROR: Could not able to add. Code is already exist.</p>";
                                }else{
                                
                                    $this->db->insert('membership_type',$data);
                                    $res = ($this->db->affected_rows() != 1) ? FALSE : TRUE;

                                    if($res === TRUE){
                                           $msg = "<p style='color:green'>Type of membership successfully added.</p>";
                                    } else {
                                           $msg =  "<p style='color:red'>ERROR: Could not able to execute sql query. Please try again " ;
                                    } 
                                }    
                            }
                    }
               } 
              
                $data['sponsor'] = $sresult['data'];
                $data['status'] = array('ACTIVE','INACTIVE');
                $data['message'] = $msg;
                $data['button_value'] = $btn;
                $data['title'] = 'Membership Settings';
                $data['fname'] = $this->session->userdata('fname');
                $data['lname'] = $this->session->userdata('lname');
                $data['bname'] = $this->session->userdata('branch');
                $data['footer'] = $this->config->item('footer');
                $this->load->view('encoder/membership_type_form',$data);
            }else{
                $data['title'] = "Error || 401";
                $this->load->view('errors/aap/error_401', $data);
            } 
        }else{
            $data['title'] = "Error || 401";
            $this->load->view('errors/aap/error_401_1', $data);
        }
    }
    
    function plantype_settings()
    {
        $this->db->select('*');
        $this->db->from('membership_plantype');
        $this->db->join('membership_type', 'membership_plantype.membership_id = membership_type.membership_id', 'left');
        //$this->db->where('plan_status', 'ACTIVE');
        $query = $this->db->get();
        //var_dump($query->result());
        $data['query_result'] = $query->result();
        
        $data['title'] = 'Plan type Settings';
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['bname'] = $this->session->userdata('branch');
        $data['footer'] = $this->config->item('footer');
        $this->load->view('encoder/plantype_settings',$data);
    }
    
    function plantype()
    {
        date_default_timezone_set('Asia/Manila');
        $button = $this->input->post('btnaction');
       
                $msg = '';
                $now = date('Y-m-d H:i:s');
                if(isset($button)){
                    if($button === 'ADDLINK'){
                            $btn = 'ADD';
                    }else if($button === 'EDITLINK'){
                            $btn = 'EDIT';
                            $plan_id = $this->input->post('plan_id');
                            $mid = $this->input->post('membership_id');
                            $query = $this->db->get_where('membership_plantype', array('plan_id' => $plan_id));
                            foreach ($query->result() as $row) 
                            {  
                                $plan_id = $row->plan_id;
                                $mid = $row->membership_id;
                                $pid = $row->plantype_id;
                                $pname = $row->plan_name;
                                $amount = $row->plan_amount;
                                $status = $row->plan_status;
                                $remarks = $row->remarks;
                                $data = array(
                                'plan_id'        =>$plan_id,
                                'mid'        =>$mid,
                                'pid'   =>$pid,
                                'pname'   =>$pname,
                                'amount' => $amount,
                                'pstatus' =>$status,
                                'remarks' =>$remarks,
                                'disabled' => 'disabled' 
                                );
                            }
                            
                    }else if($button === 'EDIT'){
                            $btn = 'EDIT';
                            $plan_id = $this->input->post('plan_id');
                            $pid = $this->input->post('pid');
                            $mid = $this->input->post('mid');
                            $pname = $this->input->post('pname');
                            $amount = $this->input->post('amount');
                            $mem_id = $this->input->post('mem_id');
                            $pstatus = $this->input->post('status');
                            $remarks = $this->input->post('remarks');
                            
                            $data = array(
                                //'plantype_id'  => $pid,
                                'plan_name'    => $pname,
                                'plan_amount'  => $amount,
                                'membership_id'=> $mid,
                                'plan_status'  => $pstatus,
                                'remarks' => $remarks,
                                'update_by'     => $this->session->userdata('user_id'),
                                'update_when'   => $now
                            );
                            
                            $this->db->where('plantype_id',$pid);
                            $query = $this->db->get('membership_plantype');
                            if ($query->num_rows() > 0){
                               $msg =  "<p style='color:red'>ERROR: Could not able to save. Plan type already exist.</p>";
                               $query = $this->db->get_where('membership_plantype', array('plan_id' => $plan_id));
                                    foreach ($query->result() as $row) 
                                    {  
                                        $plan_id = $row->plan_id;
                                        $mid = $row->membership_id;
                                        $pid = $row->plantype_id;
                                        $pname = $row->plan_name;
                                        $amount = $row->plan_amount;
                                        $status = $row->plan_status;
                                        $remarks = $row->remarks;

                                        $data = array(
                                        'plan_id'        =>$plan_id,
                                        'mid'        =>$mid,
                                        'pid'   =>$pid,
                                        'pname'   =>$pname,
                                        'amount' => $amount,
                                        'pstatus' =>$status,
                                        'remarks' =>$remarks,
                                        'disabled' => 'disabled' 
                                        );
                                    }
                            }
                            else{
                                $this->db->where('plan_id', $plan_id );
                                $this->db->update('membership_plantype', $data);
                                $res = ($this->db->affected_rows() != 1) ? FALSE : TRUE;
                            
                                 if($res === TRUE){
                                   $msg = "<p style='color:green'>Plan type successfully updated.</p>";
                                   $query = $this->db->get_where('membership_plantype', array('plan_id' => $plan_id));
                                    foreach ($query->result() as $row) 
                                    {  
                                        $plan_id = $row->plan_id;
                                        $mid = $row->membership_id;
                                        $pid = $row->plantype_id;
                                        $pname = $row->plan_name;
                                        $amount = $row->plan_amount;
                                        $status = $row->plan_status;
                                        $remarks = $row->remarks;

                                        $data = array(
                                        'plan_id'        =>$plan_id,
                                        'mid'        =>$mid,
                                        'pid'   =>$pid,
                                        'pname'   =>$pname,
                                        'amount' => $amount,
                                        'pstatus' =>$status,
                                        'remarks' =>$remarks,
                                        'disabled' => 'disabled' 
                                        );
                                    }
                                } else {
                                   $msg =  "<p style='color:red'>ERROR: Could not able to execute. Please try again " ;
                                }
                            }    
                           
                    }else if($button === 'ADD'){
                            $btn = 'ADD';
                            $pid = $this->input->post('pid');
                            $mid = $this->input->post('mid');
                            $pname = $this->input->post('pname');
                            $amount = $this->input->post('amount');
                            $mem_id = $this->input->post('mem_id');
                            $pstatus = $this->input->post('status');
                            $remarks = $this->input->post('remarks');
                            $data = array(
                                'plantype_id'  => $pid,
                                'plan_name'    => $pname,
                                'plan_amount'  => $amount,
                                'membership_id'=> $mid,
                                'plan_status'  => $pstatus,
                                'remarks' => $remarks,
                                'added_by'     => $this->session->userdata('user_id'),
                                'added_when'   => $now
                            );
                            
                            $this->db->where('plantype_id',$pid);
                            $query = $this->db->get('membership_plantype');
                            if ($query->num_rows() > 0){
                               $msg =  "<p style='color:red'>ERROR: Could not able to save. Plan type already exist.</p>";
                            }
                            else{
                                $this->db->insert('membership_plantype',$data);
                                $res = ($this->db->affected_rows() != 1) ? FALSE : TRUE;

                                if($res === TRUE){
                                       $msg = "<p style='color:green'>Plan type successfully added.</p>";
                                } else {
                                       $msg =  "<p style='color:red'>ERROR: Could not able to execute. Please try again " ;
                                } 
                            }
  
                    }
                }
                $this->db->select('*');
                $this->db->from('membership_type');
                $query = $this->db->get();
                $data['query_result'] = $query->result();
                $data['message'] = $msg;
                $data['button_value'] = $btn;
                $data['status'] = array('ACTIVE','INACTIVE');
                $data['title'] = 'Membership Settings';
                $data['fname'] = $this->session->userdata('fname');
                $data['lname'] = $this->session->userdata('lname');
                $data['bname'] = $this->session->userdata('branch');
                $data['footer'] = $this->config->item('footer');
                $this->load->view('encoder/plan_type_form',$data);    
    }
    
    function fetch_plantype($plan_id)
    {
        
        $domain = $this->config->item('weis_api');
		$token = $this->api_model->generate_token($domain);
	
     
        if(isset($token)){
            if($token['status']== 200){
                $key = $token['token'];
                $link = $domain."/weis/getplantype/".$plan_id;
                $s = $this->api_model->get_api($link,$key);
                $sresult = json_decode($s, TRUE);
                
                $data_plan = $sresult['data'];
                $pid = '';
                $output = '<option value="">Select Plan type</option>';
                foreach($data_plan as $row)
                {
                    $output .= '<option value="'.$row['plantype_id'].'"'.(($pid === $row['plantype_id'])?'selected':'').'>'.$row['plantype_name'].'</option>';
                }
            }else{
                $data['title'] = "Error || 401";
                $this->load->view('errors/aap/error_401', $data);
            } 
        }else{
            $data['title'] = "Error || 401";
            $this->load->view('errors/aap/error_401_1', $data);
        } 
        return $output;
      
    } 
    
    function fetch()
    {
        $s = $this->input->post('membership_id');
        $this->db->select('*');
        $this->db->from('membership_type');
        $array = array('membership_id'=> $s,'membership_status'=>'ACTIVE');
        $this->db->where($array);
        $query_mtype = $this->db->get();
        foreach ($query_mtype->result_array() as $row)
        {
            $sponsor =  $row['sponsor_id'];
        }
        if($sponsor)
        {
         echo $this->fetch_plantype($sponsor);
        }
    }
    
    function plantype_view()
    {
        date_default_timezone_set('Asia/Manila');
        $now = date('Y-m-d H:i:s');
        $button = $this->input->post('btnaction');
        $msg = "";
        
        if($button == 'ADD'){
                            $plan_id = $this->input->post('plan_id');
                            $damount = $this->input->post('damount');
                            $start = $this->input->post('start');
                            $end = $this->input->post('end');
                            
                            $data = array(
                                'plan_id'  => $plan_id,
                                'discount_amount'    => $damount,
                                'discount_start'  => $start,
                                'discount_end'=> $end,
                                'added_by'     => $this->session->userdata('user_id'),
                                'added_when'   => $now
                            );
                            
                            $this->db->where('discount_amount',$damount);
                            $this->db->where('discount_start',$start);
                            $this->db->where('discount_end',$end);
                            $query = $this->db->get('membership_discount');
                            if ($query->num_rows() > 0){
                               $msg =  "<p style='color:red'>ERROR: Could not able to save. Discounted rate already exist.</p>";
                            }
                            else{
                                $this->db->insert('membership_discount',$data);
                                $res = ($this->db->affected_rows() != 1) ? FALSE : TRUE;

                                if($res === TRUE){
                                       $msg = "<p style='color:green'>Discounted rate successfully added.</p>";
                                } else {
                                       $msg =  "<p style='color:red'>ERROR: Could not able to execute. Please try again " ;
                                } 
                            }
            
        }
                            $plan_id = $this->input->post('plan_id');
                            $query = $this->db->get_where('membership_plantype', array('plan_id' => $plan_id));
                            foreach ($query->result() as $row) 
                            {  
                                $plan_id = $row->plan_id;
                                $mid = $row->membership_id;
                                $pid = $row->plantype_id;
                                $pname = $row->plan_name;
                                $amount = $row->plan_amount;
                                $status = $row->plan_status;
                                
                                $data = array(
                                'plan_id'        =>$plan_id,
                                'mid'        =>$mid,
                                'pid'   =>$pid,
                                'pname'   =>$pname,
                                'amount' => $amount,
                                'pstatus' =>$status,
                                    
                                );
                            }
                            
                $this->db->select('*');
                $this->db->from('membership_type');
                $this->db->where('membership_status', 'ACTIVE');
                $query = $this->db->get();
                $data['query_result'] = $query->result();
                
                $this->db->select('*');
                $this->db->from('membership_discount');
                $this->db->join('membership_plantype', 'membership_discount.plan_id = membership_plantype.plan_id'); 
                $this->db->where('membership_discount.plan_id', $plan_id);
                $query_plan = $this->db->get();
                $data['result_plan'] = $query_plan->result();
                
                $data['query_result'] = $query->result();
                $data['message'] = $msg;
                $data['status'] = array('ACTIVE','INACTIVE');
                $data['title'] = 'Membership Settings';
                $data['fname'] = $this->session->userdata('fname');
                $data['lname'] = $this->session->userdata('lname');
                $data['bname'] = $this->session->userdata('branch');
                $data['footer'] = $this->config->item('footer');
                $this->load->view('encoder/plan_type_view',$data);
    }
    
    function promo_generate()
    {
        date_default_timezone_set('Asia/Manila');
        $now = date('Y-m-d H:i:s');
        $msg = "";
        $button = $this->input->post('btnaction');
       
        if($button === 'GENERATE'){
           
            $is_manual = $this->input->post('is_manual');
            $classification = $this->input->post('classification');
            $promotype = $this->input->post('promotype');
            $promovalue = $this->input->post('promovalue');
		
			$start = $this->input->post('start');
			$end = $this->input->post('end');

			//echo $is_manual;
			if($is_manual === 'YES'){
						$c = $this->input->post('promo_code');
						$coupon_code = strtoupper(trim($c));
			}else{
						$num = $this->input->post('num');
						$coupon_code = $this->generate_code($num);
			}
                
                $this->db->where('promo_code',$coupon_code);
                $query = $this->db->get('promo');
                if ($query->num_rows() > 0){
                    $msg =  "<p style='color:red'>ERROR: Could not able to save. Promo code already exist.</p>";
                }
                else{  
                    $data = array(
                                'promo_type'  => $promotype,
                                'promo_code'    => $coupon_code,
                                'promo_value'  => $promovalue,
                                'promo_start'=> $start,
                                'promo_end'     => $end,
                                'promo_classification'   => $classification,
                                'is_manual'   => $is_manual,
                                'promo_created_date'   => $now,
                                'added_by'   => '',
                            );
                    
                            $this->db->insert('promo',$data);
                            $res = ($this->db->affected_rows() != 1) ? FALSE : TRUE;

                            if($res === TRUE){
                                $msg = "<p style='color:green'>Promo code successfully added.</p>";
                            } else {
                                $msg =  "<p style='color:red'>ERROR: Promo code cannot be added. Please try again " ;
                            }                     
                
                }
        }
        
                $this->db->select('*');
                $this->db->from('membership_type');
                $this->db->where('membership_status', 'ACTIVE');
                $query = $this->db->get();
                $data['result_membership'] = $query->result();
                
                $data['message'] = $msg;
                $data['title'] = 'Generate Promo Code';
                $data['fname'] = $this->session->userdata('fname');
                $data['lname'] = $this->session->userdata('lname');
                $data['bname'] = $this->session->userdata('branch');
                $data['footer'] = $this->config->item('footer');
                $this->load->view('encoder/promo_generate',$data);
    }
    
    function generate_code($num)
    {
        $otp = "";
        $chars = 'ABCDEFGHJKLMNOPRQSTUVWXYZ0123456789';
        
        for ($i = 0; $i < $num; $i++) {
            $otp .= $chars[rand(0, strlen($chars) - 1)];
        }
        
        return $otp;
    }
    
    function promo_reports()
    {
        date_default_timezone_set('Asia/Manila');
        $now = date('Y-m-d H:i:s');
        $msg = "";
        
        $this->db->select('*');
        $this->db->from('promo');
        $query = $this->db->get();
        $data['result_promo'] = $query->result();
                
        $data['title'] = 'Promo Code Reports';
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['bname'] = $this->session->userdata('branch');
        $data['footer'] = $this->config->item('footer');
        $this->load->view('encoder/promo_reports',$data);
    }
    
    //added november 4, 2021
    function member_data($mcode,$id)
    {
			$domain = $this->config->item('weis_api');
			$token = $this->api_model->generate_token($domain);
            $member_data = array();
                if(isset($token)){
                    if($token['status']== 200){
                        $link = $domain."/weis/fetchmemberinfo/".$mcode;
                        $key = $token['token'];
                        $m = $this->api_model->get_api($link,$key);
                        $members_info = json_decode($m, TRUE);
                        if($members_info['status'] == 201){
                            $details = $members_info['details'];
                            
                            $link2 = $domain."/weis/fetchmembership/".$id;
                            $m2 = $this->api_model->get_api($link2,$key);
                            $members_record= json_decode($m2, TRUE);
                          
                            if($members_record['status'] == 201){
                                $result_record = $members_record['details']['membership'][0];
                                $result_car = $members_record['details']['membership']['vehicles'];
                                $member_data = array('result_info' => $details,'result_record' => $result_record,'result_car'=>$result_car);
                            }else{
                                $data['title'] = "Error || 210";
                               // $this->load->view('errors/aap/error_210', $data);
                            }
                            
                        }else{
                            $data['title'] = "Error || 210";
                            //$this->load->view('errors/aap/error_210', $data);
                        }
                    }else{
                        $data['title'] = "Error || 401";
                        //$this->load->view('errors/aap/error_401', $data);
                    } 
                }else{
                        $data['title'] = "Error || 401";
                       // $this->load->view('errors/aap/error_401_1', $data);
                }    
                return $member_data;
    }
    
}

?>	