<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class installmentModel extends CI_Model
{
        function viewinstallmentdata()
        {
           return  $this->db->get("installment")->result_array();
        }
        function generateinstallment($data)
        {

            // echo $installment;
           $inserted = $this->db->insert('installment',$data);
           if($inserted)
           {
            return true;
           }
           else{
            return false;
           }
        }

        function getdatabyid($id){
            $data = $this->db->where('id',$id)->get('installment')->result_array();
            return $data;
        }

        function deleteinstallment($id)
        {
            $this->db->where('id',$id)->delete('installment');
        }


        function updateinstallment($id,$data){
            $update = $this->db->where('id',$id)->update('installment',$data);
            if( !empty($update))
           {
            return true;
           }
           else{
            return false;
           }
        }
}

?>