<?php
class Project_model extends CI_Model {

    public function get_all_projects() {
        $query = $this->db->get('projects');
        return $query->result_array();
    }

    public function get_project_by_id($id) {
        return $this->db->get_where('projects', array('id' => $id))->row_array();
    }

    public function insert_project($data) {
        return $this->db->insert('projects', $data);
    }

    public function update_project($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('projects', $data);
    }

    public function delete_project($id) {
        $this->db->where('id', $id);
        return $this->db->delete('projects');
    }

    public function search_projects($search_term) {
        $this->db->like('project_name', $search_term);
        $query = $this->db->get('projects');
        return $query->result_array();
    }

}
?>
