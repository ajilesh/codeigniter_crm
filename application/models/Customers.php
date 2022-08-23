<?php 
//namespace App\Models;  
//use CodeIgniter\Model;
  
class Customers extends CI_Model{
    //protected $table = 'customer';
    
    // protected $allowedFields = [
    //     'firstName',
    //     'lastName',
    //     'company',
    //     'message',
    //     'contactNumber',
    //     'status'
    // ];
    public function insertData()
    {
        //print_r($data);
        $data = array(
        'firstName' => $this->input->post('firstname'),
        'lastName' => $this->input->post('lastname'),
        'company' => $this->input->post('company'),
        'message' => $this->input->post('message'),
        'contactNumber' => $this->input->post('firstname'),
        'status' => 1,
        );
            
        $query = $this->db->insert('customer',$data);
        if($query){
            $result = array(
                'status' => 1,
                'msg' => 'Inserted Successfully'
            );
        }
        else{
            $result = array(
                'status' => 0,
                'msg' => 'Failed Insert'
            );
        }
        print_r($result);
        
    }
}