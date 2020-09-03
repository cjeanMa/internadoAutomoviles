<?php
class Usuario_Model extends CI_Model
{
        public function __construct()
        {
                $this->load->database();
        }

        function get_all_usuarios()
        {
                $this->db->join('tipusuario t', "u.idTipoUsuario = t.idTipoUsuario", 'left');
                $this->db->order_by('u.idUsuario', 'desc');
                return $this->db->get('usuario u')->result_array();
        }

        /**
         * Funcion para llamar un registro de usuario por id
         */

        function get_usuario($id)
        {
                $this->db->where('idUsuario', $id);
                return $this->db->get('usuario')->row_array();
        }

        /**
         * Funcion para llamar un registro de usuario por user
         */

        function get_usuario_user($user)
        {
                $this->db->where('user', $user);
                return $this->db->get('usuario')->row_array();
        }

        /**
         * Funcion para Hashear Password
         */

        private function hash_password($password)
        {
                return password_hash($password, PASSWORD_BCRYPT);
        }

        /*
     * function to add new usuario
     */
        function add_usuario($params)
        {
                $params['password'] = sha1($params['password']);
                $this->db->insert('usuario', $params);
                return $this->db->insert_id();
        }


        function verificar($user, $password)
        {
                $condition = array(
                        'user' => $user,
                        'password' => sha1($password),
                        'habilitacion' => 1
                );
                $result = $this->db->where($condition)->from('usuario')->get();

                if ($result->num_rows() === 1) {
                        return true;
                } else {
                        return false;
                }
        }


        /*
     * function to update usuario
     */
        function update_usuario($idUsuario, $params)
        {
                if (isset($params['password'])) {
                        $params['password'] = sha1($params['password']);
                }
                $this->db->where('idUsuario', $idUsuario);
                return $this->db->update('usuario', $params);
        }

        /*
     * function to delete usuario
     */
        function delete_usuario($idUsuario)
        {
                return $this->db->delete('usuario', array('idUsuario' => $idUsuario));
        }
}
