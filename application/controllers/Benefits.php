<?php
class Benefits  extends CI_Controller
{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('api_model');
            
        }
        
        function rewards()
        {
            $data['title'] = 'Rewards System';
            $mcode = $this->session->userdata('members_code');
            $token = $this->api_model->generate_token();
            if($token['status']== 200){
                $link = "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$mcode;
                $key = $token['token'];
                $m = $this->api_model->get_api($link,$key);
                $members_info = json_decode($m, TRUE);
                if($members_info['status'] == 201){
                    $data['details'] = $members_info['details'];
                    $link3 = "aapweis.aap.org.ph/aap_webhook/weis/getrewardhistory/".$mcode;
                    $m3= $this->api_model->get_api($link3,$key);
                    $points= json_decode($m3, TRUE); 
                    if(isset($points['details']['redeemed'])){
                        $data['redeemed']=$points['details']['redeemed'];
                    }
                    if(isset($points['details']['earned'])){
                        $data['earned'] = $points['details']['earned'];
                    }
                    if(isset($points['details']['forfeit'])){
                        $data['forfeited'] = $points['details']['forfeit'];
                    }
                    $this->load->view('forms/rewards_view', $data);
                }else{
                    $data['title'] = "Error || 210";
                    $this->load->view('errors/aap/error_210', $data);
                }
                
            }else{
                $data['title'] = "Error || 401";
                $this->load->view('errors/aap/error_401', $data);
            }
        }
        
        function rewardsprogram()
        {
            $data['title'] = 'Rewards System';
            $mcode = $this->session->userdata('members_code');
            $token = $this->api_model->generate_token();
            if($token['status']== 200){
                $link = "aapweis.aap.org.ph/aap_webhook/weis/fetchmemberinfo/".$mcode;
                $key = $token['token'];
                $m = $this->api_model->get_api($link,$key);
                $members_info = json_decode($m, TRUE);
                if($members_info['status'] == 201){
                    $data['details'] = $members_info['details'];
                    $this->load->view('forms/about_rewards', $data);
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