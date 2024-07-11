<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Project_model');
        // $this->load->model('Schedule_model');
        $this->load->model('Resource_model');
        $this->load->helper('auth');
        // Panggil is_logged_in() di sini untuk memeriksa autentikasi
        is_logged_in();
    }

    public function index() {
        // Get search term from URL query parameter
        $search = $this->input->get('search');

        if (!empty($search)) {
            $data['projects'] = $this->Project_model->search_projects($search);
        } else {
            $data['projects'] = $this->Project_model->get_all_projects();
        }

        $this->load->view('Home/Index', $data);
    }

    public function create_project() {
        $this->form_validation->set_rules('project_name', 'Project Name', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Home/Create_project');
        } else {
            $data = array(
                'project_name' => $this->input->post('project_name'),
                'description' => $this->input->post('description'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date')
            );
            $this->Project_model->insert_project($data);
            redirect('Home');
        }
    }

    public function edit_project($id) {
        $data['project'] = $this->Project_model->get_project_by_id($id);
        
        $this->form_validation->set_rules('project_name', 'Project Name', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Home/Edit_project', $data);
        } else {
            $update_data = array(
                'project_name' => $this->input->post('project_name'),
                'description' => $this->input->post('description'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date')
            );
            $this->Project_model->update_project($id, $update_data);
            redirect('Home');
        }
    }

    public function delete_project($id) {
        $this->Project_model->delete_project($id);
        redirect('Home');
    }

    public function view_project($project_id) {
        $data['project'] = $this->Project_model->get_project_by_id($project_id);
        // $data['schedules'] = $this->Schedule_model->get_schedules_by_project($project_id);
        $data['resources'] = $this->Resource_model->get_resources_by_project($project_id);

        $this->load->view('Home/View_project', $data);
    }

    public function reset_search() {
        // Redirect to index page to reset search
        redirect('Home');
    }
}
?>
