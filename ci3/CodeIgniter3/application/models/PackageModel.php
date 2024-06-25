<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PackageModel extends CI_Model
{
    function newpackage($data)
    {
        $this->db->insert('package', $data); // insert into package
        // return true;
    }

    function viewPackageData()
    {
        $results = $this->db->get('package')->result_array(); // Select * from package
        $filteredResults = [];
        $prevPackageName = null;

        foreach ($results as $result) {
            if ($result['Package_name'] !== $prevPackageName) {
                // If the current Package_name is different from the previous one, add it to the filtered results
                $filteredResults[] = $result;
                $prevPackageName = $result['Package_name'];
            }
        }

        return $filteredResults;
    }
    function viewpackage()
    {
        return $users = $this->db->get('package')->result_array(); // select * from packagegst
    }


    function editPackage($userData)
    {
        $this->db->where('id', $userData);
        return $result = $this->db->get('package')->row_array(); // select * from package
    }

    function updatePackage($userData, $data)
    {
        $this->db->where('id', $userData);
        $this->db->update('package', $data); // update package SET  Brand_name=?,.......where id=?;
    }

    function PackageDelete($userData)
    {
        $this->db->where('Package_name', $userData);
        $this->db->delete('package'); // delete from addnewclient1 where id=?;

    }


    public function editPackageByName($Package_name)
    {
        $this->db->where('Package_name', $Package_name);
        $query = $this->db->get('package');
        return $query->row_array();
    }

    public function updatePackageByName($Package_name, $data)
    {
        $this->db->where('Package_name', $Package_name);
        $this->db->update('package', $data);
    }


    public function getCategories()
    {
        $this->db->where('status', 1);
        $query = $this->db->get('package');
        return $query->result_array();
    }

    public function getUserData($Package_name)
    {
        $this->db->where('Package_name', $Package_name);
        $query = $this->db->get('package');
        return $query->result_array();
    }
    public function updateQuantity($Package_name, $name, $quantity)
    {
        $this->db->where('Package_name', $Package_name);
        $this->db->where('name', $name);
        $this->db->update('package', array('quantity' => $quantity));
    }



    public function getpackagebyname($name)
    {
        return   $this->db->where('Package_name', $name)->get('package')->result_array();
    }


    public function updatepackagequantity($data)
    {
        $this->db->where('id', $data['id'])->update('package', $data);
    }

    public function updateStatus()
    {

        $Package_name = $_REQUEST['Package_name'];
        $status = $_REQUEST['status'];

        if ($status == 1) {
            $status = 0;
        } elseif ($status == 0) {
            $status = 1;
        }
        $data = array(
            'status' => $status
        );


        $this->db->where('Package_name', $Package_name);
        return $this->db->update('package', $data);
    }
}
