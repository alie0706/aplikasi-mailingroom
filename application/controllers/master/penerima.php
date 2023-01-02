<?php
class Penerima extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_penerima');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_penerima->tampil_data();
        $this->template->load('template','penerima/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses penerima
            $nik            =   $this->input->post('nik');
            $nama           =   $this->input->post('nama_penerima');
            $email           =   $this->input->post('email_penerima');
            $kddepartemen   =   $this->input->post('kd_departemen');
            $status         =   1;
            $data           = array('nik'=>$nik,
                                'nama_penerima'=>$nama,
                                'email_penerima'=>$email,
                                'kd_departemen'=>$kddepartemen,
                                'status'=>$status);
            $this->model_penerima->post($data);
            redirect('master/penerima');
        }
        else{
            $this->load->model('model_departemen');
            $data['departemen']=  $this->model_departemen->tampil_data()->result();
            $this->template->load('template','penerima/form_input',$data);
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses penerima
            // $id         =   $this->input->post('id');
            $nik            =   $this->input->post('nik');
            $nama           =   $this->input->post('nama_penerima');
            $email           =   $this->input->post('email_penerima');
            $kddepartemen   =   $this->input->post('kd_departemen');
            $status   =   $this->input->post('status');
            $data       = array('nik'=>$nik,
                                'nama_penerima'=>$nama,
                                'email_penerima'=>$email,
                                'kd_departemen'=>$kddepartemen,
                                'status'=>$status);
            $this->model_penerima->edit($data,$nik);
            redirect('master/penerima');
        }
        else{
            $id=  $this->uri->segment(4);
            $this->load->model('model_departemen');
            $data['departemen']=  $this->model_departemen->tampil_data()->result();
            $data['record']     =  $this->model_penerima->get_one($id)->row_array();
            $this->template->load('template','penerima/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id =  $this->uri->segment(4);
        $this->model_penerima->delete($id);
        redirect('master/penerima');
    }
}