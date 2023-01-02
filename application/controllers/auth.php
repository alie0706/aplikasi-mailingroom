
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_users');
    }
    
    function login()
    {
        if(isset($_POST['submit'])){
            
            // proses login disini
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            $hasil      =   $this->model_users->login($username,$password);
            if($hasil==1)
            {
                $ceckk      =  $this->model_users->ceck($username,$password)->result();
                // print_r($ceckk[0]->blokir);
                // die;
                if($ceckk[0]->blokir=="Y")
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert">Akun anda telah diblokir</div>');
                    redirect(base_url());
                }
                else{
                // update last login
                $this->db->where('username',$username);
                $this->db->update('users',array('last_login'=>date('Y-m-d H:i:s')));
                $this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
                redirect('dashboard');
                }
            }
            else{
                redirect('auth/login');
            }
        }
        else{
            //$this->load->view('form_login2');
            chek_session_login();
            $this->load->view('form_login');
        }
    }
    
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}