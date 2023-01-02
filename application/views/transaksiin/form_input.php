<script src="<?php echo base_url()?>assets/js/date-time/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker.css" />
<script>
jQuery(function($) {

  $('.date-picker').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd',
  })
  //show datepicker when clicking on the icon
  .next().on(ace.click_event, function(){
    $(this).prev().focus();
  });
});
</script>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MAILINGROOM <small>Tambah Data Departemen</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('transaksi/transaksiin/post'); ?>
                                <?php
                                
                                $thn_sekarang = date("Y");
                                $thn = substr($thn_sekarang,2,2);
                                $bln_sekarang = date("m");
                                    $urut=$urut;
                                    // echo $urut;
                                    if($urut==NULL){
                                        $urutan=1;
                                        $mailkd="IN".$thn.$bln_sekarang."0000".$urutan;
                                    }
                                    else{
                                        if(strlen($urut) == 1)
                                            $max0 = "0000".$urut;
                                        elseif(strlen($urut) == 2)
                                            $max0 = "000".$urut;
                                        elseif(strlen($urut) == 3)
                                            $max0 = "00".$urut;	
                                        elseif(strlen($urut) == 4)
                                            $max0 = "0".$urut;	
                                        elseif(strlen($urut) == 5)
                                            $max0 = $urut;
                                        $urutan=$max0;
                                        $mailkd="IN".$thn.$bln_sekarang.$urutan;
                                    }
                                ?>
                                <div class="form-group">
                                    <label>Mail ID</label>
                                    <input class="form-control" name="mail_id" value="<?php echo $mailkd;?>">
                                </div>
                                <div class="form-group">
                                    <label>Date Mail</label>
                                    <div class="input-group">
                                <input name="date_mail" id="tanggal" value="<?php echo isset($value)?$this->tanggal->formatDateForm($value->tanggal):date('Y-m-d')?>"  class="form-control date-picker" type="text">
                                <span class="input-group-addon">
                                <i class="ace-icon fa fa-calendar"></i>
                                </span>
                            </div>
                                </div>
                                
                                
                                <div class="form-group">
                                <label for="exampleSelectBorder">Nama PIC</code></label>
                                <select name="kd_pic" class="form-control">
                                <option value="0">Silahkan Pilih</option>
                                        <?php foreach ($pic as $p) {
                                            echo "<option value='$p->kd_pic'>$p->nama_pic</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleSelectBorder">Logistik</code></label>
                                <select name="kd_logistik" class="form-control">
                                <option value="0">Silahkan Pilih</option>
                                        <?php foreach ($logistik as $log) {
                                            echo "<option value='$log->kd_logistik'>$log->nama_logistik</option>";
                                        } ?>
                                    </select>
                                
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Airway Bill</label>
                                    <input type="text" name='airwaybill' class="form-control" id="exampleInputEmail1" placeholder="Airway Bill">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Shipper Name</label>
                                    <input type="text" name='shipperName' class="form-control" id="exampleInputEmail1" placeholder="Shipper Name">
                                </div>

                                <div class="form-group">
                                <label for="exampleSelectBorder">Nama Kota/City</code></label>
                                <select name="kd_kota" class="form-control">
                                <option value="0">Silahkan Pilih</option>
                                        <?php foreach ($kota as $log) {
                                            echo "<option value='$log->kd_kota'>$log->nama_kota</option>";
                                        } ?>
                                    </select>
                                
                                </div>
                                <div class="form-group">
                                <label for="exampleSelectBorder">Recipient Name</code></label>
                                <select name="recipientName" class="form-control">
                                <option value="0">Silahkan Pilih</option>
                                <?php foreach ($penerima as $pe) {
                                            echo "<option value='$pe->nama_penerima'>$pe->nama_penerima</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Aditional Info</label>
                                    <input type="text" name='additional_Info' class="form-control" id="exampleInputEmail1" placeholder="Additional Info">
                                </div>

                                <div class="form-group">
                                <label for="exampleSelectBorder">Nama Departemen</code></label>
                                <select name="kd_departemen" class="form-control">
                                <option value="0">Silahkan Pilih</option>
                                        <?php foreach ($departemen as $dep) {
                                            echo "<option value='$dep->kd_departemen'>$dep->nama_departemen</option>";
                                        } ?>
                                    </select>
                                
                                </div>
                                <div class="form-group">
                                <label for="exampleSelectBorder">Level Dokumen</code></label>
                                <select name="kd_leveldoc" class="form-control">
                                <option value="0">Silahkan Pilih</option>
                                        <?php foreach ($leveldoc as $ld) {
                                            echo "<option value='$ld->kd_leveldoc'>$ld->nama_leveldoc</option>";
                                        } ?>
                                    </select>
                                
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('master/departemen','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
                <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker();
                        });
                    </script>