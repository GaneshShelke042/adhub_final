<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AddNewCalendarModel extends CI_Model 
{


    function insertCalendar($data){
        $this->db->insert('calendar',$data); // insert into calendar
    }

    function viewCalendar(){
        return $users = $this->db->get('calendar')->result_array(); // select * from calendar
    }

    function editCalendar($userData){
        $this->db->where('id',$userData);
        return $result = $this->db->get('calendar')->row_array();
    }
    function updateCalendar($userData,$data){
        $this->db->where('id',$userData);
        $this->db->update('calendar',$data); // update addnewclient1 SET  Brand_name=?,.......where id=?;
    }  

    function deleteCalendar($userData){
        $this->db->where('id',$userData);
        $this->db->delete('calendar'); 
    }
    
    public function updateStatus() {

        $id = $_REQUEST['id'];
        $status = $_REQUEST['status'];
    
        if($status == 1){
            $status = 0;
        }
        elseif($status == 0){
            $status = 1;
        }
        $data = array(
            'status' => $status
        );
    
    
        $this->db->where('id', $id);
        return $this->db->update('calendar', $data);
    }
}