<?php

defined('BASEPATH') or exit('No direct script access allowed');

class GenrateCalender extends CI_Model
{

        function insert1($data)
        {
                $this->db->insert('calendardata45', $data); // insert into addnewclient1
                // return true;
        }

        function viewData()
        {
                return $users = $this->db->get('calendardata45')->result_array(); // select * from addnewclient1
        }

        function viewdatabyid($id)
        {
              return $this->db->where('id',$id)->get('calendardata45')->result_array();
        }
        // for update data VVVVVVV


        function editCalender($userData)
        {
                $this->db->where('id', $userData);
                return $result = $this->db->get('calendardata45')->row_array(); // select * from calendardata  where id=?;
        }


        function updatCalender($userData, $data)
        {
                $this->db->where('id', $userData);
                $this->db->update('calendardata45', $data); // update calendardata SET  Brand_name=?,.......where id=?;
        }
        // for update data ^^^^^^^

        // for delete data  VVVVV

        function deleteCalender($userData)
        {
                $this->db->where('delet_id', $userData);
                $this->db->delete('calendardata45'); // delete from addnewclient1 where id=?;

        }



        // FOR DASHBORD


        function insertDashbord($data1)
        {
                $this->db->insert('dashboard', $data1);
        }


        function editDashboard($userData)
        {
                $this->db->where('id', $userData);
                return $result = $this->db->get('dashboard')->row_array(); // select * from calendardata  where id=?;
        }


        function updateDashboardImage($imageLogo, $clientId)
        {
            $this->db->set('imageLogo', $imageLogo);
            $this->db->where('Client_id', $clientId);
            $this->db->update('dashboard');
        }
        
        

        function viewDashbord()
        {
                return $users = $this->db->get('dashboard')->result_array(); // select * from addnewclient1
        }

        function deleteDashbord($userData)
        {
                $this->db->where('delet_id', $userData);
                $this->db->delete('dashboard'); // delete from addnewclient1 where id=?;

        }
        function viewdatabydelet_ID($dID)
        {
                return $this->db
                        ->where('delet_id', $dID)
                        ->select('id,Client_id, deadline_datetime, task_name')
                        ->get('dashboard')
                        ->result_array();
        }

        function updatedashboarddata($id, $data)
        {
                $this->db->where('id', $id)->update('dashboard', $data);
        }

        function deletedashboardticket($id)
        {
                $this->db->where('id', $id)->delete('dashboard'); // delete from dashboard ticket
        }
        
}