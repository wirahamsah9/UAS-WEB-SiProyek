<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource_model extends CI_Model {

    public function get_resources_by_project($project_id) {
        return $this->db->get_where('resources', array('project_id' => $project_id))->result_array();
    }

    public function get_resource_by_id($id) {
        return $this->db->get_where('resources', array('id' => $id))->row_array();
    }

    public function insert_resource($data) {
        return $this->db->insert('resources', $data);
    }

    public function update_resource($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('resources', $data);
    }

    public function delete_resource($id) {
        $this->db->where('id', $id);
        return $this->db->delete('resources');
    }
}
?>
