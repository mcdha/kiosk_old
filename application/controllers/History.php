<?php
class History extends CI_Controller
{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('api_model');
            
        }
        
        function membership_history()
        {
            $data['title'] = 'Membership History';
            $mcode = $this->session->userdata('members_code');
            $token = $this->api_model->generate_token();
            if($token['status']== 200){
                $link = "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$mcode;
                $key = $token['token'];
                $m = $this->api_model->get_api($link,$key);
                $members_info = json_decode($m, TRUE);
                if($members_info['status'] == 201){
                    $data['details'] = $members_info['details'];
                    $link3 = "aapweis.aap.org.ph/aap_webhook/weis/GetMembershipHistory/".$mcode;
                    $m3= $this->api_model->get_api($link3,$key);
                    $history= json_decode($m3, TRUE); 
                    $data['membership'] = $history['history'];
                    
                    $photolink = "aapweis.aap.org.ph/aap_webhook/weis/GetMembersPhoto/".$mcode;
                    $photo= $this->api_model->get_photo($photolink,$key);
                    $data['img'] = base64_encode($photo);
                    
                    $this->load->view('forms/history_membership', $data);
                }else{
                    $data['title'] = "Error || 210";
                    $this->load->view('errors/aap/error_210', $data);
                }
                
            }else{
                $data['title'] = "Error || 401";
                $this->load->view('errors/aap/error_401', $data);
            }
        }
        
        function pidp_history()
        {
            $data['title'] = 'PIDP History';
            $mcode = $this->session->userdata('members_code');
            $token = $this->api_model->generate_token();
            if($token['status']== 200){
                $link = "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$mcode;
                $key = $token['token'];
                $m = $this->api_model->get_api($link,$key);
                $members_info = json_decode($m, TRUE);
                if($members_info['status'] == 201){
                    $data['details'] = $members_info['details'];
                    $link3 = "aapweis.aap.org.ph/aap_webhook/weis/GetPIDPHistory/".$mcode;
                    $m3= $this->api_model->get_api($link3,$key);
                    $history= json_decode($m3, TRUE);
                    $msg = $history['msg'];
                    if($msg == 'Record Successfully Retrieve'){
                        $data['pidp'] = $history['history'];
                        $data['msg'] = $msg;
                    }else{
                        $data['msg'] = '';
                    }
                    
                    $photolink = "aapweis.aap.org.ph/aap_webhook/weis/GetMembersPhoto/".$mcode;
                    $photo= $this->api_model->get_photo($photolink,$key);
                    $data['img'] = base64_encode($photo);
                    
                    $this->load->view('forms/history_pidp', $data);
                }else{
                    $data['title'] = "Error || 210";
                    $this->load->view('errors/aap/error_210', $data);
                }
                
            }else{
                $data['title'] = "Error || 401";
                $this->load->view('errors/aap/error_401', $data);
            }
        }
        
        function ers_history()
        {
           $data['title'] = 'ERS History';
            $mcode = $this->session->userdata('members_code');
            $token = $this->api_model->generate_token();
            if($token['status']== 200){
                $link = "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$mcode;
                $key = $token['token'];
                $m = $this->api_model->get_api($link,$key);
                $members_info = json_decode($m, TRUE);
                if($members_info['status'] == 201){
                    $data['details'] = $members_info['details'];
                    $link3 = "aapweis.aap.org.ph/aap_webhook/weis/GetERSHistory/".$mcode;
                    $m3= $this->api_model->get_api($link3,$key);
                    $history= json_decode($m3, TRUE);
                    $msg = $history['msg'];
                    if($msg == 'Record Successfully Retrieve'){
                        $data['ers'] = $history['history'];
                        $data['msg'] = $msg;
                    }else{
                        $data['msg'] = '';
                    }
                    $photolink = "aapweis.aap.org.ph/aap_webhook/weis/GetMembersPhoto/".$mcode;
                    $photo= $this->api_model->get_photo($photolink,$key);
                    $data['img'] = base64_encode($photo);
                    
                    $this->load->view('forms/history_ers', $data);
                }else{
                    $data['title'] = "Error || 210";
                    $this->load->view('errors/aap/error_210', $data);
                }
                
            }else{
                $data['title'] = "Error || 401";
                $this->load->view('errors/aap/error_401', $data);
            }
        }
        
        function ers_benefits()
        {
           $data['title'] = 'ERS Benefits';
            $mcode = $this->session->userdata('members_code');
            $token = $this->api_model->generate_token();
            if($token['status']== 200){
                $link = "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$mcode;
                $key = $token['token'];
                $m = $this->api_model->get_api($link,$key);
                $members_info = json_decode($m, TRUE);
                if($members_info['status'] == 201){
                    $data['details'] = $members_info['details'];
                    $link3 = "aapweis.aap.org.ph/aap_webhook/weis/GetERSBenefits/".$mcode;
                    $m3= $this->api_model->get_api($link3,$key);
                    $history= json_decode($m3, TRUE);
                    $msg = $history['msg'];
                    if($msg == 'Record Successfully Retrieve'){
                        $data['ers'] = $history['history'];
                        $data['msg'] = $msg;
                    }else{
                        $data['msg'] = '';
                    }
                    
                    $photolink = "aapweis.aap.org.ph/aap_webhook/weis/GetMembersPhoto/".$mcode;
                    $photo= $this->api_model->get_photo($photolink,$key);
                    $data['img'] = base64_encode($photo);
                    
                    $this->load->view('forms/benefits_ers', $data);
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