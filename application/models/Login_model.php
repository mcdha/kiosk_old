<?php

class Login_model extends CI_Model
{
    function isExist($data)
    {
        $exist = "mobile ="."'".$data['mobile']."' OR email = '".$data['username']."' OR mobile = '" . $data['username'] . "'";
        $this->db->select('*');
        $this->db->from('member_useraccount');
        $this->db->where($exist);
        $query = $this->db->get();
        return $query;
    }
    
    function mobileauth($data)
    {
        $exist = "mobile ="."'".$data['mobile']."'";
        $this->db->select('*');
        $this->db->from('member_useraccount');
        $this->db->where($exist);
        $query = $this->db->get();
        return $query;
    }
    
    function userauth($data)
    {
        $exist = "mobile ="."'".$data['username']."' OR email = '".$data['username']."'";
        $this->db->select('*');
        $this->db->from('member_useraccount');
        $this->db->where($exist);
        $query = $this->db->get();
        return $query;
    }
    
    function userauth1($data)
    {
        $exist = "email = '".$data['username']."'";
        $this->db->select('*');
        $this->db->from('member_useraccount');
        $this->db->where($exist);
        $query = $this->db->get();
        return $query;
    }
    function isExist_email($data)
    {
        $exist = "email ="."'".$data['email']."' OR members_code = '".$data['members_code']."' OR birthday = '" . $data['birthday'] . "'";
        $this->db->select('*');
        $this->db->from('member_useraccount');
        $this->db->where($exist);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function isExist_mobile($data)
    {
        $exist = "mobile ="."'".$data['mobile']."' OR members_code = '".$data['members_code']."' OR birthday = '" . $data['birthday'] . "'";
        $this->db->select('*');
        $this->db->from('member_useraccount');
        $this->db->where($exist);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function get_userinfo($uid)
    {
        $exist = "user_id ='".$uid."'";
        $this->db->select('*');
        $this->db->from('member_useraccount');
        $this->db->where($exist);
        $query = $this->db->get();
        return $query;
    }

    
}