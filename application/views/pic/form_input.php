                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MAILINGROOM <small>Tambah Data Pic</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/pic/post'); ?>
                                <div class="form-group">
                                    <label>Nama Pic</label>
                                    <input class="form-control" name="nama_pic" placeholder="nama pic">
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('master/pic','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->