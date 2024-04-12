<?php

class Dashboard_model extends CI_Model
{

    function get_town($q)
    {
        $this->db->select('a.*,c.*,d.*');
        $this->db->from('aap_zipcode as a');
        $this->db->join('address_city as c', 'a.az_city = c.city_id', 'left');
        $this->db->join('address_district as d', 'c.district_id = d.district_id', 'left');
        $this->db->like('az_barangay', $q);
        $this->db->limit(10);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = array(
                   'town' => htmlentities(stripslashes(utf8_decode($row['az_barangay']))),
                    'city' => htmlentities(stripslashes(utf8_decode($row['city_name']))),
                    'zipcode' => htmlentities(stripslashes(utf8_decode($row['az_zipcode']))),
                    'province' => htmlentities(stripslashes(utf8_decode($row['district_name']))),
                    'city_id' => htmlentities(stripslashes($row['city_id'])),
                    'district_id' => htmlentities(stripslashes($row['district_id']))
                );
            }
            echo json_encode($row_set);
        }
    }

    function get_city($q)
    {
        $where = "a.az_barangay = ''";
        $this->db->select('a.az_zipcode,c.city_name, c.city_id,d.*');
        $this->db->from('address_city as c');
        $this->db->join('aap_zipcode as a', 'c.city_id = a.az_city', 'left');
        $this->db->join('address_district as d', 'c.district_id = d.district_id', 'left');
        $this->db->like('city_name', $q);
        $this->db->where($where);
        $this->db->limit(10);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = array(
                   'city' => htmlentities(stripslashes(utf8_decode($row['city_name']))),
                    'zipcode' => htmlentities(stripslashes(utf8_decode($row['az_zipcode']))),
                    'province' => htmlentities(stripslashes(utf8_decode($row['district_name']))),
                    'city_id' => htmlentities(stripslashes($row['city_id'])),
                    'district_id' => htmlentities(stripslashes($row['district_id']))
                );
            }
            echo json_encode($row_set);
        }
    }

    function insert_logs($data)
    {
        $this->db->insert('member_changelogs', $data);
        return TRUE;
    }

    // added June 18, 2020
    function get_plantype($data)
    {
        $type = "plantype_id =" . "'" . $data['plantype_id']. "'";
        $this->db->select('*');
        $this->db->from('member_plantype');
        $this->db->where($type);
        $query = $this->db->get();
        return $query;
    }
}
