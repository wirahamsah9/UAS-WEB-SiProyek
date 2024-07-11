<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Resource_model');
        // Load model Project_model jika digunakan untuk mengambil data proyek
        // $this->load->model('Project_model');
    }

    public function create($project_id) {
        // Validasi form tambah resource
        $this->form_validation->set_rules('resource_name', 'Resource Name', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke view create dengan data proyek
            $this->load->view('Resource/Create', array('project_id' => $project_id));
        } else {
            // Jika validasi berhasil, simpan data resource ke dalam database
            $data = array(
                'project_id' => $project_id,
                'resource_name' => $this->input->post('resource_name'),
                'quantity' => $this->input->post('quantity')
            );
            $this->Resource_model->insert_resource($data);
            // Redirect ke halaman view project dengan $project_id
            redirect('Home/View_project/' . $project_id);
        }
    }

    public function edit($id) {
        // Mendapatkan data resource berdasarkan $id
        $data['resource'] = $this->Resource_model->get_resource_by_id($id);

        // Validasi form edit resource
        $this->form_validation->set_rules('resource_name', 'Resource Name', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke view edit dengan data resource
            $this->load->view('Resource/Edit', $data);
        } else {
            // Jika validasi berhasil, update data resource di database
            $update_data = array(
                'resource_name' => $this->input->post('resource_name'),
                'quantity' => $this->input->post('quantity')
            );
            $this->Resource_model->update_resource($id, $update_data);
            // Redirect ke halaman view project dengan $project_id yang sesuai
            redirect('Home/View_project/' . $data['resource']['project_id']);
        }
    }

    public function update($resource_id) {
        // Validasi form update resource
        $this->form_validation->set_rules('resource_name', 'Resource Name', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman edit dengan pesan error
            $data['resource'] = $this->Resource_model->get_resource_by_id($resource_id);
            $this->load->view('Resource/Edit', $data);
        } else {
            // Jika validasi berhasil, ambil data dari form dan update resource di database
            $update_data = array(
                'resource_name' => $this->input->post('resource_name'),
                'quantity' => $this->input->post('quantity')
            );
            $this->Resource_model->update_resource($resource_id, $update_data);
            // Redirect ke halaman view project dengan $project_id yang sesuai
            $resource = $this->Resource_model->get_resource_by_id($resource_id);
            redirect('Home/View_project/' . $resource['project_id']);
        }
    }

    public function delete($id) {
        // Mendapatkan data resource berdasarkan $id
        $resource = $this->Resource_model->get_resource_by_id($id);
        
        // Menghapus resource dari database
        $this->Resource_model->delete_resource($id);

        // Redirect ke halaman view project dengan $project_id yang sesuai
        redirect('Home/View_project/' . $resource['project_id']);
    }
}
