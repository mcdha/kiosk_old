<?php

class Encoder_model extends CI_Model
{
    function get_application($data)
    {
        $id = "application_id =" . "'" . $data . "'";
	
		$this->db->select('a.*,a.reference_number as refnum, p.*');
		$this->db->from('members_application as a');
		$this->db->join('member_payment as p', 'a.reference_number = p.reference_number', 'left');
		$this->db->where($id);
		$query = $this->db->get();
		return $query;
    }
    
    function get_initiator()
    {
        $this->db->select('a.membershipinitiator_name');
	$this->db->from('membership_initiator as a');
        $this->db->where('a.membershipinitiator_isactive = "1"');
	$query = $this->db->get();
	return $query->result();
    }
    
    function get_city($c, $did)
    {
	$this->db->select('a.city_name');
	$this->db->from('address_city as a');
        $this->db->where('a.city_name = "'.$c.'" and a.district_id = "'.$did.'"');
	$query = $this->db->get();
	return $query->result();
    }
    
    function get_province($p)
    {
        $this->db->select('a.district_name,a.district_id');
	$this->db->from('address_district as a');
        $this->db->where('a.district_name = "'.$p.'"');
	$query = $this->db->get();
	return $query->result();
    }
    
    function get_country($c)
    {
        
	$this->db->select('a.ad_name');
	$this->db->from('aap_destination as a');
        $this->db->where('a.ad_name = "'.$c.'"');
	$query = $this->db->get();
	return $query->result();
    }
    
}
