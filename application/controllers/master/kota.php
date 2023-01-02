<?php
class Kota extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_kota');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_kota->tampil_data();
        $this->template->load('template','kota/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses kota
            $nama       =   $this->input->post('nama_kota');
            $data       = array('nama_kota'=>$nama);
            $this->model_kota->post($data);
            redirect('master/kota');
        }
        else{
            
            $this->template->load('template','kota/form_input');
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses kota
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_kota');
            $data       = array('nama_kota'=>$nama);
            $this->model_kota->edit($data,$id);
            redirect('master/kota');
        }
        else{
            $id=  $this->uri->segment(4);
            
            $data['record']     =  $this->model_kota->get_one($id)->row_array();
            $this->template->load('template','kota/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id =  $this->uri->segment(4);
        $this->model_kota->delete($id);
        redirect('master/kota');
    }
}