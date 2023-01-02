                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        MAILINGROOM <small>Edit Data Kota</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/kota/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $record['kd_kota']?>">
                                <div class="form-group">
                                    <label>Nama Kota</label>
                                    <input class="form-control" name="nama_kota" value="<?php echo $record['nama_kota']?>">
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('master/kota','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->