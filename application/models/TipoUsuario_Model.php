<?php
class TipoUsuario_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        function get_all_tipoUsuarios(){
                $this->db->order_by('idTipoUsuario', 'desc');
                return $this->db->get('tipusuario')->result_array();
        }

        function get_tipoUsuario($id){
                $this->db->where('idUsuario', $id);
                return $this->db->get('usuario')->result_array();
        }

}