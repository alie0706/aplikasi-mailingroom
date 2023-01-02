                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                           MAILINGROOM <small>Data Departemen</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('master/departemen/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Departemen</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_departemen ?></td>
                                                <td class="center">
                                                    <?php echo "<a href='departemen/edit/$r->kd_departemen'><i class='fa fa-edit'></i></a> |
                                                    <a href='departemen/delete/$r->kd_departemen' onClick=\"return confirm('Anda yakin akan menghapus data dari tabel ini?')\"><i class='fa fa-trash-o'></i></a>";?>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->


