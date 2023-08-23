<?php
class Members extends CI_Controller {
    
     public function __construct() {

         parent::__construct();

         $this->load->model('members_model');

         $this->load->helper('url');
         $this->load->helper('form');
     }
 
     public function index() {

         $this->load->view('login');

     }

 
     public function signup() {
        if(!empty($_FILES['profile']['name'])){
            $_FILES['profile']['name'] = str_replace(' ', '_', $_FILES['profile']['name']);
        
            $imageconfig['upload_path'] = 'uploads';
            $imageconfig['allowed_types'] = '*';
            $imageconfig['file_name'] = $_FILES['profile']['name'];
            $imageconfig['remove_spaces'] = TRUE;
          
            $this->load->library('upload',$imageconfig);
            $this->upload->initialize($imageconfig);
            
            if($this->upload->do_upload('profile')){
                $uploadData = $this->upload->data();
                $_POST['image'] = $uploadData['file_name'];
            }else{
                $_POST['image'] = '';
             
            }
        }else{
            $_POST['image'] = '';
           
        }

         $member_data = array(
             'name' => $this->input->post('name'),
             'email' => $this->input->post('email'),
             'password ' => $this->input->post('pswd'),
             'profile ' => $this->input->post('image'),
             'created_date' => date('Y-m-d h:i:s')
         );

         if(isset($_POST) && !empty($_POST) && @$_POST['name']){
            // print_r($_FILES);die;
            $res = $this->members_model->signup($member_data);
            if($res){
                $this->session->set_flashdata('success','Registered successfully!');
                redirect('/members/','refresh');
            }
         }else{
            redirect('/members','refresh');
         }
 
         
     }
     public function login() {
        if(isset($_POST) && !empty($_POST) && @$_POST['email'] && @$_POST['pswd']){
            $res = $this->members_model->login();
            if($res){
                $this->session->set_userdata("userinfo", $res);
                $msg = 'Welcome '.ucwords($res['name']);
                // print_r($res);die;
                $this->session->set_flashdata('success', $msg);
                redirect('/members/dashboard','refresh');
            }else{
                $this->session->set_flashdata('error', 'Invalid Login Details!');
                redirect('/members','refresh');
            }
         }else{
            redirect('/members','refresh');
         }
     }

     public function dashboard() {
        $id = $_SESSION['userinfo']['id'];
        $data['res'] = $this->members_model->profile_data($id);
        $this->load->view('dashboard', $data);
     }

     public function profile($id=NULL) {
        
        if($_POST){
            //print_r($_FILES);die;
            if(!empty($_FILES['profile']['name'])){
                $_FILES['profile']['name'] = str_replace(' ', '_', $_FILES['profile']['name']);
            
                $imageconfig['upload_path'] = 'uploads';
                $imageconfig['allowed_types'] = '*';
                $imageconfig['file_name'] = $_FILES['profile']['name'];
                $imageconfig['remove_spaces'] = TRUE;
              
                $this->load->library('upload',$imageconfig);
                $this->upload->initialize($imageconfig);
                
                if($this->upload->do_upload('profile')){
                    $uploadData = $this->upload->data();
                    $_POST['image'] = $uploadData['file_name'];
                }else{
                    $_POST['image'] = '';
                 
                }
            }else{
                $_POST['image'] = '';
               
            }

            
            $member_data['name'] = $this->input->post('name');
            $member_data['email'] = $this->input->post('email');
            $member_data['password'] = $this->input->post('pswd');
            if($_POST['image']){
                $member_data['profile'] = $this->input->post('image');
            }
            // echo '<pre>';print_r($member_data);die;
            $res = $this->members_model->update($id,$member_data);
            if($res){
                $this->session->set_flashdata('success','Profile Updated successfully!');
                redirect('/members/dashboard','refresh');
            }


        }
        $data['res'] = $this->members_model->profile_data($id);
        $this->load->view('profile',$data);

    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('/members/','refresh');
    }


    public function pixabay() {
        $this->load->view('pixabay_api_view'); // Create this view later
    }

    public function search() {
        $api_key = '38992820-88898d9f4b17cdde06f39a71c';
        $search_query = @$_POST['search_query'];
        $api_url = "https://pixabay.com/api/?key=$api_key&q=$search_query";

        $response = file_get_contents($api_url);
        $data['results'] = json_decode($response)->hits;

        $this->load->view('pixabay_api_result_view', $data); // Create this view later
    }


 }
 

 ?>
 