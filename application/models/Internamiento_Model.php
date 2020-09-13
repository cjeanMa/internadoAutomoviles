<?php
class Internamiento_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        //para obtener datos enlazados con tabla placa 
        function get_all_internamientos(){
                $this->db->join('vehiculo v',"b.placa = v.placa", 'left');
                $this->db->order_by('b.placa', 'desc');
                return $this->db->get('boleta_int b')->result_array();
        }

        //Funcion para busca internado por placa y fechaSalida
        function get_internamiento_placa($placa){
                $params = array('placa'=> $placa, 'fch_sal'=>NULL);
                $this->db->where($params);
                return $this->db->get('boleta_int')->row_array();
        }

        function get_internamiento_placa_observado($placa){
            $params = array('placa'=> $placa, 'fch_sal!='=>NULL,  'verificacion'=>0, 'obs_verificacion!='=>NULL);
            $this->db->where($params);
            return $this->db->get('boleta_int')->row_array();
        }

        //Fucnion para busca internado por cod_boleta
        function get_internamiento_id($id){
            $this->db->where('cod_boleta', $id);
            return $this->db->get('boleta_int')->row_array();
    }

        function get_internamientos(){
            $this->db->order_by('cod_boleta','desc');
            return $this->db->get('boleta_int')->result_array();
        }

        function get_internamientos_nuevos(){
            $params = array(
                'user_verificacion' => NULL,
                'user_salida' => NULL,
                'verificacion'=> 0,
                'obs_verificacion' => NULL,
                'path' => NULL
            );
            $this->db->order_by('cod_boleta','desc');
            $this->db->where($params);
            return $this->db->get('boleta_int')->result_array();
        }

        function get_internamientos_salida(){
            $params = array(
                'fch_sal !=' => NULL,
                'verificacion'=> 0,
                'obs_verificacion'=>NULL,
            );
            $this->db->order_by('cod_boleta','desc');
            $this->db->where($params);
            return $this->db->get('boleta_int')->result_array();
        }

        /* Funcion para obtener internamientos verificados satisfactoriamente */
        function get_internamientos_observados(){
            $params = array(
                'user_verificacion !=' => NULL,
                'idActaControl !=' => NULL,
                'verificacion'=> 1,
            );
            $this->db->order_by('cod_boleta','desc');
            $this->db->where($params);
            return $this->db->get('boleta_int')->result_array();
        }


        function get_internamientos_verificados(){
            $params = array(
                'user_verificacion !=' => NULL,
                'user_salida !=' => NULL,
                'verificacion'=> 0,
                'obs_verificacion !=' => NULL,

            );
            $this->db->order_by('cod_boleta','desc');
            $this->db->where($params);
            return $this->db->get('boleta_int')->result_array();
        }


         /*
     * function to add new internamiento
     */
    function add_internamiento($params)
    {
        $this->db->insert('boleta_int',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update internamiento por numero de placa
     */
    function update_internamiento($id,$params)
    {
        $this->db->where('cod_boleta',$id);
        return $this->db->update('boleta_int',$params);
    }
    
    /*
     * function to delete internamiento
     */
    function delete_internamiento($boleta)
    {
        return $this->db->delete('boleta_int',array('cod_boleta'=>$boleta));
    }

}
