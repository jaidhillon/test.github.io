<?php
class Members_model extends CI_Model {

     public function __construct() {
         parent::__construct();
         $this->load->database();
     }
 
     public function signup($data) {
         $this->db->insert('members', $data);
         $id = $this->db->insert_id();
         return $id;
     }

     public function login() {
       $email = $_POST['email'];
       $password = $_POST['pswd'];
       $qry = $this->db->get_where('members', array('email' => $email, 'password' => $password));
        if($qry->num_rows() > 0){
            return $qry->row_array();
        }
        return false;
    }

    public function profile_data($id=NULL) {
        $qry = $this->db->get_where('members', array('id' => $id));
        if($qry->num_rows() > 0){
            return $qry->row();
        }
        return false;
    }

    public function update($id=NULL,$data) {
        $this->db->where('id', $id);
        $this->db->update('members', $data);
        return true;
        
    }
    
 }
 
?> 