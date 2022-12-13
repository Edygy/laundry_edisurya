<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('email')){
            redirect('user');
        }
        $this->form_validation->set_rules('email','email','required|trim|valid_email');
        $this->form_validation->set_rules('password','password','required|trim');
        if($this->form_validation->run() == false) {

           $data['title'] = 'login pages';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user' , ['email' => $email])->row_array();
        if ($user) {
            if ($user['is_active'] ==1) {
                if (password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    }else {
                    redirect('user');
                    }
                    }else {
                        $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">
                        Wrong password!
                        </div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                  'message',
                  '<div class="alert alert-danger" role="alert">
                  This email has not been activated!
                  </div>'  
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert"
                Email is not registered!
                </div>'
            );
            redirect('auth');
        }
    }
    public function registration()
    {   
        if ($this->session->userdata('email')){
            redirect('user');
        }
        $this->form_validation->set_rules('name','name','required|trim');
        $this->form_validation->set_rules('email','email','required|trim|valid_email');
        $this->form_validation->set_rules('password1','password','required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'password dont match',        
                'min_length' => 'password to short'
            ]
        );
        $this->form_validation->set_rules('password2','password','required|trim|matches[password1]');
        if($this->form_validation->run() == false) {

            $data['title'] = 'registration pages';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }else{
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),
                PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created'=> time()
            ];
            $this->db->insert('user',$data);
            $this->session->set_flashdata('message',
            '<div class="alert-success" role="alert">
            Congratulation,your account has been creted. please login!
            </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
             You have been logged Out! </div>'
        );
        redirect('auth');
    }
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}