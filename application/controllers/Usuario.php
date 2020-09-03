<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{

    public $est_habilitacion = array(["idHabilitacion" => '0', "descripcion" => "deshabilitado"], ["idHabilitacion" => '1', "descripcion" => "habilitado"]);

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_Model');
        $this->load->model('TipoUsuario_Model');
        $this->load->library('session', 'password');
        $this->load->helper(array('url'));
    }
    public function index()
    {
        $autorizados = [1];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $data['habilitacion'] = $this->est_habilitacion;
            $data['usuarios'] = $this->Usuario_Model->get_all_usuarios();
            $data['javascript'] = array('usuario/index.js');
            $data['_view'] = "usuario/index";
            $this->load->view('layouts/main', $data);
        } else
            redirect('admin');
    }

    /**
     * Funcion para administrar los tipos de usuarios para acceso a algunas funciones
     */
    public function autorizacion_session($tipos)
    {
        $aux = array_search($this->session->userdata('tipoUsuario'), $tipos);
        if (false !== $aux)
            return true;
        else
            return false;
    }

    /**
     * Funcion agregar Usruaio
     */
    public function add()
    {
        $autorizados = [1, 2, 3];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            if (isset($_POST) && count($_POST) > 0) {

                $params = array(
                    'user' => $this->input->post('usuario'),
                    'password' => $this->input->post('password'),
                    'idTipoUsuario' => $this->input->post('tipoUsuario')
                );
                $this->Usuario_Model->add_usuario($params);
                redirect('usuario');
            } else {
                $data['tipoUsuarios'] = $this->TipoUsuario_Model->get_all_tipoUsuarios();
                $data['_view'] = "usuario/add";
                $this->load->view('layouts/main', $data);
            }
        } else
            redirect('admin');
    }

    /**
     * Funcoin editar usuario
     */
    public function edit($idUsuario)
    {
        $autorizados = [1, 2, 3];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'user' => $this->input->post('usuario'),
                    'idTipoUsuario' => $this->input->post('tipoUsuario'),
                    'habilitacion' => $this->input->post('habilitacion'),
                );

                if ($this->input->post('password') != "") {
                    $params['password'] = $this->input->post('password');
                }

                $this->Usuario_Model->update_usuario($idUsuario, $params);
                redirect('usuario');
            } else {
                $data['tipoUsuarios'] = $this->TipoUsuario_Model->get_all_tipoUsuarios();
                $data['usuario'] = $this->Usuario_Model->get_usuario($idUsuario);
                $data['habilitacion'] = $this->est_habilitacion;
                $data['javascript'] = ["usuario/edit.js"];
                $data['_view'] = "usuario/edit";
                $this->load->view('layouts/main', $data);
            }
        } else
            redirect('admin');
    }
}
