<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_Model');
        $this->load->library('session');
        $this->load->helper(array('url'));  
    }
	public function index() 
	{
        if($this->session->userdata('user')){
            $data['_view'] = "template/admin/main";
            $this->load->view('layouts/main',$data);
        }   
        else{
            $data['javascript'] = array('admin/captcha.js');
            $this->load->view('admin/login', $data);
        }
    }

    public function cerrarSesion(){ 
        $array_items = array('user', 'password');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect('admin');
    }
    
    public function confirmacion(){
        $user = $this->input->post('user');
        $pass = $this->input->post('password');
        $result = $this->Usuario_Model->verificar($user, $pass);
        
        if($result){
           $data = $this->Usuario_Model->get_usuario_user($user);
            $data_session = array(
                'user' => $data['user'],
                'tipoUsuario' => $data['idTipoUsuario'],
            );
            $this->session->set_userdata($data_session);
            redirect('admin');
        }
        else{
            $data['javascript'] = array('admin/captcha.js');
            $data['mensaje'] = "Usuario o Contraseña incorrecta";
            $this->load->view('admin/login',$data);
        }
    }

}
