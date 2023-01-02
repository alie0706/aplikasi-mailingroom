<?php
class model_leveldoc extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT *
                FROM m_leveldoc";
        return $this->db->query($query);
    }
    
    function post($data)
    {
        $this->db->insert('m_leveldoc',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('kd_leveldoc'=>$id);
        return $this->db->get_where('m_leveldoc',$param);
    }
    
    function edit($data,$id)
    {
        $this->db->where('kd_leveldoc',$id);
        $this->db->update('m_leveldoc',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('kd_leveldoc',$id);
        $this->db->delete('m_leveldoc');
    }
}