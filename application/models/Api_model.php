<?php
class Api_model extends CI_Model
{

    function generate_token($api_url){
			$url = $api_url.'/weis/generatetoken';
        
           // $url = 'aapweis.aap.org.ph/aap_webhook/weis/generatetoken';

            /* Init cURL resource */
            $ch = curl_init($url);

            /* Array Parameter Data */
            $k['username'] = $this->config->item('apiusername');
            $k['password'] = $this->config->item('apipassword');
           
            /* Init cURL resource */
            $ch = curl_init($url);
            
             /* set return type json */
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            
            
            /* Array Parameter Data */
            $data =  json_encode($k, JSON_UNESCAPED_SLASHES);
            
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:' . $secretKey));
            /* set return type json */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            /* execute request */
            $result = curl_exec($ch);
            
            $transaction = json_decode($result, TRUE);
            
            /* close cURL resource */
            curl_close($ch);  
            
            return $transaction;
    }
    
    
    function get_api($link,$secretKey){
        $request_headers = array();
        $request_headers[] = 'Authorization:' . $secretKey;
        $http = curl_init($link);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($http, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($http, CURLOPT_HTTPHEADER, $request_headers);
        $http_result = curl_exec($http);
        //$http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
        curl_close($http);
        return $http_result;
    }
    
    function get_api_v2($link,$secretKey,$dataArray){
        $request_headers = array();
        $request_headers[] = 'Authorization:' . $secretKey;
        $http = curl_init();
        $data = http_build_query($dataArray);
        $getUrl = $link."?".$data;
        curl_setopt($http, CURLOPT_URL, $getUrl);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($http, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($http, CURLOPT_HTTPHEADER, $request_headers);
        $http_result = curl_exec($http);
        //$http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
        curl_close($http);
        return $http_result;
    }
    
    function get_photo($link,$secretKey){
        $request_headers = array();
        $request_headers[] = 'Content-Type:image/jpg';
        $request_headers[] = 'Authorization:' . $secretKey;
        $http = curl_init($link);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($http, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($http, CURLOPT_HTTPHEADER, $request_headers);
        $http_result = curl_exec($http);
        curl_close($http);
        return $http_result;
    }
    
    function post_member($member,$secretKey){
        
            $url = 'aapweis.aap.org.ph/aap_webhook/weis/Member';

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
    
    //for online application
    function online_token($url){

            /* Init cURL resource */
            $ch = curl_init($url);

            /* Array Parameter Data */
            $k['username'] = $this->config->item('apiusername');
            $k['password'] = $this->config->item('apipassword');
           
            /* Init cURL resource */
            $ch = curl_init($url);
            
             /* set return type json */
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            
            /* Array Parameter Data */
            $data =  json_encode($k, JSON_UNESCAPED_SLASHES);
            
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:' . $secretKey));
            /* set return type json */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            /* execute request */
            $result = curl_exec($ch);
            
            $transaction = json_decode($result, TRUE);
            
            /* close cURL resource */
            curl_close($ch);  
            
            return $transaction;
    }
}