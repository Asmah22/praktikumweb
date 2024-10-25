<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email','email','required|trim');
        $this->form_validation->set_rules('password','password','required|trim');

        $this->load->view('login/index');
    }

    public function dologin(){
        $user = $this->input->post('email');
        $pswd = $this->input->post('password'); 
        $user = $this->db->get_where('user', ['email' => $user])->row_array(); // Cari user berdasarkan email 
        if ($user) { // Jika user ditemukan 
             if (password_verify($pswd, $user['password'])) { // Periksa password-nya 
            $data = [ 
            'id'       => $user['id'], 
            'email'    => $user['email'], 
            'username' => $user['username'], 
            'role'     => $user['role'] 
        ]; $userid = $user['id']; 
        $this->session->set_userdata($data); // Set data session 
        // Redirect berdasarkan role user 
        if ($user['role'] == 'PEMILIK') { 
            $this->_updateLastLogin($userid); // Update last login 
            redirect('menu'); 
        } elseif ($user['role'] == 'ADMIN') { 
            $this->_updateLastLogin($userid); 
            redirect('user'); 
        } elseif ($user['role'] == 'KASIR') { 
            $this->_updateLastLogin($userid); 
            redirect('kasir'); 
        } else { 
            redirect('login'); 
        } 
    } else { // Jika password salah 
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Error:</b> Password Salah.</div>'); 
        redirect('/'); 
    } 
} else { // Jika user tidak terdaftar 
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Error:</b> User Tidak Terdaftar.</div>'); 
    redirect('/'); 
}}

private function _updateLastLogin($userid){
    $sql = "UPDATE user SET last_login=now() WHERE id=$userid";
    $this->db->query($sql);
}

public function logout ()// hancurkan semua sesi
{
    $this->session->sess_destroy();
    redirect(site_url('login'));
}
public function block()
{
    $data = array(
        'user' => infoLogin(),
        'title'=> 'Access Denied!'
    );
    $this->load->view( 'login/error404', $data);
}
}