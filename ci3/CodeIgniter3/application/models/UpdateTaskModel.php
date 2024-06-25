<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UpdateTaskModel extends CI_Model
{

    public function updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)
    {
        // Prepare data array for insertion or update
        $data = array(
            'imageData' => $imageData,
            'cr_Status' => $cr_Status,
            'gr_Status' => $gr_Status,
            'smm_status' => $smm_Status,
            'editor_content' => $editor_content,
            'ticketValue' => $ticketValue,
            'Gr_ticketValue' => $Gr_ticketValue,
            'Smm_ticketValue' => $Smm_ticketValue, // Updated editor_content value
        );

        // Check if the record with the given id exists
        $existing_record = $this->db->get_where('dashboard', array('id' => $tid))->row();

        if ($existing_record) {
            // If the record exists and the tid matches, update the fields
            // Set the condition for the update
            $this->db->where('id', $tid);

            // Execute the update query
            if ($this->db->update('dashboard', $data)) {
                return true; // Return true after successfully updating the record
            } else {
                // If there's an error, return false
                echo $this->db->error(); // Print out the database error for debugging
                return false;
            }
        } else {
            // If the record does not exist, return false
            return false;
        }
    }
    public function updatepsd($tid, $psdfile, $cr_Status, $gr_Status)
    {
        $data = array('psdfile' => $psdfile, 'cr_Status' => $cr_Status, 'gr_Status' => $gr_Status,); // Create an array with the column name and the new PSD file path
        $this->db->where('id', $tid)->update('dashboard', $data); // Update the 'dashboard' table with the new data
    }

    function viewdatabyid($id)
    {
        $data = $this->db->where('id', $id)->get('dashboard')->result();
        return $data;
    }



    function viewData()
    {
        return $row = $this->db->get('dashboard')->result_array(); // select * from addnewclient1
    }



    function accepTiket($tid, $ticketValue)
    {
        $data = array(
            'ticketValue' => $ticketValue,
        );
        // Check if the record with the given id exists
        $existing_record = $this->db->get_where('dashboard', array('id' => $tid))->row();

        if ($existing_record) {
            // If the record exists and the tid matches, update the fields
            // Set the condition for the update
            $this->db->where('id', $tid);

            // Execute the update query
            if ($this->db->update('dashboard', $data)) {
                return true; // Return true after successfully updating the record
            } else {
                // If there's an error, return false
                echo $this->db->error(); // Print out the database error for debugging
                return false;
            }
        } else {
            // If the record does not exist, return false
            return false;
        }
    }




    function acceptGrTickets($tid, $Gr_ticketValue)
    {
        $data = array(
            'Gr_ticketValue' => $Gr_ticketValue,
        );
        // Check if the record with the given id exists
        $existing_record = $this->db->get_where('dashboard', array('id' => $tid))->row();

        if ($existing_record) {
            // If the record exists and the tid matches, update the fields
            // Set the condition for the update
            $this->db->where('id', $tid);

            // Execute the update query
            if ($this->db->update('dashboard', $data)) {
                return true; // Return true after successfully updating the record
            } else {
                // If there's an error, return false
                echo $this->db->error(); // Print out the database error for debugging
                return false;
            }
        } else {
            // If the record does not exist, return false
            return false;
        }
    }



    function acceptSmmTickets($tid, $Smm_ticketValue)
    {
        $data = array(
            'Smm_ticketValue' => $Smm_ticketValue,
        );
        // Check if the record with the given id exists
        $existing_record = $this->db->get_where('dashboard', array('id' => $tid))->row();

        if ($existing_record) {
            // If the record exists and the tid matches, update the fields
            // Set the condition for the update
            $this->db->where('id', $tid);

            // Execute the update query
            if ($this->db->update('dashboard', $data)) {
                return true; // Return true after successfully updating the record
            } else {
                // If there's an error, return false
                echo $this->db->error(); // Print out the database error for debugging
                return false;
            }
        } else {
            // If the record does not exist, return false
            return false;
        }
    }

    function TL_accepTiket($tid, $ticketValue)
    {
        $data = array(
            'TL_TicketValue' => $ticketValue,
        );
        // Check if the record with the given id exists
        $existing_record = $this->db->get_where('dashboard', array('id' => $tid))->row();

        if ($existing_record) {
            // If the record exists and the tid matches, update the fields
            // Set the condition for the update
            $this->db->where('id', $tid);

            // Execute the update query
            if ($this->db->update('dashboard', $data)) {
                return true; // Return true after successfully updating the record
            } else {
                // If there's an error, return false
                echo $this->db->error(); // Print out the database error for debugging
                return false;
            }
        } else {
            // If the record does not exist, return false
            return false;
        }
    }
    function TL_GD_TicketValue($tid, $ticketValue)
    {
        $data = array(
            'TL_GD_TicketValue' => $ticketValue,
        );
        // Check if the record with the given id exists
        $existing_record = $this->db->get_where('dashboard', array('id' => $tid))->row();

        if ($existing_record) {
            // If the record exists and the tid matches, update the fields
            // Set the condition for the update
            $this->db->where('id', $tid);

            // Execute the update query
            if ($this->db->update('dashboard', $data)) {
                return true; // Return true after successfully updating the record
            } else {
                // If there's an error, return false
                echo $this->db->error(); // Print out the database error for debugging
                return false;
            }
        } else {
            // If the record does not exist, return false
            return false;
        }
    }

    function TL_SMM_TicketValue($tid, $ticketValue)
    {
        $data = array(
            'TL_SMM_TicketValue' => $ticketValue,
        );
        // Check if the record with the given id exists
        $existing_record = $this->db->get_where('dashboard', array('id' => $tid))->row();

        if ($existing_record) {
            // If the record exists and the tid matches, update the fields
            // Set the condition for the update
            $this->db->where('id', $tid);

            // Execute the update query
            if ($this->db->update('dashboard', $data)) {
                return true; // Return true after successfully updating the record
            } else {
                // If there's an error, return false
                echo $this->db->error(); // Print out the database error for debugging
                return false;
            }
        } else {
            // If the record does not exist, return false
            return false;
        }
    }


    function viewdatabyclient_id($id, $delet_id)
    {
        return $query = $this->db
            ->select('task_name, deadline_datetime')
            ->where('Client_id', $id)
            ->where('delet_id', $delet_id)
            ->get('dashboard')->result_array();
    }
}
