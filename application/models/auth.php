<?php 

  
class Auth extends CI_Model{
   
    public function insertData()
    {
        
       $data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'status' => 1,
		);
        
        $query = $this->db->insert('register',$data);
        if($query){
            $ldata = array(
                'user_email' => $this->input->post('email'),
                'user_password' => $data['password'],
                'user_level' => 2,
                'status' => 1,
            );
            $lquery = $this->db->insert('users',$ldata);
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
        echo json_encode($result);
        
    }
    public function checkLogin()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'logged_in' => TRUE,
        );
        $query = $this -> db -> select('*') 
        ->where('user_email', $data['email'])
        ->where('user_password', md5($data['password']))
        ->where('user_level', 2)
        ->get('users');
       if($query->num_rows() > 0)
       {
        $this->session->set_userdata($data);
        $result = array(
            'msg' => '',
            'status' => 1,
        );
       }
       else{
        $result = array(
            'msg' => 'Wrong Login Credential !',
            'status' => 0,
        );
       }
       echo json_encode($result);
    }
    
}