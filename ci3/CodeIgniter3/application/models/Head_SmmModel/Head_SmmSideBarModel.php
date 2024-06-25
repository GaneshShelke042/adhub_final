<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Head_SmmSideBarModel extends CI_Model {
    // Method to get role status based on provided name
    public function getRoleStatus($name)
    {
        // Set a WHERE condition to fetch the row based on provided name
        $this->db->where('Role_name', $name);
        
        // Execute the query and retrieve the row from the 'roles' table
        $query = $this->db->get('roles');
        
        // Check if exactly one row is found
        if ($query->num_rows() == 1) {
            // If found, fetch the row
            $row = $query->row();
            
            // Create an array containing status values for different columns
            $statuses = array(
                'Social_Media' => $row->Social_Media,
                'My_Videos' => $row->My_Videos,
                'My_Exams' => $row->My_Exams,
                'Client' => $row->Client,
                'Dashboard' => $row->Dashboard,
                'Package_Category' => $row->Package_Category,
                'Package_GST' => $row->Package_GST,
                'Package_Service' => $row->Package_Service,
                'Package' => $row->Package,
            );
            
            // Return the array of status values
            return $statuses;
        }
        // If no row found or multiple rows found, return null
        return null;
    }
}

