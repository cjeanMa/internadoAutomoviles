<?php
class ActaLevante_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    function get_acta($id)
    {
        $this->db->where('idActaControl', $id);
        return $this->db->get('actaControl')->row_array();
    }

    /*
     * function to add new producto
     */
    function add_acta($params)
    {
        $this->db->insert('actaControl', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update producto
     */
    function update_acta($id, $params)
    {
        $this->db->where('idActaControl', $id);
        return $this->db->update('actaControl', $params);
    }

}
