<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Internamiento extends CI_Controller
{

    public $emailMunicipalidad = "cjeanma009@gmail.com";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Internamiento_Model');
        $this->load->model('ActaLevante_Model');
        $this->load->library('upload');
        $this->load->helper('file');
        date_default_timezone_set('America/Lima');
    }

    public function index()
    {
        $autorizados = [1, 2, 4];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $data['internados'] = $this->Internamiento_Model->get_internamientos_nuevos();
            $data['javascript'] = array('internamiento/index.js');
            $data['_view'] = "internamiento/index";
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

    public function add()
    {
        $autorizados = [1, 2, 4];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'nro_boleta' => $this->input->post('nroBoleta'),
                    'placa' => $this->input->post('placa'),
                    'marca' => $this->input->post('marca'),
                    'color' => $this->input->post('color'),
                    'clase' => $this->input->post('clase'),
                    'anio' => $this->input->post('anio'),
                    'motor_nro' => $this->input->post('motor'),
                    'propietario' => $this->input->post('propietario'),
                    'chofer' => $this->input->post('chofer'),
                    'nro_licencia' => $this->input->post('licencia'),
                    'infraccion' => $this->input->post('infraccion'),
                    'cod_oficial' => $this->input->post('codigoOficial'),
                    'oficial' => $this->input->post('oficial'),
                    'grado' => $this->input->post('grado'),
                    'sub_unidad' => $this->input->post('subUnidad'),
                    'deposito' => $this->input->post('deposito'),
                    'fch_ing' => $this->input->post('fechaIngreso'),
                    'faro_grande' => $this->input->post('faroGrande'),
                    'faro_chico' => $this->input->post('faroChico'),
                    'faro_posterior' => $this->input->post('farosPosteriores'),
                    'biceles' => $this->input->post('biceles'),
                    'limpia_parabrisas' => $this->input->post('limParabrisas'),
                    'lunas' => $this->input->post('lunas'),
                    'llantas' => $this->input->post('llantas'),
                    'vasos' => $this->input->post('vasos'),
                    'espejo_exterior' => $this->input->post('espExterior'),
                    'antena' => $this->input->post('antena'),
                    'chapas' => $this->input->post('chapas'),
                    'parachoques' => $this->input->post('parachoques'),
                    'llanta_repuesto' => $this->input->post('llantaRepuesto'),
                    'tablero' => $this->input->post('tablero'),
                    'chapa_contacto' => $this->input->post('chapaContacto'),
                    'radio' => $this->input->post('radio'),
                    'encendedor' => $this->input->post('encendedor'),
                    'pisos' => $this->input->post('pisos'),
                    'manijas' => $this->input->post('manijas'),
                    'ceniceros' => $this->input->post('ceniceros'),
                    'parasoles' => $this->input->post('parasoles'),
                    'espejo_interior' => $this->input->post('espInterior'),
                    'coderas' => $this->input->post('coderas'),
                    'gata' => $this->input->post('gata'),
                    'llave_rueda' => $this->input->post('llaveRueda'),
                    'repuestos' => $this->input->post('repuestos'),
                    'bateria' => $this->input->post('bateria'),
                    'radiador' => $this->input->post('radiador'),
                    'arrancador' => $this->input->post('arrancador'),
                    'alternador' => $this->input->post('alternador'),
                    'carburador' => $this->input->post('carburador'),
                    'purificador' => $this->input->post('purificador'),
                    'distribuidor' => $this->input->post('distribuidor'),
                    'bobina' => $this->input->post('bobina'),
                    'tapa_aceite' => $this->input->post('tapaAceite'),
                    'bujias' => $this->input->post('bujias'),
                    'fusibles' => $this->input->post('fusibles'),
                    'rev_tecnica' => $this->input->post('revisionTecnica'),
                    'obs' => $this->input->post('observacion'),
                    'celular' => $this->input->post('celular'),
                    'email' => $this->input->post('email'),
                    'user_crea' => $this->session->userdata('user'),
                );

                $this->Internamiento_Model->add_internamiento($params);
                redirect('internamiento');
            } else {
                //$data['categorias'] = $this->Categoria_Model->get_all_categorias();
                $data['javascript'] = array('internamiento/add.js');
                $data['_view'] = 'internamiento/add';
                $this->load->view('layouts/main', $data);
            }
        } //fin if session
        else {
            redirect('admin');
        }
    }

    public function edit($cod_boleta)
    {
        $autorizados = [1, 2, 4];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'nro_boleta' => $this->input->post('nroBoleta'),
                    'placa' => $this->input->post('placa'),
                    'marca' => $this->input->post('marca'),
                    'color' => $this->input->post('color'),
                    'clase' => $this->input->post('clase'),
                    'anio' => $this->input->post('anio'),
                    'motor_nro' => $this->input->post('motor'),
                    'propietario' => $this->input->post('propietario'),
                    'chofer' => $this->input->post('chofer'),
                    'nro_licencia' => $this->input->post('licencia'),
                    'infraccion' => $this->input->post('infraccion'),
                    'cod_oficial' => $this->input->post('codigoOficial'),
                    'oficial' => $this->input->post('oficial'),
                    'grado' => $this->input->post('grado'),
                    'sub_unidad' => $this->input->post('subUnidad'),
                    'deposito' => $this->input->post('deposito'),
                    'fch_ing' => $this->input->post('fechaIngreso'),
                    'faro_grande' => $this->input->post('faroGrande'),
                    'faro_chico' => $this->input->post('faroChico'),
                    'faro_posterior' => $this->input->post('farosPosteriores'),
                    'biceles' => $this->input->post('biceles'),
                    'limpia_parabrisas' => $this->input->post('limParabrisas'),
                    'lunas' => $this->input->post('lunas'),
                    'llantas' => $this->input->post('llantas'),
                    'vasos' => $this->input->post('vasos'),
                    'espejo_exterior' => $this->input->post('espExterior'),
                    'antena' => $this->input->post('antena'),
                    'chapas' => $this->input->post('chapas'),
                    'parachoques' => $this->input->post('parachoques'),
                    'llanta_repuesto' => $this->input->post('llantaRepuesto'),
                    'tablero' => $this->input->post('tablero'),
                    'chapa_contacto' => $this->input->post('chapaContacto'),
                    'radio' => $this->input->post('radio'),
                    'encendedor' => $this->input->post('encendedor'),
                    'pisos' => $this->input->post('pisos'),
                    'manijas' => $this->input->post('manijas'),
                    'ceniceros' => $this->input->post('ceniceros'),
                    'parasoles' => $this->input->post('parasoles'),
                    'espejo_interior' => $this->input->post('espInterior'),
                    'coderas' => $this->input->post('coderas'),
                    'gata' => $this->input->post('gata'),
                    'llave_rueda' => $this->input->post('llaveRueda'),
                    'repuestos' => $this->input->post('repuestos'),
                    'bateria' => $this->input->post('bateria'),
                    'radiador' => $this->input->post('radiador'),
                    'arrancador' => $this->input->post('arrancador'),
                    'alternador' => $this->input->post('alternador'),
                    'carburador' => $this->input->post('carburador'),
                    'purificador' => $this->input->post('purificador'),
                    'distribuidor' => $this->input->post('distribuidor'),
                    'bobina' => $this->input->post('bobina'),
                    'tapa_aceite' => $this->input->post('tapaAceite'),
                    'bujias' => $this->input->post('bujias'),
                    'fusibles' => $this->input->post('fusibles'),
                    'rev_tecnica' => $this->input->post('revisionTecnica'),
                    'obs' => $this->input->post('observacion'),
                    'celular' => $this->input->post('celular'),
                    'email' => $this->input->post('email'),
                    'user_crea' => $this->session->userdata('user'),
                );

                $this->Internamiento_Model->update_internamiento($cod_boleta, $params);
                redirect('internamiento');
            } else {
                $data['internado'] = $this->Internamiento_Model->get_internamiento_id($cod_boleta);
                $data['_view'] = 'internamiento/edit';
                $this->load->view('layouts/main', $data);
            }
        } //fin if session
        else {
            redirect('admin');
        }
    }

    /**
     * Funcion para mostrar los vehiculos que estan en observacion
     */

    public function observados()
    {
        $autorizados = [1, 2, 4];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $data['internados'] = $this->Internamiento_Model->get_internamientos_observados();
            $data['javascript'] = array('internamiento/observados.js');
            $data['_view'] = "internamiento/observados";
            $this->load->view('layouts/main', $data);
        } else
            redirect('admin');
    }

    /**
     * Formulario para la subida de archivo pdf, para su posterior revision
     */

    public function internadoSalida()
    {

        $autorizados = [1, 2, 3, 4, 5];
        $aux = $this->autorizacion_session($autorizados);
        /* En caso sea un usuario con credenciales */
        if ($aux !== false) {
            if (isset($_POST) && count($_POST) > 0) {
                $placa = $this->input->post('placa');
                $getBoleta = $this->Internamiento_Model->get_internamiento_placa($placa);
                $getBoletaObservada = $this->Internamiento_Model->get_internamiento_placa_observado($placa);
                if ($getBoleta) {
                    $params = array(
                        'fch_sal' => date('Y-m-d'),
                        'path' => $getBoleta['placa'] . "-" . $getBoleta['cod_boleta'],
                        'user_salida' => $this->session->userdata('user'),
                    );
                    $this->subirImagen($getBoleta['cod_boleta'], $getBoleta['placa']);
                    $this->Internamiento_Model->update_internamiento($getBoleta['cod_boleta'], $params);

                    $data['confirmacion'] = true;
                    $data['nameDoc'] = $getBoleta['placa'] . "-" . $getBoleta['cod_boleta'];
                    $data['_view'] = "internamiento/confirmSalida";
                    $this->load->view('layouts/main', $data);
                } else if ($getBoletaObservada) {
                    $params = array(
                        'fch_sal' => date('Y-m-d'),
                        'path' => $getBoletaObservada['placa'] . "-" . $getBoletaObservada['cod_boleta'],
                        'user_verificacion' => NULL,
                        'obs_verificacion' => NULL,
                    );
                    $this->subirImagen($getBoletaObservada['cod_boleta'], $getBoletaObservada['placa']);
                    $this->Internamiento_Model->update_internamiento($getBoletaObservada['cod_boleta'], $params);

                    $data['confirmacion'] = true;
                    $data['nameDoc'] = $getBoletaObservada['placa'] . "-" . $getBoletaObservada['cod_boleta'];
                    $data['_view'] = "internamiento/confirmSalida";
                    $this->load->view('layouts/main', $data);
                } else {
                    $data['_view'] = "internamiento/confirmSalida";
                    $this->load->view('layouts/main', $data);
                }
            } else {
                $data['javascript'] = array('internamiento/salida.js');
                $data['_view'] = "internamiento/salida";
                $this->load->view('layouts/main', $data);
            }
        }
        /* En caso sea una persona natural */ else {
            if (isset($_POST) && count($_POST) > 0) {
                $placa = $this->input->post('placa');
                $getBoleta = $this->Internamiento_Model->get_internamiento_placa($placa);
                $getBoletaObservada = $this->Internamiento_Model->get_internamiento_placa_observado($placa);
                if ($getBoleta) {
                    $params = array(
                        'fch_sal' => date('Y-m-d'),
                        'path' => $getBoleta['placa'] . "-" . $getBoleta['cod_boleta'],
                    );
                    $this->subirImagen($getBoleta['cod_boleta'], $getBoleta['placa']);
                    $this->Internamiento_Model->update_internamiento($getBoleta['cod_boleta'], $params);

                    $data['confirmacion'] = true;
                    $data['nameDoc'] = $getBoleta['placa'] . "-" . $getBoleta['cod_boleta'];
                    $this->load->view('internamiento/confirmSalida_guest', $data);
                } else if ($getBoletaObservada) {
                    $params = array(
                        'fch_sal' => date('Y-m-d'),
                        'path' => $getBoletaObservada['placa'] . "-" . $getBoletaObservada['cod_boleta'],
                        'user_verificacion' => NULL,
                        'obs_verificacion' => NULL,
                    );
                    $this->subirImagen($getBoletaObservada['cod_boleta'], $getBoletaObservada['placa']);
                    $this->Internamiento_Model->update_internamiento($getBoletaObservada['cod_boleta'], $params);

                    $data['confirmacion'] = true;
                    $data['nameDoc'] = $getBoletaObservada['placa'] . "-" . $getBoletaObservada['cod_boleta'];
                    $this->load->view('internamiento/confirmSalida_guest', $data);
                } else {
                    $data['confirmacion'] = false;
                    $this->load->view('internamiento/confirmSalida_guest', $data);
                }
            } else {
                $data['javascript'] = array('internamiento/salida.js');
                $this->load->view('internamiento/salida_guest', $data);
            }
        }
    }


    /**
     * Funcion para realizar la subida de archivos al servidor
     */
    protected function subirImagen($id, $placa)
    {
        $config['overwrite']            = TRUE;
        $config['upload_path']          = 'assets/own/docs/';
        $config['allowed_types']        = 'application/pdf|pdf';
        $config['file_name']            = $placa . "-" . $id;
        $config['max_size']             = 3584;

        //$this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('pdf')) {
            var_dump($this->upload->display_errors());
        } else {
            $info = array('upload_data' => $this->upload->data());
            $data = array(
                'pdf' => $info['upload_data']['file_name']
            );
        }
    }

    ///Para revisar si existe la placa en boleta_int, tambien para verificar si estan observados 
    public function verificacionPlaca()
    {
        if ($this->input->is_ajax_request()) {
            $params = $this->input->post();
            if (isset($params)) {
                $data['placa'] = $this->Internamiento_Model->get_internamiento_placa($params['placa']);
                if ($data['placa'] == NULL) {
                    $data['placa'] = $this->Internamiento_Model->get_internamiento_placa_observado($params['placa']);
                }
                $this->load->view('ajax/salida', $data);
            }
        }
    }

    /*
    *   Funcion para visualizar los documentos pdf subidos por el interesado en la salida
     */
    public function viewPDF($nomDoc)
    {
        $autorizados = [1, 2, 3, 5];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $this->load->helper('download');
            $nameDoc = $nomDoc . ".pdf";
            $path = base_url('assets/own/docs/'); //Ruta donde esta almacenado el documento
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=" . $nameDoc);
            header('content-Transfer-Encoding:binary');
            header('Accept-Ranges:bytes');
            readfile($path . $nameDoc);
        } else
            redirect('admin');
    }

    /**
     * Funcion para visualizar los vehiculos que necesitan revision de documentos
     */
    public function verificacionSalida()
    {
        $autorizados = [1, 2, 3, 5];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            if ($this->session->userdata('tipoUsuario') == 5) {
                $data['internados'] = $this->Internamiento_Model->get_internamientos_salida();
                $data['_view'] = "internamiento/verificacion";
                $data['javascript'] = array('internamiento/verificacionSalida.js');
                $this->load->view('layouts/main', $data);
            } else if ($this->session->userdata('tipoUsuario') == 3) {
                $data['internados'] = $this->Internamiento_Model->get_internamientos_primera_verificacion();
                $data['_view'] = "internamiento/verificacionSubGerente";
                $data['javascript'] = array('internamiento/verificacionSalida.js');
                $this->load->view('layouts/main', $data);
            } else if ($this->session->userdata('tipoUsuario') == 2) {
                $data['internados'] = $this->Internamiento_Model->get_internamientos_segunda_verificacion();
                $data['_view'] = "internamiento/verificacionGerente";
                $data['javascript'] = array('internamiento/verificacionSalida.js');
                $this->load->view('layouts/main', $data);
            }
        } else
            redirect('admin');
    }

    /**
     * Funcion para visualizar los vehiculos que ya pasaron por los procesos de autorizacion
     */
    public function listaVerificadosSalida()
    {
        $autorizados = [6];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $data['internados'] = $this->Internamiento_Model->get_internamientos_verificados_salida();
            $data['_view'] = "internamiento/verificadosSalida.php";
            $data['javascript'] = array('internamiento/verificadosSalida.js');
            $this->load->view('layouts/main', $data);
        } else
            redirect('admin');
    }

    /**
     * Funcion para visualizar los vehiculos que necesitan revision de documentos
     */
    public function listaVerificados()
    {
        $autorizados = [1, 2];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $data['internados'] = $this->Internamiento_Model->get_internamientos_observados();
            $data['_view'] = "internamiento/verificados";
            $data['javascript'] = array('internamiento/verificados.js');
            $this->load->view('layouts/main', $data);
        } else
            redirect('admin');
    }


    public function listaVehiculosAutorizados()
    {
        $autorizados = [1, 6];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $data['internados'] = $this->Internamiento_Model->get_internamientos_autorizados();
            $data['_view'] = "internamiento/vehiculosAutorizados";
            $data['javascript'] = array('internamiento/verificados.js');
            $this->load->view('layouts/main', $data);
        } else
            redirect('admin');
    }

    /**
     * Funcion para visualizar todos los vehiculos que fueron internados, que estan en proceso de salida, o ya salieron
     */
    public function allInternamiento()
    {
        $autorizados = [1, 2];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $data['internados'] = $this->Internamiento_Model->get_internamientos();
            $data['javascript'] = array('internamiento/all.js');
            $data['_view'] = "internamiento/all";
            $this->load->view('layouts/main', $data);
        } else
            redirect('admin');
    }

    /**
     * Funcion para visualizar los vehiculos que ya pasaron por los procesos de autorizacion
     */
    public function listaActas()
    {
        $autorizados = [6];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $data['internados'] = $this->Internamiento_Model->get_internamientos_finalizados();
            $data['_view'] = "internamiento/listaActasControl.php";
            $data['javascript'] = array('internamiento/verificadosSalida.js');
            $this->load->view('layouts/main', $data);
        } else
            redirect('admin');
    }

    /* public function test()
    {
        $content = "<h1>MUNICIPALIDAD PROVICIAL DE PUNO<h1/>
                    <h2>GERENCIA DE TRANSPORTES Y SEGURIDAD VIAL<h2/>
                    <p style='border:1px solid gray; border-radius: 10px; padding:20px>LE INFORMAMOS QUE EL TRAMITO QUE REALIZO PARA EL LEVANTAMIENTO DE SU VEHICULO SE REALIZÓ CORRECTAMENTE<p/>";

        $this->email_test($content, "cjeanma009@gmail.com");
    } */

    /**
     * Funcion prueba de email
     */
    public function sendEmail($motivo, $email, $tipo)
    {
        $mensaje = "<h1>MUNICIPALIDAD PROVICIAL DE PUNO<h1/>
                    <h2>GERENCIA DE TRANSPORTES Y SEGURIDAD VIAL<h2/>";
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        //Falta Probar la libreria de mandar mensajes con php codeigniter
        $this->email->to($email);
        $this->email->from($this->emailMunicipalidad);
        $this->email->subject("Aviso sobre salida de su vehiculo internado - Municipalidad Provincial de Puno");
        switch ($tipo) {
            case "aceptado":
                $mensaje = $mensaje . "<p>LE INFORMAMOS QUE EL TRAMITO QUE REALIZO PARA EL LEVANTAMIENTO DE SU VEHICULO SE REALIZÓ CORRECTAMENTE</p>";
                break;
            case "denegado":
                $mensaje = $mensaje . "<p>LE INFORMAMOS QUE EL TRAMITO QUE REALIZO PARA EL LEVANTAMIENTO DE SU VEHICULO NO FUE ACEPTADO, POR EL SIGUIENTE MOTIVO:</p>
                            <ul><li>" . $motivo . "<li/><ul/>";
                break;
        }

        $this->email->message($mensaje);

        $this->email->send();

        /* if ($this->email->send()) {
            echo "se envio mensaje";
        } else
            $this->email->print_debugger(); */
    }

    /**
     * Funcion para mostrar formulario de motivo de denegacion de proceso de salida
     */
    public function denegarSolicitud($codigo)
    {
        $autorizados = [2, 3, 5];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            if (isset($_POST) && count($_POST) > 0) {
                //$internado = $this->Internamiento_Model->get_internamiento_id($codigo);
                $params = array(
                    'user_verificacion' => $this->session->userdata('user'),
                    'obs_verificacion' => $this->input->post('mensajeDenegar'),
                    'verificacion' => 0,
                    'verSubGerente' => 0,
                    'verGerente' => 0,
                );
                $internamiento = $this->Internamiento_Model->get_internamiento_id($codigo);
                $this->Internamiento_Model->update_internamiento($codigo, $params);
                $this->sendEmail($internamiento["obs_verificacion"], $internamiento['email'], "denegado");
                //la funcion Email aun esta en prueba
                //email_test($internado['obs_verificacion'], $internado['email'])
                redirect('internamiento/verificacionSalida');
            } else {
                $data['internado'] = $this->Internamiento_Model->get_internamiento_id($codigo);
                $data['_view'] = "internamiento/denegar";
                $this->load->view('layouts/main', $data);
            }
        } else
            redirect('admin');
    }

    /**
     * Funcion para confirmar la validez de los documentos subidos para salida de un vehiculo
     */
    public function verificado($id)
    {
        $autorizados = [2, 3, 5];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            if ($this->session->userdata('tipoUsuario') == 5) {
                $data_update = array(
                    'verificacion' => 1,
                    'user_verificacion' => $this->session->userdata('user')
                );
                $this->Internamiento_Model->update_internamiento($id, $data_update);
                redirect('internamiento/verificacionSalida');
            } else if ($this->session->userdata('tipoUsuario') == 3) {
                $data_update = array(
                    'verSubGerente' => 1,
                    'user_verSubGerente' => $this->session->userdata('user')
                );
                $this->Internamiento_Model->update_internamiento($id, $data_update);
                redirect('internamiento/verificacionSalida');
            } else if ($this->session->userdata('tipoUsuario') == 2) {
                $data_update = array(
                    'verGerente' => 1,
                    'user_verGerente' => $this->session->userdata('user')
                );
                $this->Internamiento_Model->update_internamiento($id, $data_update);
                $internamiento = $this->Internamiento_Model->get_internamiento_id($id);
                $this->sendEmail("", $internamiento['email'], "aceptado");
                redirect('internamiento/verificacionSalida');
            }
        } else {
            redirect('admin');
        }
    }

    /**
     * Funcion para confirmar la validez de los documentos subidos para salida de un vehiculo
     */
    public function controlSalida($id)
    {
        $autorizados = [6];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            if (isset($_POST) && count($_POST) > 0) {
                /*Los datos post tienen los mismos nombre s de la tabla por eso solo paramos el post a param*/
                $params = $this->input->post();
                $idActa = $this->ActaLevante_Model->add_acta($params);
                $data_update = array(
                    'user_salida' => $this->session->userdata('user'),
                    'idActaControl' => $idActa,
                    'fch_sal' => date('Y-m-d'),
                );
                $this->Internamiento_Model->update_internamiento($id, $data_update);
                $internamiento = $this->Internamiento_Model->get_internamiento_id($id);
                $this->sendEmail("", $internamiento['email'], "aceptado");
                $data['internado'] = $internamiento;
                $data['_view'] = "internamiento/confirmarVerificacion";
                $this->load->view("layouts/main", $data);
            } else {
                $data['internado'] = $this->Internamiento_Model->get_internamiento_id($id);
                $data['javascript'] = array();
                $data['_view'] = "internamiento/FormVerificado";
                $this->load->view("layouts/main", $data);
            }
        } else {
            redirect('admin');
        }
    }

    public function reportes()
    {
        $autorizados = [1, 2, 3];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $data['javascript'] = array('internamiento/reportes.js');
            $data['_view'] = "internamiento/reportes";
            $this->load->view("layouts/main", $data);
        } else
            redirect('admin');
    }

    public function reporteIngreso($fInit, $fEnd)
    {
        $autorizados = [1, 2, 3];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $registros = $this->Internamiento_Model->get_fechaEntrada($fInit, $fEnd);
            $this->load->helper('fpdf_helper');
            if ($registros) {
                fpdf();
                $pdf = new CellPDF();
                $pdf->SetMargins(12, 10);
                $pdf->AddPage();
                $pdf->SetFont('helvetica', 'B', 16);
                $pdf->Cell(185, 10, "Lista de Registros por Fecha de Ingreso", 0, 1, "C", 0);
                $pdf->Cell(185, 10, "Desde " . date('d-m-Y', strtotime($fInit)) . " Hasta " . date('d-m-Y', strtotime($fEnd)), 0, 1, "C", 0);
                $pdf->Ln(5);
                $pdf->SetFont('helvetica', 'B', 12);
                $pdf->Cell(10, 6, utf8_decode("N°"), 1, 0, "C", 0);
                $pdf->Cell(15, 6, "PLACA", 1, 0, "C", 0);
                $pdf->Cell(20, 6, "INFRACCION", 1, 0, "C", 0);
                $pdf->Cell(45, 6, "PROPIETARIO", 1, 0, "C", 0);
                $pdf->Cell(45, 6, "CHOFER", 1, 0, "C", 0);
                $pdf->Cell(20, 6, "INGRESO", 1, 0, "C", 0);
                $pdf->Cell(30, 6, "ESTADO", 1, 1, "C", 0);
                $pdf->SetFont('helvetica', '', 12);
                $cont = 1;
                foreach ($registros as $r) {
                    $pdf->Cell(10, 6, $cont++, 1, 0, "C", 0);
                    $pdf->Cell(15, 6, utf8_decode($r['placa']), 1, 0, "C", 0);
                    $pdf->Cell(20, 6, utf8_decode($r['infraccion']), 1, 0, "C", 0);
                    $pdf->Cell(45, 6, utf8_decode($r['propietario']), 1, 0, "L", 0);
                    $pdf->Cell(45, 6, utf8_decode($r['chofer']), 1, 0, "L", 0);
                    $pdf->Cell(20, 6, utf8_decode(date("d-m-Y", strtotime($r['fch_ing']))), 1, 0, "C", 0);
                    $mensaje = "";
                    if ($r['fch_sal']) {
                        $mensaje = "Culminado";
                    } elseif ($r['path'] && $r['fch_sal'] == NULL) {
                        $mensaje = "Verificando";
                    } else {
                        $mensaje = "No presentó";
                    }
                    $pdf->Cell(30, 6, utf8_decode($mensaje), 1, 1, "C", 0);
                }

                $pdf->Output('I', "Reporte de ingreso.pdf");
            } else {
                fpdf();
                $pdf = new CellPDF();
                $pdf->SetMargins(12, 10);
                $pdf->AddPage();
                $pdf->SetFont('helvetica', 'B', 16);
                $pdf->Cell(185, 10, "Lista de Registros por Fecha de Ingreso", 0, 1, "C", 0);
                $pdf->Cell(185, 10, "Desde " . date('d-m-Y', strtotime($fInit)) . " Hasta " . date('d-m-Y', strtotime($fEnd)), 0, 1, "C", 0);
                $pdf->Ln(5);
                $pdf->SetFont('helvetica', 'B', 12);
                $pdf->Cell(15, 6, "PLACA", 1, 0, "C", 0);
                $pdf->Cell(20, 6, "INFRACCION", 1, 0, "C", 0);
                $pdf->Cell(50, 6, "PROPIETARIO", 1, 0, "C", 0);
                $pdf->Cell(50, 6, "CHOFER", 1, 0, "C", 0);
                $pdf->Cell(20, 6, "INGRESO", 1, 0, "C", 0);
                $pdf->Cell(30, 6, "ESTADO", 1, 1, "C", 0);
                $pdf->Cell(185, 6, "NO SE ENCUENTRAN REGISTROS", 1, 1, "C",0);
                $pdf->Output('I', "Reporte de ingreso.pdf");
            }
        } else
            redirect('admin');
    }

    public function reporteSalida($fInit, $fEnd)
    {
        $autorizados = [1, 2, 3];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $registros = $this->Internamiento_Model->get_fechaSalida($fInit, $fEnd);
            $this->load->helper('fpdf_helper');
            if ($registros) {
                fpdf();
                $pdf = new CellPDF();
                $pdf->SetMargins(12, 10);
                $pdf->AddPage();
                $pdf->SetFont('helvetica', 'B', 16);
                $pdf->Cell(185, 10, "Lista de Registros por Fecha de Salida", 0, 1, "C", 0);
                $pdf->Cell(185, 10, "Desde " . date('d-m-Y', strtotime($fInit)) . " Hasta " . date('d-m-Y', strtotime($fEnd)), 0, 1, "C", 0);
                $pdf->Ln(5);
                $pdf->SetFont('helvetica', 'B', 12);
                $pdf->Cell(10, 6, utf8_decode("N°"), 1, 0, "C", 0);
                $pdf->Cell(15, 6, "PLACA", 1, 0, "C", 0);
                $pdf->Cell(20, 6, "INFRACCION", 1, 0, "C", 0);
                $pdf->Cell(60, 6, "PROPIETARIO", 1, 0, "C", 0);
                $pdf->Cell(60, 6, "CHOFER", 1, 0, "C", 0);
                $pdf->Cell(20, 6, "INGRESO", 1, 1, "C", 0);
                $pdf->SetFont('helvetica', '', 12);
                $cont = 1;
                foreach ($registros as $r) {
                    $pdf->Cell(10, 6, $cont++, 1, 0, "C", 0);
                    $pdf->Cell(15, 6, utf8_decode($r['placa']), 1, 0, "C", 0);
                    $pdf->Cell(20, 6, utf8_decode($r['infraccion']), 1, 0, "C", 0);
                    $pdf->Cell(60, 6, utf8_decode($r['propietario']), 1, 0, "L", 0);
                    $pdf->Cell(60, 6, utf8_decode($r['chofer']), 1, 0, "L", 0);
                    $pdf->Cell(20, 6, utf8_decode(date("d-m-Y", strtotime($r['fch_ing']))), 1, 1, "C", 0);
                }

                $pdf->Output('I', "Reporte de salida.pdf");
            } else {
                fpdf();
                $pdf = new CellPDF();
                $pdf->SetMargins(12, 10);
                $pdf->AddPage();
                $pdf->SetFont('helvetica', 'B', 16);
                $pdf->Cell(185, 10, "Lista de Registros por Fecha de Salida", 0, 1, "C", 0);
                $pdf->Cell(185, 10, "Desde " . date('d-m-Y', strtotime($fInit)) . " Hasta " . date('d-m-Y', strtotime($fEnd)), 0, 1, "C", 0);
                $pdf->Ln(5);
                $pdf->SetFont('helvetica', 'B', 12);
                $pdf->Cell(15, 6, "PLACA", 1, 0, "C", 0);
                $pdf->Cell(20, 6, "INFRACCION", 1, 0, "C", 0);
                $pdf->Cell(65, 6, "PROPIETARIO", 1, 0, "C", 0);
                $pdf->Cell(65, 6, "CHOFER", 1, 0, "C", 0);
                $pdf->Cell(20, 6, "INGRESO", 1, 1, "C", 0);
                $pdf->SetFont('helvetica', '', 12);
                $pdf->Cell(185, 6, "NO SE ENCUENTRAN REGISTROS", 1, 1, "C", 0);
                $pdf->Output('I', "Reporte de salida.pdf");
            }
        } else
            redirect('admin');
    }

    public function viewActa($idBoleta)
    {
        $autorizados = [1, 2, 6];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $internamiento = $this->Internamiento_Model->get_internamiento_id($idBoleta);
            $acta = $this->ActaLevante_Model->get_acta($internamiento['idActaControl']);
            $this->load->helper('fpdf_helper');
            if ($internamiento['verificacion'] == 1) {
                fpdf();
                $pdf = new CellPDF();
                $pdf->SetMargins(12, 10);
                $pdf->AddPage();
                $this->cabeceraActa($pdf, $acta); //Cabecera de boleta
                $pdf->SetFont('helvetica', 'B', 16);
                $this->cuerpoActa($pdf, $acta, $internamiento);
                $pdf->Output();
            } else {
                $data['_view'] = 'internamiento/negacionActaView';
                $this->load->view('layouts/main', $data);
            }
        } else
            redirect('admin');
    }


    public function internadoPDF($id)
    {
        $autorizados = [1, 2, 4];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $this->load->helper('fpdf_helper');
            $datos = $this->Internamiento_Model->get_internamiento_id($id);
            fpdf();
            $pdf = new CellPDF();
            $pdf->SetMargins(12, 10);
            $pdf->AddPage();
            $this->cabecera($pdf); //Cabecera de boleta
            $pdf->SetFont('helvetica', 'B', 16);
            $pdf->Cell(185, 10, utf8_decode("BOLETA DE INTERNAMIENTO Nº " . $datos['nro_boleta']), 0, 1, 'C');
            $this->pdfPrimeraParte($pdf, $datos);
            $pdf->Ln(5);
            $pdf->Cell(185, 10, utf8_decode("INTERNAMIENTO"), 1, 1, 'C', 1);
            $this->pdfSegundaParte($pdf, $datos);
            $pdf->Ln(5);

            $pdf->MultiCell(185, 8, utf8_decode("Observaciones"), 1, 1, 'C', 1);
            $pdf->Cell(185, 7, utf8_decode($datos['obs']), 'B', 1, 'L');
            $pdf->Ln(3);
            $pdf->MultiCell(185, 8, utf8_decode("Celular"), 1, 1, 'C', 1);
            $pdf->Cell(185, 7, utf8_decode($datos['celular']), 'B', 1, 'L');

            $pdf->Output();
        } else
            redirect('admin');
    }

    protected function cabecera($pdf)
    {
        $pdf->Image(base_url('assets/own/img/logo-muni.png'), 8, 8, 40, 30);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(30, 6, ""); //espaciado
        $pdf->Cell(100, 6, "MUNICIPALIDAD PROVINCIAL DE PUNO", 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(30, 6, ""); //espaciado
        $pdf->Cell(100, 6, "PROGRAMA ESPECIAL TERMINAL TERRESTRE", 0, 1, 'C');
        $pdf->Cell(30, 6, ""); //espaciado
        $pdf->Cell(100, 6, "DIVISION DE TRANSPORTE", 0, 1, 'C');
        $pdf->Cell(30, 6, ""); //espaciado
        $pdf->Cell(100, 6, "DEPOSITO OFICIAL DE VEHICULOS", 0, 1, 'C');
    }
    protected function pdfPrimeraParte($pdf, $datos)
    {
        $fecha = explode("-", $datos['fch_ing']);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Ln(5);
        $pdf->Cell(90, 8, "DEL VEHICULO", 1, 0, 'C', 1);
        $pdf->Cell(5, 6, "");
        $pdf->Cell(90, 8, "INFRACCIONES", 1, 1, 'C', 1);

        $pdf->Cell(30, 7, "Placa:", 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['placa']), 'B', 0, 'C');
        $pdf->Cell(5, 7, "");
        $pdf->Cell(30, 7, "Infraccion:", 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['infraccion']), "B", 1, 'C');

        $pdf->Cell(30, 7, "Marca:", 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['marca']), 'B', 0, 'C');
        $pdf->Cell(5, 7, "");
        $pdf->Cell(30, 7, "Policia:", 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['oficial']), "B", 1, 'C');

        $pdf->Cell(30, 7, "Color:", 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['color']), 'B', 0, 'C');
        $pdf->Cell(5, 7, "");
        $pdf->Cell(30, 7, "Grado:", 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['grado']), "B", 1, 'C');

        $pdf->Cell(30, 7, "Clase:", 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['clase']), 'B', 0, 'C');
        $pdf->Cell(5, 7, "");
        $pdf->Cell(30, 7, "Sub Unidad:", 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['sub_unidad']), "B", 1, 'C');

        $pdf->Cell(30, 7, utf8_decode("Año:"), 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['anio']), 'B', 0, 'C');
        $pdf->Cell(5, 7, "");
        $pdf->Cell(30, 7, "Deposito:", 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['deposito']), "B", 1, 'C');

        $pdf->Cell(30, 7, utf8_decode("Motor Nº:"), 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['motor_nro']), 'B', 0, 'C');
        $pdf->Cell(5, 7, "");
        $pdf->Cell(90, 7, "FECHA DE INGRESO:", 0, 1, 'C');

        $pdf->Cell(30, 7, "Propietario:", 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['propietario']), 'B', 0, 'C');
        $pdf->Cell(5, 7, "");
        $pdf->Cell(15, 7, "Dia:", 0, 0, 'L');
        $pdf->Cell(15, 7, utf8_decode($fecha[2]), 'B', 0, 'C');
        $pdf->Cell(15, 7, "Mes:", 0, 0, 'L');
        $pdf->Cell(15, 7, utf8_decode($fecha[1]), 'B', 0, 'C');
        $pdf->Cell(15, 7, utf8_decode("Año:"), 0, 0, 'L');
        $pdf->Cell(15, 7, utf8_decode($fecha[0]), 'B', 1, 'C');

        $pdf->Cell(30, 7, "Chofer:", 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['chofer']), 'B', 0, 'C');
        $pdf->Cell(5, 7, "");
        $pdf->Cell(90, 7, "FECHA DE SALIDA:", 0, 1, 'C');

        $pdf->Cell(30, 7, utf8_decode("Nº Licencia"), 0, 0, 'L');
        $pdf->Cell(60, 7, utf8_decode($datos['nro_licencia']), 'B', 0, 'C');
        $pdf->Cell(5, 7, "");
        $pdf->Cell(15, 7, "Dia:", 0, 0, 'L');
        $pdf->Cell(15, 7, "-", 'B', 0, 'C');
        $pdf->Cell(15, 7, "Mes:", 0, 0, 'L');
        $pdf->Cell(15, 7, "-", 'B', 0, 'C');
        $pdf->Cell(15, 7, utf8_decode("Año:"), 0, 0, 'L');
        $pdf->Cell(15, 7, "-", 'B', 1, 'C');
    }

    protected function pdfSegundaParte($pdf, $datos)
    {
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->ln(4);
        $pdf->Cell(185, 6, "ESTADO CARROCERIA", 0, 1, 'C');
        $pdf->ln(4);
        $pdf->Cell(60, 6, "Parte Exterior", 1, 0, 'C', 1);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(60, 6, "Parte Inferior", 1, 0, 'C', 1);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(60, 6, "Motor", 1, 1, 'C', 1);

        $pdf->Cell(50, 6, "Faro Grande D.", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['faro_grande'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Tablero", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['tablero'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Bateria", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['bateria'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 2
        $pdf->Cell(50, 6, "Faro Chico D.", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['faro_chico'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Chapa Contacto", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['chapa_contacto'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Radiador", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['radiador'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 3
        $pdf->Cell(50, 6, "Faros Posteriores", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['faro_posterior'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Radio", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['radio'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Arrancador", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['arrancador'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 4
        $pdf->Cell(50, 6, "Biceles", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['biceles'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Encendedor", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['encendedor'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Alternador", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['alternador'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 5
        $pdf->Cell(50, 6, "Limp. Parabrisas", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['limpia_parabrisas'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Pisos", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['pisos'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Carburador", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['carburador'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 6
        $pdf->Cell(50, 6, "Lunas", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['lunas'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Manijas", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['manijas'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Purificador", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['purificador'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 7
        $pdf->Cell(50, 6, "Llantas", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['llantas'], 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Ceniceros", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['ceniceros'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Distribuidor", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['distribuidor'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 8
        $pdf->Cell(50, 6, "Vasos", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['vasos'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Parasoles", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['parasoles'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Bobina", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['bobina'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 9
        $pdf->Cell(50, 6, "Espejo Exterior", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['espejo_exterior'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Espejo Interior", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['espejo_interior'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Tapa Aceite", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['tapa_aceite'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 10
        $pdf->Cell(50, 6, "Antena", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['antena'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Coderas", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['coderas'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Bujias", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['bujias'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 11
        $pdf->Cell(50, 6, "Chapas", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['chapas'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Gata", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['gata'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Fusibles", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['fusibles'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 12
        $pdf->Cell(50, 6, "Parachoques", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['parachoques'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Llave de Rueda", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['llave_rueda'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, "", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        //Fila 13
        $pdf->Cell(50, 6, "Llanta Repuesto", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['llanta_repuesto'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Repuestos", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['repuestos'] == 1 ? "4" : "8", 1, 0, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(2, 6, "");
        $pdf->Cell(50, 6, "Rev. Tecnica", 1, 0, 'L');
        $pdf->SetFont('zapfdingbats', 'B', 11);
        $pdf->Cell(10, 6, $datos['rev_tecnica'] == 1 ? "4" : "8", 1, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 11);
    }

    /* funciones para dibujar el pdf de acta de Control */
    protected function cabeceraActa($pdf, $acta)
    {
        $pdf->Image(base_url('assets/own/img/logo-muni.png'), 8, 10, 40, 30);
        /* preimera linea */
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(30, 10, ""); //espaciado
        $pdf->Cell(63, 10, "MUNICIPALIDAD PROVINCIAL DE PUNO", 0, 0, 'C');
        $pdf->SetFont('helvetica', '', 20);
        $pdf->Cell(90, 10, "ACTA DE CONTROL", 0, 1, 'C');

        /* segunda linea */
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(30, 6, ""); //espaciado
        $pdf->Cell(63, 6, "GERENCIA DE TRANSPORTES Y SEGURIDAD VIAL", 0, 0, 'J', 0);
        $pdf->SetFont('helvetica', '', 20);
        $pdf->Cell(90, 6, utf8_decode("Nº " . $acta['idActaControl']), 0, 1, 'C');

        /* tercera linea    */
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(93, 5, ""); //espaciado
        $pdf->Cell(90, 5, utf8_decode("Reglamento Nacional de Administración de Transporte"), 0, 1, 'C');

        /* cuarta linea */
        $pdf->Cell(93, 5, ""); //espaciado
        $pdf->Cell(90, 5, utf8_decode("D.S. Nº 017 - 2009 - MTC"), 0, 1, 'C');

        /* para dibujar los cuadros */
        $pdf->Rect(15, 10, 90, 30);
        $pdf->Rect(105, 10, 90, 30);
    }

    protected function cuerpoActa($pdf, $acta, $internamiento)
    {
        $this->datosInfractor($pdf, $acta, $internamiento);
        $this->datosVehiculo($pdf, $acta, $internamiento);
        $this->datosAutoridad($pdf, $acta, $internamiento);
    }

    protected function datosInfractor($pdf, $acta, $internamiento)
    {
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Ln(10);
        $pdf->SetFont('helvetica', 'b', 14);
        $pdf->Cell(185, 9, "DATOS DEL INFRACTOR", 1, 1, 'L', 1);
        $pdf->SetFont('helvetica', 'b', 10);
        /* primera linea  */
        $pdf->Cell(40, 8, "Licencia de ", 'TLR', 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(80, 8, $internamiento['nro_licencia'], 1, 0, 'C');
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(30, 8, "Clase :", 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(35, 8, $internamiento['clase'], 1, 1, 'C');

        /* segunda fila */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, "Conducir : ", 'BLR', 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(30, 8, "Nacional", 'B', 0, 'C');
        $pdf->Cell(30, 8, "Militar", 'B', 0, 'C');
        $pdf->Cell(30, 8, "Extranjera", 'B', 0, 'C');
        $pdf->Cell(30, 8, "Otros", 'B', 0, 'C');
        $pdf->Cell(25, 8, "", 'BR', 1);

        /* tercera fila */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, "Doc. Identidad:", 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(145, 8, $acta['dni'], 1, 1, 'C');

        /* cuarta, quinta fila */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, "Nombre Completo:", 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(145, 8, $internamiento['chofer'], 1, 1, 'C');

        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, "Domicilio del", 'LR', 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(145, 8, $acta['domicilioInfractor'], 1, 1, 'C');

        /* sexta fila */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, " Infractor: ", 'LRB', 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(50, 8, utf8_decode("Distrito : " . $acta['distrito']), 'B', 0, 'L');
        $pdf->Cell(45, 8, utf8_decode("Provincia : " . $acta['provincia']), 'B', 0, 'L');
        $pdf->Cell(50, 8, utf8_decode("Departamento : " . $acta['departamento']), 'BR', 1, 'L');
    }

    protected function datosVehiculo($pdf, $acta, $internamiento)
    {
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Ln(2);
        $pdf->SetFont('helvetica', 'b', 14);
        $pdf->Cell(95, 9, "DATOS DEL VEHICULO", 1, 0, 'L', 1);
        $pdf->Cell(90, 9, "DATOS DE LA INFRACCION", 1, 1, 'L', 1);
        $pdf->SetFont('helvetica', 'b', 10);
        /* primera linea  */
        $pdf->Cell(40, 8, utf8_decode("Nº Placa Unica Nacional:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(55, 8, strtoupper($internamiento['placa']), 1, 0, 'C');
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(30, 8, utf8_decode("Código Infracción :"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(60, 8, $internamiento['infraccion'], 1, 1, 'C');

        /* segunda linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, utf8_decode("Oficina Registral:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(55, 8, utf8_decode($acta['oficinaRegistral']), 1, 0, 'C');
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(30, 8, utf8_decode("O.M. Nº :"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(60, 8, "", 1, 1, 'C');

        /* tercera linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, utf8_decode("Nº Tarj. Propiedad:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(55, 8, utf8_decode($acta['tarjetaPropiedad']), 1, 0, 'C');
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(30, 8, utf8_decode("Fecha:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(60, 8, $internamiento['fch_sal'], 1, 1, 'C');

        /* cuarta linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, utf8_decode("Marca:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(55, 8, utf8_decode($internamiento['marca']), 1, 0, 'C');
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(30, 8, utf8_decode("Lugar"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(60, 8, utf8_decode($acta['lugarInfraccion']), 1, 1, 'C');

        /* quinta linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, utf8_decode("Razon Social:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(55, 8, utf8_decode($acta['razonSocial']), 1, 0, 'C');
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(30, 8, utf8_decode("Distrito"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(60, 8, utf8_decode($acta['distritoInfraccion']), 1, 1, 'C');

        /* quinta linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, utf8_decode("Tipo Servicio:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(55, 8, utf8_decode($acta['tipoServicio']), 1, 0, 'C');
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(90, 8, utf8_decode(""), 1, 1, 'L');

        /* quinta linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, utf8_decode("Medida Preventiva:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(145, 8, utf8_decode($acta['medidaPreventiva']), 1, 1, 'C');

        /* sexta linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 20, utf8_decode("Observaciones IMT:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(145, 20, utf8_decode($acta['observacionIMT']), 1, 1, 'C');

        /* septima linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 15, utf8_decode("Observaciones del Infractor:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(145, 15, utf8_decode($internamiento['obs']), 1, 1, 'C');
    }

    protected function datosAutoridad($pdf, $acta, $internamiento)
    {
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Ln(2);
        $pdf->SetFont('helvetica', 'b', 14);
        $pdf->Cell(95, 9, "AUTORIDAD QUE LEVANTA EL ACTA", 1, 0, 'L', 1);
        $pdf->Cell(90, 9, "DATOS DEL TESTIGO", 1, 1, 'L', 1);
        /* Primera linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, utf8_decode("Apellido Paterno:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(55, 8, utf8_decode($acta['apAutoridad']), 1, 0, 'C');
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(30, 8, utf8_decode("Apellido Paterno:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(60, 8, utf8_decode($acta['apTestigo']), 1, 1, 'C');

        /* Segunda linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, utf8_decode("Apellido Materno:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(55, 8, utf8_decode($acta['amAutoridad']), 1, 0, 'C');
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(30, 8, utf8_decode("Apellido Materno:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(60, 8, utf8_decode($acta['amTestigo']), 1, 1, 'C');

        /* Tercera linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, utf8_decode("Nombres:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(55, 8, utf8_decode($acta['nombreAutoridad']), 1, 0, 'C');
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(30, 8, utf8_decode("Nombres:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(60, 8, utf8_decode($acta['nombreTestigo']), 1, 1, 'C');

        /* Cuarta linea */
        $pdf->SetFont('helvetica', 'b', 10);
        $pdf->Cell(40, 8, utf8_decode("Prueba de Testigo:"), 1, 0, 'L');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(145, 8, utf8_decode($acta['pruebaTestigo']), 1, 1, 'C');

        /* Quinta linea */
        $pdf->Cell(60, 20, "", 1, 0, 'L');
        $pdf->Cell(65, 20, "", 1, 0, 'L');
        $pdf->Cell(60, 20, "", 1, 1, 'C');

        /* Sexta linea */
        $pdf->Cell(60, 7, "FIRMA DEL I.M.T.", 1, 0, 'C');
        $pdf->Cell(65, 7, "FIRMA DEL INFRACTOR", 1, 0, 'C');
        $pdf->Cell(60, 7, "FIRMA DEL TESTIGO", 1, 1, 'C');
    }
}
