<?php
class model_pic extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT *
                FROM m_pic";
        return $this->db->query($query);
    }
    
    function post($data)
    {
        $this->db->insert('m_pic',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('kd_pic'=>$id);
        return $this->db->get_where('m_pic',$param);
    }
    
    function edit($data,$id)
    {
        $this->db->where('kd_pic',$id);
        $this->db->update('m_pic',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('kd_pic',$id);
        $this->db->delete('m_pic');
    }
}