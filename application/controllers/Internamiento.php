<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Internamiento extends CI_Controller
{

    public $emailMunicipalidad = "cjeanma009@gmail.com";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Internamiento_Model');
        $this->load->library('upload');
        $this->load->library('email');
        $this->load->helper('file');
        date_default_timezone_set('America/Lima');
    }

    public function index()
    {
        $autorizados = [1, 2, 3];
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
        $autorizados = [1, 2, 3];
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
        $autorizados = [1, 2, 3];
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
        $autorizados = [1, 2, 3];
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
        $autorizados = [1, 2, 3];
        $aux = $this->autorizacion_session($autorizados);
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
                        'user_salida' => $this->session->userdata('user'),
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
        } else
            redirect('admin');
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
    *   Funcion para visualizar los documentos pdf
     */
    public function viewPDF($nomDoc)
    {
        $autorizados = [1, 2, 3];
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
        $autorizados = [1, 2];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            $data['internados'] = $this->Internamiento_Model->get_internamientos_salida();
            $data['_view'] = "internamiento/verificacion";
            $data['javascript'] = array('internamiento/verificacionSalida.js');
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
     * Funcion prueba de email
     */
    public function email_test($mensaje, $email)
    {
        //Falta Probar la libreria de mandar mensajes con php codeigniter
        $this->email->to($email);
        $this->email->from($this->emailMunicipalidad);
        $this->email->subject("Aviso sobre salida de su vehiculo internado - Municipalidad Provincial de Puno");
        $this->email->message($mensaje);
        $this->email->send();
    }

    /**
     * Funcion para mostrar formulario de motivo de denegacion de proceso de salida
     */
    public function denegarSolicitud($codigo)
    {
        $autorizados = [1, 2];
        $aux = $this->autorizacion_session($autorizados);
        if ($aux !== false) {
            if (isset($_POST) && count($_POST) > 0) {
                //$internado = $this->Internamiento_Model->get_internamiento_id($codigo);
                $params = array(
                    'user_verificacion' => $this->session->userdata('user'),
                    'obs_verificacion' => $this->input->post('mensajeDenegar'),
                    'verificacion' => 0,
                );
                $this->Internamiento_Model->update_internamiento($codigo, $params);
                //la funcion Email aun esta en prueba
                //email_test($internado['obs_verificacion'], $internado['email'])
                redirect('internamiento/verificacionSalida');
            } else {
                $data['internado'] = $this->Internamiento_Model->get_internamiento_id($codigo);
                $data['_view'] = "internamiento/denegar";
                $this->load->view('layouts/main', $data);
            }
        }
        else
        redirect('admin');
    }

    /**
     * Funcion para confirmar la validez de los documentos subidos para salida de un vehiculo
     */
    public function verificado($idDoc)
    {
        $autorizados = [1,2];
        $aux = $this->autorizacion_session($autorizados);
        if($aux !== false){
            $params = array(
                'verificacion' => 1,
                'user_verificacion' => $this->session->userdata('user')
            );
            $this->Internamiento_Model->update_internamiento($idDoc, $params);
            redirect('internamiento/verificacionSalida');
        } else {
            redirect('admin');
        }
    }


    public function internadoPDF($id)
    {
        $autorizados = [1,2,3];
        $aux = $this->autorizacion_session($autorizados);
        if($aux !== false){
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
}
