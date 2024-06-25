<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Groupchatmodel extends CI_Model
{
    public function insertdataingroupmember($data)
    {
        $this->db->insert('groupchatmember', $data);
    }

    public function insertdata($data)  // groupname
    {
        $this->db->insert('groupname', $data);
        return $this->db->insert_id();
    }
    public function viewdata()
    {
        return    $this->db->get('groupname')->result_array();
    }




    public function viewdatabygroupid($id)
    {
        return    $this->db->Where('id', $id)->get('groupname')->result_array();
    }
    public function viewdatafromgroupmemberusingid($id)
    {
        return    $this->db->Where('Groupid', $id)->get('groupchatmember')->result_array();
    }

    public function getuserid($id)
    {
        return    $this->db->Where('Groupid', $id)->get('groupchatmember')->result();
    }

    public function updategroupname($data)
    {
        $this->db->Where('id', $data['id'])->update("groupname", ['Name' => $data['Name'], 'image' => $data['image']]);
    }

    public function updategroupmember($data)
    {
        $this->db->Where('id', $data['id'])->update("groupchatmember", $data);
    }

    public function viewdatabyuserid($userid)
    {
        return    $this->db->Where('userid', $userid)->get('groupchatmember')->result_array();
    }

    public function getUsersInGroup($groupId)
    {
        return $this->db->where('Groupid', $groupId)
            ->get('groupchatmember')
            ->result_array();
    }

    public function deletuserfromgroup($id)
    {
        $this->db->Where('id', $id)->delete('groupchatmember');
    }

    public function updatestatusbygroupid($data)
    {
        $this->db->where('Groupid', $data['Groupid'])->update("groupchatmember", $data);;
    }

    public function viewdatafromgroupmemberusingidreceivedfirst($id)
    {
        return $this->db->where('Groupid', $id)->get('groupchatmember')->row_array();
    }
}
