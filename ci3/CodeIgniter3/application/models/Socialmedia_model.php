<?php 
defined('BASEPATH') or exit('No direct script access allowed');
// public $db;
    class Socialmedia_model extends CI_Model
    {
        public function insertdata ($data)
        {
            $this->db->insert("socialmedia", $data);
            return true; 
            
        }

        public function getdata()
        {
            $data = $this->db->get("socialmedia")->result();
            return $data;
        }
        public function getdatabyid($id)
        {
            $data = $this->db->where('id',$id)->get("socialmedia")->row();
            return $data;
        }
        public function Deletedatabyid($id)
        {
             $this->db->where('id',$id)->delete("socialmedia");
            return true;
        }

        public function Updatedata($id,$data)
        {
            $this->db->where("id",$id)->update("socialmedia",$data);
            return true;
        }
    
    }

?>