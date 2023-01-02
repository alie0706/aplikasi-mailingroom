<?php
class model_departemen extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT *
                FROM m_departemen";
        return $this->db->query($query);
    }
    
    function post($data)
    {
        $this->db->insert('m_departemen',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('kd_departemen'=>$id);
        return $this->db->get_where('m_departemen',$param);
    }
    
    function edit($data,$id)
    {
        $this->db->where('kd_departemen',$id);
        $this->db->update('m_departemen',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('kd_departemen',$id);
        $this->db->delete('m_departemen');
    }
}