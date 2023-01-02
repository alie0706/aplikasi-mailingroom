<?php
class model_users extends CI_Model{
    
    
    
    function login($username,$password)
    {
        $chek=  $this->db->get_where('users',array('username'=>$username,'password'=>  md5($password)));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    
    function ceck($username,$password)
    {
        return $this->db->get_where('users',array('username'=>$username,'password'=> md5($password)));
    }
    
    function tampildata()
    {
        return $this->db->get('users');
    }
    
    function get_one($id)
    {
        $param  =   array('id'=>$id);
        return $this->db->get_where('users',$param);
    }
}