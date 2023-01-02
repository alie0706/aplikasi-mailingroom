<?php
class model_penerima extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT a.nik, a.nama_penerima, a.email_penerima,a.kd_departemen, a.status, b.nama_departemen
                FROM m_penerima a LEFT JOIN m_departemen b ON a.kd_departemen=b.kd_departemen";
        return $this->db->query($query);
    }
    
    function post($data)
    {
        $this->db->insert('m_penerima',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('nik'=>$id);
        return $this->db->get_where('m_penerima',$param);
    }
    
    function edit($data,$id)
    {
        $this->db->where('nik',$id);
        $this->db->update('m_penerima',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('nik',$id);
        $this->db->delete('m_penerima');
    }
}