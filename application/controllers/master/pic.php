<?php
class Pic extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_pic');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_pic->tampil_data();
        $this->template->load('template','pic/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses pic
            $nama       =   $this->input->post('nama_pic');
            $data       = array('nama_pic'=>$nama);
            $this->model_pic->post($data);
            redirect('master/pic');
        }
        else{
            
            $this->template->load('template','pic/form_input');
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses pic
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_pic');
            $data       = array('nama_pic'=>$nama);
            $this->model_pic->edit($data,$id);
            redirect('master/pic');
        }
        else{
            $id=  $this->uri->segment(4);
            
            $data['record']     =  $this->model_pic->get_one($id)->row_array();
            $this->template->load('template','pic/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id =  $this->uri->segment(4);
        $this->model_pic->delete($id);
        redirect('master/pic');
    }
}