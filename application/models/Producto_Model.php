<?php
class Producto_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        function get_all_productos(){
                $this->db->join('tipo t',"p.idTipo = t.idTipo", 'left');
                $this->db->order_by('p.idProducto', 'desc');
                return $this->db->get('producto p')->result_array();
        }

        function get_producto($id){
                $this->db->where('idProducto', $id);
                return $this->db->get('producto')->row_array();
        }

         /*
     * function to add new producto
     */
    function add_producto($params)
    {
        $this->db->insert('producto',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update producto
     */
    function update_producto($idProducto,$params)
    {
        $this->db->where('idProducto',$idProducto);
        return $this->db->update('producto',$params);
    }
    
    /*
     * function to delete producto
     */
    function delete_producto($idProducto)
    {
        return $this->db->delete('producto',array('idProducto'=>$idProducto));
    }

    /* Para obtener productos por categoria */

    function get_productos_categoria($idCategoria, $numRegistros=50){
        $this->db->join('tipo t', 'p.idTipo = t.idTipo', 'left');
        $this->db->join('categoria c', 't.idCategoria = c.idCategoria', 'left');
        $this->db->where('t.idCategoria', $idCategoria);
        $this->db->order_by('p.idProducto', 'DESC');
        return $this->db->get('producto p', $numRegistros)->result_array();

    }
}
