<?php 
session_start();
class Estudiante extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['rut'] = $session_data['rut'];
            $this->load->view('estudiante', $data);
        }
        else{
            //If no session, redirect to login page
            redirect('index', 'refresh');
        }
    }

    public function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('estudiante', 'refresh');
    }
}
?>