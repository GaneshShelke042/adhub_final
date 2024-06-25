<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PackageModelGST extends CI_Model
{


    function newpackage($data)
    {
        $this->db->insert('packagegst', $data); // insert into packagegst
        // return true;
    }

    function viewPackageData()
    {
        return $users = $this->db->get('packagegst')->result_array(); // select * from packagegst
    }

    function editPackage($userData)
    {
        $this->db->where('id', $userData);
        return $result = $this->db->get('packagegst')->row_array(); // select * from packagegst
    }

    function updatePackage($userData, $data)
    {
        $this->db->where('id', $userData);
        $this->db->update('packagegst', $data); // update packagegst SET  Brand_name=?,.......where id=?;
    }

    function dataDelete($userData)
    {
        $this->db->where('id', $userData);
        $this->db->delete('packagegst'); // delete from packagegst where id=?;

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
        return $this->db->update('packagegst', $data);
    }
}
