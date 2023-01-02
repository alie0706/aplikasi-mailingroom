<?php
class Logistik extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_logistik');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_logistik->tampil_data();
        $this->template->load('template','logistik/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses logistik
            $nama       =   $this->input->post('nama_logistik');
            $data       = array('nama_logistik'=>$nama);
            $this->model_logistik->post($data);
            redirect('master/logistik');
        }
        else{
            
            $this->template->load('template','logistik/form_input');
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses logistik
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_logistik');
            $data       = array('nama_logistik'=>$nama);
            $this->model_logistik->edit($data,$id);
            redirect('master/logistik');
        }
        else{
            $id=  $this->uri->segment(4);
            
            $data['record']     =  $this->model_logistik->get_one($id)->row_array();
            $this->template->load('template','logistik/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id =  $this->uri->segment(4);
        $this->model_logistik->delete($id);
        redirect('master/logistik');
    }
}