<?php

class Kiosk_model extends CI_Model
{
    function get_destination($q)
    {
	    
        $where = "ad_status = 'ACTIVE'";
        $this->db->select('*');
        $this->db->from('aap_destination');
		$this->db->where($where);
        $this->db->like('ad_name', $q);
		$this->db->limit(10);
	    $query = $this->db->get();
        if($query->num_rows() > 0){
			foreach ($query->result_array() as $row)
            {
                    $row_set[] = array(
                        'destination' => htmlentities(stripslashes($row['ad_name'])),
                        'remarks' => htmlentities(stripslashes($row['ad_remarks'])),
                    );
            }
			echo json_encode($row_set);	    
            }
	    
    }
	
	
	 function get_carmake($q)
    {
		
        $where = "vehiclebrand_status = 'ACTIVE'";
		$this->db->select('*');
		$this->db->from('vehiclebrand_table');
		$this->db->where($where);
        $this->db->like('vehiclebrand_name', $q);
		$this->db->limit(10);
		$query = $this->db->get();
		if($query->num_rows() > 0){
				foreach ($query->result_array() as $row){
				$row_set[] = array(
					'brand' => htmlentities(stripslashes($row['vehiclebrand_name']))
					);
			}
			echo json_encode($row_set);	    
		}
	    
    }
        
    function get_carmodel($q)
	{
        $where = "vehiclemodel_status = 'ACTIVE'";
		$this->db->select('*');
		$this->db->from('vehiclemodel_table');
		$this->db->where($where);
        $this->db->like('vehiclemodel_name', $q);
		$this->db->limit(10);
		$query = $this->db->get();
		if($query->num_rows() > 0){
				foreach ($query->result_array() as $row){
				$row_set[] = array(
					'model' => htmlentities(stripslashes($row['vehiclemodel_name']))
					);
			}
			echo json_encode($row_set);	    
		}
    }   
    
}