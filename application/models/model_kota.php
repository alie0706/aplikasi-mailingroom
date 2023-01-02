<?php
class model_kota extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT *
                FROM m_kota";
        return $this->db->query($query);
    }
    
    function post($data)
    {
        $this->db->insert('m_kota',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('kd_kota'=>$id);
        return $this->db->get_where('m_kota',$param);
    }
    
    function edit($data,$id)
    {
        $this->db->where('kd_kota',$id);
        $this->db->update('m_kota',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('kd_kota',$id);
        $this->db->delete('m_kota');
    }
}