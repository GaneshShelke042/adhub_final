<?php
defined('BASEPATH') or exit('No direct script access allowed');


class UpdateClientPermissionModel extends CI_Model
{
    
    public function viewData(){
        return $users = $this->db->get('tblclientpermission')->result_array(); 
    }

    public function insertUserClient($data){
    $this->db->insert('tblclientpermission', $data);
}

public function getClientPermissions($client_id)
{
    $this->db->where('client_id', $client_id);
    $query = $this->db->get('tblclientpermission');
    return $query->result(); // Assuming you want to return multiple client permissions
}

public function deleteClientPermissions($client_id) {
    $this->db->where('client_id', $client_id);
    $this->db->delete('tblclientpermission');
}


public function viewClientWithPermission($userId)
{
    $this->db->select('c.*');
    $this->db->from('addnewclient1 c');
    $this->db->join('tblclientpermission cp', 'c.id = cp.client_id', 'inner');
    $this->db->where('cp.User_id', $userId); // Filter rows where User_id matches the provided user ID
    $this->db->group_by('c.id'); // Group by the primary key of addnewclient1 table
    $query = $this->db->get();
    return $query->result();
}

    
}
?>
