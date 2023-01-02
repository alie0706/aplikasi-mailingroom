                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        MAILINGROOM <small>Edit Data Departemen</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/departemen/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $record['kd_departemen']?>">
                                <div class="form-group">
                                    <label>Nama Departemen</label>
                                    <input class="form-control" name="nama_departemen" value="<?php echo $record['nama_departemen']?>">
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('master/departemen','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->