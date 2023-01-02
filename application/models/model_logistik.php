<?php
class model_logistik extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT *
                FROM m_logistik";
        return $this->db->query($query);
    }
    
    function post($data)
    {
        $this->db->insert('m_logistik',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('kd_logistik'=>$id);
        return $this->db->get_where('m_logistik',$param);
    }
    
    function edit($data,$id)
    {
        $this->db->where('kd_logistik',$id);
        $this->db->update('m_logistik',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('kd_logistik',$id);
        $this->db->delete('m_logistik');
    }
}