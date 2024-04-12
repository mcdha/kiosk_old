<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kiosk  extends CI_Controller
{

    public function __construct()
    {
            parent::__construct();
            $this->load->model('dashboard_model');
            $this->load->model('kiosk_model');
            $this->load->model('api_model');
    }
    
    public function index()
    {
        $data['title'] = 'KIOSK';
       
        $this->load->view('kiosk/kiosk_view',$data);
    }
	
	public function kiosk_events()
    {
        $data['title'] = 'KIOSK - Events';
       
        $this->load->view('kiosk/kiosk_events',$data);
    }
    
    function dataprivacy()
    {
        $data['title'] = 'Data Privacy Policy';
        $this->load->view('kiosk/policy_membership',$data);
    }
    
    function dataprivacy_pidp()
    {
        $data['title'] = 'Data Privacy Policy';
        $this->load->view('kiosk/policy_pidp',$data);
    }
     
	function dataprivacy_motorcycle()
    {
        $data['title'] = 'Data Privacy Policy';
        $this->load->view('kiosk/policy_motorcycle',$data);
    }
    
    function membership()
    {
        $data['title'] = 'MEMBERSHIP';
        $this->load->view('kiosk/membership_selection',$data);
    }
    
    function pidp()
    {
        $data['title'] = 'PIDP';
        $this->load->view('kiosk/pidp_selection',$data);
    }
    function motorcycle()
    {
        $data['title'] = 'MOTORCYCLE MEMBERSHIP';
        $this->load->view('kiosk/motorcycle_selection',$data);
    }
    
    function membership_search()
    {
        $data['title'] = 'MEMBERSHIP';
        $spin = $this->input->post('spin');
        $sfname = $this->input->post('sfname');
        $slname = $this->input->post('slname');
        $sbday = $this->input->post('sbday');
        if($spin != '' OR $slname != ''){
            if($spin == NULL OR $spin == ''){
                $info = [
                    'spin'=> $spin,
                    'sfname' =>$sfname,
                    'slname' =>$slname,
                    'sbday' =>$sbday
                    ];

                //$data['result_info'] = $this->kiosk_model->get_memberM($info);
                $data['result_info'] = $this->search($info);

            }else{
                $info = [
                    'spin'=> $spin
                    ];

                $data['result_info'] = $this->searchByPin($info);
            }
        }
        $this->load->view('kiosk/membership_search',$data);
    }
    
     function motorcycle_search()
    {
        $data['title'] = 'MOTORCYCLE MEMBERSHIP';
        $spin = $this->input->post('spin');
        $sfname = $this->input->post('sfname');
        $slname = $this->input->post('slname');
        $sbday = $this->input->post('sbday');
        if($spin != '' OR $slname != ''){
            if($spin == NULL OR $spin == ''){
                $info = [
                    'spin'=> $spin,
                    'sfname' =>$sfname,
                    'slname' =>$slname,
                    'sbday' =>$sbday
                    ];

                //$data['result_info'] = $this->kiosk_model->get_memberM($info);
                $data['result_info'] = $this->search($info);

            }else{
                $info = [
                    'spin'=> $spin
                    ];
				$searchByPin = $this->searchByPin($info);
                $data['result_info'] = $searchByPin;
            }
        }
        $this->load->view('kiosk/motorcycle_search',$data);
    }
     function pidp_search()
    {
        $data['title'] = 'PIDP';
        $spin = $this->input->post('spin');
        $sfname = $this->input->post('sfname');
        $slname = $this->input->post('slname');
        $sbday = $this->input->post('sbday');
        //$slic = $this->input->post('slic');
        if($spin != '' OR $slname != ''){
            if($spin == NULL OR $spin == ''){
                $info = [
                    'spin'=> $spin,
                    'sfname' =>$sfname,
                    'slname' =>$slname,
                    'sbday' =>$sbday
                    ];

                //$data['result_info'] = $this->kiosk_model->get_memberM($info);
                $data['result_info'] = $this->search($info);

            }else{
                $info = [
                    'spin'=> $spin
                    ];
				
                $data['result_info'] = $this->searchByPin($info);
            }
        }
        $this->load->view('kiosk/pidp_search',$data);
    }
    
    
    function membership_new()
    {
        $data['title'] = 'MEMBERSHIP';
        $this->load->view('kiosk/membership_new',$data);
    }
    
    function pidp_new()
    {
        $data['title'] = 'PIDP';
        $this->load->view('kiosk/pidp_new',$data);
    }
    function motorcycle_new()
    {
        $data['title'] = 'MOTORCYCLE MEMBERSHIP';
        $this->load->view('kiosk/motorcycle_new',$data);
    }
    function pidp_renew()
    {
        
        $data['title'] = 'PIDP Renewal Form';
        $pincode = $this->uri->segment(3);
        $record_no  = $this->uri->segment(4);
        $records = $this->member_data($pincode,$record_no);
        
        $data['card'] = array('CARD', 'NON CARD');
        $data['lictype'] = array('PROFESSIONAL', 'NON-PROFESSIONAL');
        $data['records'] = $records;
        $this->load->view('kiosk/pidp_renew',$data);
    }
    
    function membership_renew()
    {
        $data['title'] = 'Membership Renewal Form';
        $pincode = $this->uri->segment(3);
        $record_no  = $this->uri->segment(4);
        $records = $this->member_data($pincode,$record_no);
     
        $data['records'] = $records;
        $this->load->view('kiosk/membership_renew',$data);
    }
    
    function motorcycle_renew()
    {
        $data['title'] = 'Motorcycle Membership Renewal Form';
        
        $pincode = $this->uri->segment(3);
        $record_no  = $this->uri->segment(4);
        $records = $this->member_data($pincode,$record_no);
     
        $data['records'] = $records;
        $this->load->view('kiosk/motorcycle_renew',$data);
    }
    
    function pidpOnly()
    {
        $data['title'] = 'PIDP Form';
        $this->load->view('kiosk/pidp_only',$data);
    }
    
    function renew()
    {
        $data['title'] = 'PIDP Form';
        $this->load->view('kiosk/renew_form',$data);
    }
    
    function add()
    {
        $agreeDP = $this->input->post('agreeDP');
		$agreejpn1 = $this->input->post('agreejpn1');
		$agreejpn2 = $this->input->post('agreejpn2');
		$agreeothers = $this->input->post('agreeothers');
		$id = $this->input->post('id');
        $plantype = $this->input->post('plantype');    
        $branch = $this->input->post('branch');
        $status = $this->input->post('status');
		$rec_id = $this->input->post('record_id');
        $rec = $this->input->post('recordno');
        $pin = $this->input->post('pin');
        $mailing = $this->input->post('mailing');
        $uradio = $this->input->post('uradio');
        
        $insured1 = $this->input->post('insured1');
        $beneficiary1 = $this->input->post('beneficiary1');
        $relation1 = $this->input->post('relation1');
        
        $bday_insured1 = $this->input->post('bday_insured1');
        
        if($bday_insured1 == NULL){
             $bday_insured1 = NULL;
        }else{
            $bday_insured1 = date('Y-m-d', strtotime($bday_insured1));
        }
        
        $insured2 = $this->input->post('insured2');
        $beneficiary2 = $this->input->post('beneficiary2');
        $relation2 = $this->input->post('relation2');
        $bday_insured2 = $this->input->post('bday_insured2');
        $bday_insured2 = date('Y-m-d', strtotime($bday_insured2));
        
        $cs1 = $this->input->post('cs1');
        $cs2 = $this->input->post('cs2');
        
        $rname = strtoupper($this->input->post('rname'));
        $rcontact = $this->input->post('rcontact');
        $raddress = strtoupper($this->input->post('raddress'));
        
        
        $salutation = $this->input->post('salutation');
		$fname = strtoupper($this->input->post('fname'));
        $mname = strtoupper($this->input->post('mname'));
        $lname = strtoupper($this->input->post('lname'));
        $citizenship = strtoupper($this->input->post('citizenship'));
        $nationality = strtoupper($this->input->post('nationality'));
        $acr = strtoupper($this->input->post('acr'));
        $sex = $this->input->post('sex');
        
        $bplace = strtoupper($this->input->post('bplace'));
        $occupation = strtoupper($this->input->post('occupation'));
        $cstatus = $this->input->post('cstatus');
        $h1 = strtoupper($this->input->post('h1'));
        $h2 = $this->input->post('h2');
        $city =$this->input->post('city');
        $province = $this->input->post('province');
        $zip = $this->input->post('zip');
        $oh1 = strtoupper($this->input->post('oh1'));
        $oh2 = $this->input->post('oh2');
        $ocity = $this->input->post('ocity');
        $oprovince = $this->input->post('oprovince');
        $ozip = $this->input->post('ozip');
        $tel = $this->input->post('tel');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $otel = $this->input->post('otel');
        $amobile = $this->input->post('amobile');
        $aemail = $this->input->post('aemail');
        $d = $this->input->post('d');
        
        $lic = strtoupper($this->input->post('lic'));
        $licexp = $this->input->post('licexp');
        $lictype = $this->input->post('lictype');
        
        
        $plate1 = strtoupper($this->input->post('plate1'));
        $make1 = $this->input->post('make1');
        $model1 = $this->input->post('model1');
        $year1 = $this->input->post('year1');
        $color1 = strtoupper($this->input->post('color1'));
        $fuel1 = $this->input->post('fuel1');
        $trans1 = $this->input->post('trans1');
        
        $plate2 = strtoupper($this->input->post('plate2'));
        $make2 = $this->input->post('make2');
        $model2 = $this->input->post('model2');
        $year2 = $this->input->post('year2');
        $color2 = strtoupper($this->input->post('color2'));
        $fuel2 = strtoupper($this->input->post('fuel2'));
        $trans2 = $this->input->post('trans2');
        
        $comp = strtoupper($this->input->post('company'));
        $b = $this->input->post('bday');
		$bday = date('Y-m-d', strtotime($b));
        $aq = $this->input->post('aq');
        
        $application_date = date("Y-m-d");
        $d = NULL;
        $d2 = NULL;
        $dradio = NULL;
        $lic = NULL;
        $licexp = NULL;
        $lictype = NULL;
        $card = NULL;
        $sr = NULL;
        $pidp_plantype = '';
        $prefix = 'K';
        $v1 = $this->input->post('v1');
        $v2= $this->input->post('v2');
        
        
                        if($plantype === '1'){
				$amount = 2240;
                                $type = 'ANNUAL FEE (REGULAR)';
                                $memtype = 'REGULAR INDIVIDUAL';
                                $typecat = "MEMBERSHIP";
			}else if($plantype === '2'){
				$amount = 896;
                                $type = 'ANNUAL FEE (MEMBERSHIP LITE)';
                                $memtype = 'MEMBERSHIP LITE';
                                $typecat = "MEMBERSHIP";
                        }else if($plantype === '3'){
				$amount = 3920;
                                $type ='ANNUAL FEE (REGULAR)';
                                $memtype = 'PIDP';
                                $lic = strtoupper($this->input->post('lic'));
                                $lic_exp = $this->input->post('licexp');
								$licexp = date('Y-m-d', strtotime($lic_exp));
                                $card = $this->input->post('card');  
                                $lictype = $this->input->post('lictype');
                                $r = $this->input->post('restriction');
                                
                                $j = json_encode($r);
                                
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
                                $pidp_plantype = "ANNUAL (PIDP)";
                                $typecat = "PIDP";
			}else if($plantype === '4'){
				$amount = 1680;
                                $type ='ANNUAL FEE (ASSOCIATE)';
                                $memtype = 'ASSOCIATE INDIVIDUAL';
                                $typecat = "MEMBERSHIP";
			}else if($plantype === '5'){
				$amount = 5600;
                                $type ='THREE YEAR FEE (REGULAR)';
                                $memtype = 'REGULAR INDIVIDUAL';
                                $typecat = "MEMBERSHIP";
			}else if($plantype === '6'){
				$amount = 8960;
                                $type ='THREE YEAR FEE (REGULAR)';
                                $memtype = 'PIDP';
                                $d = $this->input->post('d');
                                $lic = strtoupper($this->input->post('lic'));
                                $lic_exp = $this->input->post('licexp');
								$licexp = date('Y-m-d', strtotime($lic_exp));
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
                                $pidp_plantype = "THREE YEARS (PIDP)";
                                $typecat = "PIDP";
                        }else if($plantype === '14'){
				$amount = 7840;
                                if($type == 'THREE YEAR FEE (REGULAR)'){
                                    $type ='THREE YEAR FEE (REGULAR)';
                                }else{
                                    $type = 'ANNUAL FEE (REGULAR)';
                                }
                                $memtype = 'PIDP';
                                $d = $this->input->post('d');
                                $lic = strtoupper($this->input->post('lic'));
								$lic_exp = $this->input->post('licexp');
								$licexp = date('Y-m-d', strtotime($lic_exp));
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
                                $pidp_plantype = "TWO YEARS (PIDP)";  
                                $typecat = "PIDP";
			}else if($plantype === '7'){
				$amount = 4200;
                                $type ='THREE YEAR FEE (ASSOCIATE)';
                                $memtype = 'ASSOCIATE INDIVIDUAL';
                                $typecat = "MEMBERSHIP";
			}else if($plantype === '8'){
				$amount = 600;
                                $type ='ANNUAL FEE(MOTORCYCLE PACKAGE 1)';
                                $memtype = 'MOTORCYCLE MEMBERSHIP PLUS';
                                $typecat = "MOTORCYCLE MEMBERSHIP";
                        }else if($plantype === '9'){
				$amount = 900;
                                $type ='ANNUAL FEE(MOTORCYCLE PACKAGE 2 NEW RATE)';
                                $memtype = 'MOTORCYCLE MEMBERSHIP PLUS';
                                $typecat = "MOTORCYCLE MEMBERSHIP";
                        }else if($plantype === '10'){
				$amount = 1500;
                                $type ='ANNUAL FEE(MOTORCYCLE PACKAGE 3 NEW RATE)';
                                $memtype = 'MOTORCYCLE MEMBERSHIP PLUS';
                                $typecat = "MOTORCYCLE MEMBERSHIP";
                        }else if($plantype === '11'){
				$amount = 2500;
                                $type ='ANNUAL FEE(MOTORCYCLE PACKAGE 4 NEW RATE)';
                                $memtype = 'MOTORCYCLE MEMBERSHIP PLUS';
                                $typecat = "MOTORCYCLE MEMBERSHIP";
                        }else if($plantype === '12'){
				$amount = 400;
                                $type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 1';
                                $memtype = 'MOTORCYCLE MEMBERSHIP PLUS';
                                $typecat = "MOTORCYCLE MEMBERSHIP";
                        }else if($plantype === '13'){
				$amount = '1322.17';
                                $type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 3';
                                $memtype = 'MOTORCYCLE MEMBERSHIP PLUS';
                                $typecat = "MOTORCYCLE MEMBERSHIP";
                        }else{
                            $amount = 0;
                            $type ='Please select plan type';
                        }
            $query = $this->db->query('SELECT * FROM members_application where application_date = "'.$application_date.'" and category="KIOSK"'); 
            $val = $query->num_rows();
            $ref = $this->generate_refnum($prefix, $val);
            $data = array(
                    'category' => 'KIOSK',
                    'platform' => 'KIOSK MACHINE',
                    'typesofapplication' => $status,
                    'application_date'  => $application_date,
                    'branch' 	=> 'MAIN',
					'record_id' => $rec_id,
                    'record_no' 	=> $rec,
                    'pincode' => $pin,
                    'plan_type' 	=> $type,
                    'pidp_plantype' => $pidp_plantype,
                    'plantype_id' 	=> $plantype,
                    'members_id' 	=> $id,
                    'membership_type' 	=> $memtype,
                    'members_title' 	=> $salutation,
                    'members_firstname' 	=> utf8_encode($fname),
                    'members_middlename' 	=> utf8_encode($mname),
                    'members_lastname'  => utf8_encode($lname),
                    'nationality' 	=> $nationality,
                    'citizenship' 	=> $citizenship,
                    'members_acrno' 	=> $acr,
                    'members_gender' 	=> $sex,
                    'members_birthdate' 	=> $bday,
                    'members_birthplace'  => utf8_encode($bplace),
                    'occupation_name' 	=> $occupation,
                    'members_civilstatus' 	=> $cstatus,
                    'members_haddress1' 	=> utf8_encode($h1),
                    'members_haddress2'  => utf8_encode($h2),
                    'members_housecity' 	=> utf8_encode($city),
                    'members_housedistrict' 	=> utf8_encode($province),
                    'members_housezipcode' 	=> $zip,
                    'members_oaddress1'  => utf8_encode($oh1),
                    'members_oaddress2' 	=> utf8_encode($oh2),
                    'members_officecity' 	=> utf8_encode($ocity),
                    'members_officedistrict' 	=> utf8_encode($oprovince),
                    'members_officezipcode' 	=> $ozip,
                    'members_housephoneno'  => $tel,
                    'members_mobileno' 	=> $mobile,
                    'members_emailaddress' 	=> $email,
                    'members_alternate_tel' 	=> $otel,
                    'members_alternate_mobileno'  => $amobile,
                    'members_alternate_emailaddress' 	=> $aemail,
                    'members_destination' 	=> $d,
                    'members_destination2' 	=> $d2,
                    'members_licenseno'  => $lic,
                    'members_licenseexpirationdate' 	=> $licexp,
                    'members_licensetype' 	=> $lictype,
                    'members_licensecard' 	=> $card,
                    'members_licenserest'  => $sr,
                    'v1e' => $cs1,
                    'v2e' => $cs2,
                    'vehicle_plate1' 	=> $plate1,
                    'vehicle_make1' 	=> $make1,
                    'vehicle_model1' 	=> $model1, 
                    'vehicle_year1'     => $year1,
                    'vehicle_color1' 	=> $color1,
                    'vehicle_fuel1' 	=> $fuel1,
                    'vehicle_transmission1' 	=> $trans1,
                    'vehicle_plate2' 	=> $plate2,
                    'vehicle_make2' 	=> $make2,
                    'vehicle_model2' 	=> $model2,
                    'vehicle_year2'     => $year2,
                    'vehicle_color2' 	=> $color2,
                    'vehicle_fuel2' 	=> $fuel2,
                    'vehicle_transmission2' 	=> $trans2,
                    'members_businessname' 	=> $comp,
                    'reference_number' => $ref,
                    'status' => 'PENDING',
                    'representative_name' => $rname,
                    'representative_contactno' => $rcontact,
                    'representative_address' => $raddress,
                    'is_aq' => $aq,
                    'mailing_preference' => $mailing,
                    'insured1' => $insured1,
                    'beneficiary1' => $beneficiary1,
                    'relation1' => $relation1,
                    'bday_insured1' => $bday_insured1,
                    'insured2' => $insured2,
                    'beneficiary2' => $beneficiary2,
                    'relation2' => $relation2,
                    'bday_insured2' => $bday_insured2,
                    'v1' => $v1,
                    'v2' => $v2,
                    'uradio' => $uradio,
					'agreeDP' => $agreeDP,
					'agreejpn1' => $agreejpn1,
					'agreejpn2' => $agreejpn2,
					'agreeothers' => $agreeothers,
		); 
            $this->ticket($ref, $typecat);
            $this->db->insert('members_application', $data);
            $data['title'] = 'SUCCESS';
            $data['ref'] = $ref;
            $data['typecat'] = $typecat;
            $this->load->view('kiosk/success_page',$data);
        
    }
    
    function ticket($ref, $typecat){
        try {
           // $this->load->library('ReceiptPrint');
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            
            if($ip == '192.168.0.251'){
                $user = 'smb://Kiosk1/EPSONTM-T82';
                $ticket = $ref;
            }else if($ip == '192.168.0.252'){
                $user = 'smb://Kiosk2/EPSONTM-T82';
                $ticket = $ref;
            }else if($ip == '192.168.0.4'){
                $user = 'smb://Kiosk2/EPSONTM-T82';
                $ticket = $ref;
            }else{
                //$msg = "No IP";
                $ticket = $ref;
            }
           // $this->receiptprint->connect($user);
           // $this->receiptprint->print_ticket_number($ticket,$typecat);
            
        } catch (Exception $e) {
             log_message("error", "Error: Could not print. Message ".$e->getMessage());
             //$this->receiptprint->close_after_exception();
        }
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
    
    function getCarMake() 
    {
	if (isset($_GET['term'])){
	    $q = strtolower($_GET['term']);
            $this->kiosk_model->get_carmake($q);
	}
    }
    
    function getCarModel() 
    {
	if (isset($_GET['term'])){
	    $q = strtolower($_GET['term']);
            $this->kiosk_model->get_carmodel($q);
	}
    }
    
    function getDestination() {
	$this->load->model('kiosk_model');
	if (isset($_GET['term'])){
	    $q = strtolower($_GET['term']);
            $this->kiosk_model->get_destination($q);
          
	}
    }
    
    function policy() {
	$data['title'] = 'Data Privacy Policy';
        $this->load->view('kiosk/policy',$data);
    }
    
    
    
    private function generate_refnum($prefix, $val)
    {
            $val = $val + 1;
            $id = str_pad($val,3,"0",STR_PAD_LEFT);
            $ref = $prefix.'-'.$id;
            return $ref;
    }
    //added october 29, 2021
    function search($info)
    {
        $domain = $this->config->item('weis_api');
		$token = $this->api_model->generate_token($domain);
		$membership_info = array();
		$details = array();
		
                if(isset($token)){ 
                    if($token['status']== 200){
                        $params = array('firstname'=>$info['sfname'], 'lastname'=>$info['slname'],'bdate'=>$info['sbday']);
                        
                        $link = 'aapweis.aap.org.ph/aap_webhook_prod/weis/fetchmemberinfov2';
                        $key = $token['token'];
                        $m = $this->api_model->get_api_v2($link,$key,$params);
                       
                        $members_info = json_decode($m, TRUE);
                        
                        if($members_info['status'] == 201){
                            $data['details'] = $members_info['details'];
                            $members_id = $members_info['details'][0]['members_id'];
							$mcode = $members_info['details'][0]['members_pincode'];
							$lname = $members_info['details'][0]['members_lastname'];
							$fname = $members_info['details'][0]['members_firstname'];
							
                            $link2 = $domain."/weis/fetchbulkmemberships/".$mcode;
                            $key = $token['token'];
                            $m2 = $this->api_model->get_api($link2,$key);
                            $members_record= json_decode($m2, TRUE);
                            
                            foreach ($members_record['details'] as $row){
                                $record = $row['vehicleinfohead_id'];
                                $record_no = $row['vehicleinfohead_order'];
                                $vehicleinfohead_activedate = $row['vehicleinfohead_activedate'];
                                $vehicleinfohead_expiredate= $row['vehicleinfohead_expiredate'];
                                $vehicleinfohead_status = $row['vehicleinfohead_status'];
                                $sponsor_name = $row['sponsor_name'];
                                
                                $link3 = $domain."/weis/fetchmembership/".$record;
                                $m3 = $this->api_model->get_api($link3,$key);
                                $result= json_decode($m3, TRUE);
                                $mship= $result['details']['membership'];
								$car_det = array();
                                if(isset($result['details']['membership']['vehicles'])){
									foreach($result['details']['membership']['vehicles'] as $car){
										$plate = $car['vehicleinfo_plateno'];
										$make = $car['vehiclebrand_name'];
										$model = $car['vehiclemodel_name'];
										$car_det[] =  $plate.' - '.$make.' '.$model;
									}  
								}
								$details = array(
                                        'members_id' => $mcode,
                                        'vehicleinfohead_id' =>$record,
                                        'members_lastname' =>  $lname,
                                        'members_firstname' => $fname,
                                        'vehicleinfohead_order' => $record_no,
                                        'vehicleinfohead_activedate' => $vehicleinfohead_activedate,
                                        'vehicleinfohead_expiredate' => $vehicleinfohead_expiredate,
                                        'vehicleinfohead_status' => $vehicleinfohead_status,
                                        'sponsor_name' => $sponsor_name,
                                        'car_details' => $car_det,
                                    );
                                $membership_info[] = $details;
                                
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
                
                return $membership_info;
    }
    function searchByPin($info)
    {
        $domain = $this->config->item('weis_api');
		$token = $this->api_model->generate_token($domain);
		$membership_info = array();
		$details = array();
                if(isset($token)){ 
                    if($token['status']== 200){
                        $link = $domain."/weis/fetchmemberinfo/".$info['spin'];
                        $key = $token['token'];
                        $m = $this->api_model->get_api($link,$key);
                        
                        $members_info = json_decode($m, TRUE);
                        
                        if($members_info['status'] == 201){
                            $data['details'] = $members_info['details'];
							$members_id = $members_info['details'][0]['members_id'];
							$mcode = $members_info['details'][0]['members_pincode'];
							$lname = $members_info['details'][0]['members_lastname'];
							$fname = $members_info['details'][0]['members_firstname'];
                            
                            $link2 = $domain."/weis/fetchbulkmemberships/".$mcode;
                            $key = $token['token'];
                            $m2 = $this->api_model->get_api($link2,$key);
                            $members_record= json_decode($m2, TRUE);
                            
                            
                            foreach ($members_record['details'] as $row){
                               
                                $record = $row['vehicleinfohead_id'];
                                $record_no = $row['vehicleinfohead_order'];
                                $vehicleinfohead_activedate = $row['vehicleinfohead_activedate'];
                                $vehicleinfohead_expiredate= $row['vehicleinfohead_expiredate'];
                                $vehicleinfohead_status = $row['vehicleinfohead_status'];
                                $sponsor_name = $row['sponsor_name'];
                                
                                $link3 = $domain."/weis/fetchmembership/".$record;
                                $m3 = $this->api_model->get_api($link3,$key);
                                $result= json_decode($m3, TRUE);
                                $mship= $result['details']['membership'];
								$car_det = array();
								
								if(isset($result['details']['membership']['vehicles'])){
									foreach($result['details']['membership']['vehicles'] as $car){
										$plate = $car['vehicleinfo_plateno'];
										$make = $car['vehiclebrand_name'];
										$model = $car['vehiclemodel_name'];
										$car_det[] =  $plate.' - '.$make.' '.$model;
									}  
								}
                                
								$details = array(
                                        'members_id' => $mcode,
                                        'vehicleinfohead_id' =>$record,
                                        'members_lastname' =>  $lname,
                                        'members_firstname' => $fname,
                                        'vehicleinfohead_order' => $record_no,
                                        'vehicleinfohead_activedate' => $vehicleinfohead_activedate,
                                        'vehicleinfohead_expiredate' => $vehicleinfohead_expiredate,
                                        'vehicleinfohead_status' => $vehicleinfohead_status,
                                        'sponsor_name' => $sponsor_name,
                                        'car_details' => $car_det,
                                    );
                                $membership_info[] = $details;
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
                        //$this->load->view('errors/aap/error_401_1', $data);
                } 
                
                return $membership_info;
    }
    
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
                                //this->load->view('errors/aap/error_210', $data);
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
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

