<?php
class model_transaksiin extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT  a.transaksiin_id, a.mail_id, a.date_mail, a.kd_pic, a.kd_logistik, a.airwaybill, 
        a.shipperName, a.kd_kota, a.recipientName, a.kd_departemen, a.additional_Info, a.received_by, a.received_date, 
        a.kd_leveldoc, a.status, b.nama_kota, c.nama_departemen, d.nama_pic, e.nama_logistik, f.nama_leveldoc
        FROM transaksi_in a 
            LEFT JOIN m_kota b ON a.kd_kota=b.kd_kota 
            LEFT JOIN m_departemen c ON a.kd_departemen=c.kd_departemen 
            LEFT JOIN m_pic d ON a.kd_pic=d.kd_pic 
            LEFT JOIN m_logistik e ON a.kd_logistik=e.kd_logistik 
            LEFT JOIN m_leveldoc f ON a.kd_leveldoc=f.kd_leveldoc 
            ORDER BY a.transaksiin_id ASC";
        return $this->db->query($query);
    }
    function get_max($thn_sekarang, $bln_sekarang)
    {
        $query= "SELECT  MAX(`urut`) AS `urut` FROM transaksi_in WHERE MID(`date_mail`,1,4)='$thn_sekarang' AND MID(`date_mail`,6,2)='$bln_sekarang'";
        return $this->db->query($query);
    }
    
    function post($data)
    {
        $this->db->insert('transaksi_in',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('transaksiin_id'=>$id);
        return $this->db->get_where('transaksi_in',$param);
    }
    
    function edit($data,$id)
    {
        $this->db->where('transaksiin_id',$id);
        $this->db->update('transaksi_in',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('transaksiin_id',$id);
        $this->db->delete('transaksi_in');
    }
}