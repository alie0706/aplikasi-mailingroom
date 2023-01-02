<?php
class Departemen extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_departemen');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_departemen->tampil_data();
        $this->template->load('template','departemen/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses departemen
            $nama       =   $this->input->post('nama_departemen');
            $data       = array('nama_departemen'=>$nama);
            $this->model_departemen->post($data);
            redirect('master/departemen');
        }
        else{
            
            $this->template->load('template','departemen/form_input');
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses departemen
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_departemen');
            $data       = array('nama_departemen'=>$nama);
            $this->model_departemen->edit($data,$id);
            redirect('master/departemen');
        }
        else{
            $id=  $this->uri->segment(4);
            
            $data['record']     =  $this->model_departemen->get_one($id)->row_array();
            $this->template->load('template','departemen/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id =  $this->uri->segment(4);
        $this->model_departemen->delete($id);
        redirect('master/departemen');
    }
}