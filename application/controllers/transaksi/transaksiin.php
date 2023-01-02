<?php
class Transaksiin extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form'); 
        $this->load->model('model_transaksiin');
        $this->load->model('model_pic');
        $this->load->model('model_logistik');
        $this->load->model('model_kota');
        $this->load->model('model_departemen');
        $this->load->model('model_penerima');
        $this->load->model('model_leveldoc');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_transaksiin->tampil_data();
        $this->template->load('template','transaksiin/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses transaksiin
            $bln_sekarang = date("m");
            $thn_sekarang = date("Y");
            $dataurut        = $this->model_transaksiin->get_max($thn_sekarang, $bln_sekarang)->result();
            $urut            = $dataurut[0]->urut;
            $nourut          = $urut + 1 ;
            // print_r($nourut);
            // die;

            $mail_id         =   $this->input->post('mail_id');
            $date_mail       =   $this->input->post('date_mail');
            $kd_pic          =   $this->input->post('kd_pic');
            $kd_logistik     =   $this->input->post('kd_logistik');
            $airwaybill      =   $this->input->post('airwaybill');
            $shipperName     =   $this->input->post('shipperName');
            $kd_kota         =   $this->input->post('kd_kota');
            $recipientName   =   $this->input->post('recipientName');
            $kd_departemen   =   $this->input->post('kd_departemen');
            $additional_Info =   $this->input->post('additional_Info');
            // $received_by     =   $this->input->post('received_by');
            // $received_date   =   $this->input->post('received_date');
            $kd_leveldoc     =   $this->input->post('kd_leveldoc');
            // $status          =   $this->input->post('status');
            $kd_departemen   =   $this->input->post('kd_departemen');
            $data            = array('mail_id'=>$mail_id,
                                'date_mail'=>$date_mail,
                                'kd_pic'=>$kd_pic,
                                'kd_logistik'=>$kd_logistik,
                                'airwaybill'=>$airwaybill,
                                'shipperName'=>$shipperName,
                                'kd_kota'=>$kd_kota,
                                'recipientName'=>$recipientName,
                                'kd_departemen'=>$kd_departemen,
                                'additional_Info'=>$additional_Info,
                                'kd_leveldoc'=>$kd_leveldoc,
                                'status'=>1,
                                'urut'=>$nourut,
                            );

            //kirim email
            //untuk menangkap data yang dikirim dari form 
            $fname = "IT Support";
            $femail = "itsupport@gmail.com";
            $fsubject = "Subject Test";
            $fmessage = "Dear Bapak/Ibu 
                            <div align=left>
                                <br>
                                
                                    <table style='border-collapse: collapse;'border='1' cellpadding='2' cellspacing='0' width='60%'>
                                        <tbody>
                                            <tr>
                                            <td align=center bgcolor='#e28996'><b>PEMBERITAHUAN</td>
                                            <tr>
                                                <td align=left> Ada 1(satu) permintaan yang menunggu approve dari anda. 
                                                        <br> click <a href='$link/loginceckA.php?username=$c_email2[id_user]'>approve</a> jika ingin setujui/melihat data permintaan ini 
                                                        
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    <br>
                                    <font size=2>Nb: Email ini dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.</i></font>
                                    
                                </div>
                                <br>
                                Regards,<br><br>
                                IT Admin";
    
            //set to_email id ke mana Anda ingin menerima email 
            $to_email1 = 'alie.nurdiansah07@gmail.com'; //contoh zai@gmail.com
            $recipientArr = array($to_email1);
            $config = Array(
                
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'ali.nurdiansah85@gmail.com',
                'smtp_pass' => 'L1e4ndf4',
                'mailtype'  => 'text', 
                'charset'   => 'iso-8859-1'
            );
            // echo $to_email1;
            // die;
             //load library email dan konfigurasinya
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");   
        
                //Kirim email
                //email dan nama pengirim 
        
                $this->email->from($femail, $fname);
                //email penerima 
        
                $this->email->to($to_email1);
        
                //subject email
                $this->email->subject($fsubject);
        
                //isi email
                $this->email->message($fmessage);
        
                $result = $this->email->send();
                if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }
            $this->model_transaksiin->post($data);
            redirect('transaksi/transaksiin');
        }
        else{
            $bln_sekarang = date("m");
            $thn_sekarang = date("Y");
            $data['max']        = $this->model_transaksiin->get_max($thn_sekarang, $bln_sekarang)->result();
            $pic        = $this->model_pic->tampil_data()->result();
            $logistik   = $this->model_logistik->tampil_data()->result();
            $kota       = $this->model_kota->tampil_data()->result();
            $departemen = $this->model_departemen->tampil_data()->result();
            $penerima = $this->model_penerima->tampil_data()->result();
            $leveldoc   = $this->model_leveldoc->tampil_data()->result();
            $dataurut        = $this->model_transaksiin->get_max($thn_sekarang, $bln_sekarang)->result();
            $urut            = $dataurut[0]->urut;
            $nourut          = $urut + 1 ;
            $data            = array('urut' => $nourut,
                                'pic' => $pic,
                                'logistik' => $logistik,
                                'kota' => $kota,
                                'departemen' => $departemen,
                                'penerima' => $penerima,
                                'leveldoc' => $leveldoc);
                            
            $this->template->load('template','transaksiin/form_input',$data);
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses transaksiin
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_transaksiin');
            $data       = array('nama_transaksiin'=>$nama);
            $this->model_transaksiin->edit($data,$id);
            redirect('master/transaksiin');
        }
        else{
            $id=  $this->uri->segment(4);
            
            $data['record']     =  $this->model_transaksiin->get_one($id)->row_array();
            $this->template->load('template','transaksiin/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id =  $this->uri->segment(4);
        $this->model_transaksiin->delete($id);
        redirect('master/transaksiin');
    }
}