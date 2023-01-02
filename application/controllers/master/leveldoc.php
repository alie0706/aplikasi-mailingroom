<?php
class Leveldoc extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_leveldoc');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_leveldoc->tampil_data();
        $this->template->load('template','leveldoc/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses leveldoc
            $nama       =   $this->input->post('nama_leveldoc');
            $data       = array('nama_leveldoc'=>$nama);
            $this->model_leveldoc->post($data);
            redirect('master/leveldoc');
        }
        else{
            
            $this->template->load('template','leveldoc/form_input');
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses leveldoc
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_leveldoc');
            $data       = array('nama_leveldoc'=>$nama);
            $this->model_leveldoc->edit($data,$id);
            redirect('master/leveldoc');
        }
        else{
            $id=  $this->uri->segment(4);
            
            $data['record']     =  $this->model_leveldoc->get_one($id)->row_array();
            $this->template->load('template','leveldoc/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id =  $this->uri->segment(4);
        $this->model_leveldoc->delete($id);
        redirect('master/leveldoc');
    }
}