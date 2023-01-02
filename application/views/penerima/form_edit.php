                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        MAILINGROOM <small>Edit Data Karyawan</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/penerima/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $record['nik']?>">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input class="form-control" name="nik" placeholder="nik"value="<?php echo $record['nik']?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Karyawan</label>
                                    <input class="form-control" name="nama_penerima" placeholder="nama penerima"value="<?php echo $record['nama_penerima']?>">
                                </div>
                                <div class="form-group">
                                    <label>Email Karyawan</label>
                                    <input class="form-control" name="email_penerima" placeholder="nama penerima"value="<?php echo $record['email_penerima']?>">
                                </div>
                                <div class="form-group">
                                    <label>Departemen</label>
                                    <select name="kd_departemen" class="form-control">
                                        <?php foreach ($departemen as $k) {
                                            echo "<option value='$k->kd_departemen'";
                                            echo $record['kd_departemen']==$k->kd_departemen?'selected':'';
                                            echo">$k->nama_departemen</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Status</code></label>
                                            <div class="form-check">
                                                <?php
                                                    if($record['status']=='0'){?>
                                                            <input class="form-check-input" type="radio" name="status" value="0" checked><label class="form-check-label">Tidak Aktif</label>
                                                            <br><input class="form-check-input" type="radio" name="status" value="1"><label class="form-check-label">Aktif</label>
                                                    <?php
                                                    }
                                                    else{
                                                    ?>
                                                    <input class="form-check-input" type="radio" name="status" value="0"><label class="form-check-label">Tidak Aktif</label>
                                                    <br><input class="form-check-input" type="radio" name="status" value="1" checked><label class="form-check-label">Aktif</label>
                                                <?php
                                                    }   
                                                ?>     
                                                </div>   
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('master/penerima','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->