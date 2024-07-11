<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function Register() {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[50]',
            array(
                'required' => 'Kolom %s harus diisi.',
                'min_length' => 'Panjang %s minimal 5 karakter.',
                'max_length' => 'Panjang %s maksimal 50 karakter.'
            )
        );
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',
            array(
                'required' => 'Kolom %s harus diisi.',
                'valid_email' => 'Format %s tidak valid.',
                'is_unique' => '%s sudah terdaftar.'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',
            array(
                'required' => 'Kolom %s harus diisi.',
                'min_length' => 'Panjang %s minimal 6 karakter.'
            )
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Auth/Register');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
            );
            $this->User_model->Register($data);
            redirect('Auth/Login');
        }
    }
    
    
    

    public function Login() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',
            array(
                'required' => 'Kolom %s harus diisi.',
                'valid_email' => 'Format %s tidak valid.'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'required',
            array(
                'required' => 'Kolom %s harus diisi.'
            )
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Auth/Login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->User_model->Login($email);
    
            if ($user && password_verify($password, $user['password'])) {
                $this->session->set_userdata('user_id', $user['id']);
                redirect('Home');
            } else {
                $this->session->set_flashdata('error', 'Email atau password salah.');
                redirect('Auth/Login');
            }
        }
    }
    
    

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('Auth/Login');
    }
}
?>
