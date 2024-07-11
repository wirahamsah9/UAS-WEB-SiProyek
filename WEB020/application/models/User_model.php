<?php
class User_model extends CI_Model {

    public function register($data) {
        return $this->db->insert('users', $data);
    }

    public function login($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row_array();
    }
}
?>
