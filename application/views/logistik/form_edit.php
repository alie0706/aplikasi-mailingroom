                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        MAILINGROOM <small>Edit Data Logistik</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/logistik/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $record['kd_logistik']?>">
                                <div class="form-group">
                                    <label>Nama Logistik</label>
                                    <input class="form-control" name="nama_logistik" value="<?php echo $record['nama_logistik']?>">
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('master/logistik','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->