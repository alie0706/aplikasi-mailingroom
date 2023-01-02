                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                           MAILINGROOM <small>Data Transaksi IN</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('transaksi/transaksiin/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="example1">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Mail ID</th>
                                            <th>Date Mai</th>
                                            <th>PIC</th>
                                            <th>Logistik</th>
                                            <th>Airway Bill</th>
                                            <th>Shipper Name</th>
                                            <th>City</th>
                                            <th>Recipient Name</th>
                                            <th>Departement</th>
                                            <th>Aditional Info</th>
                                            <th>Received By</th>
                                            <th>Received Date</th>
                                            <th>Level Doc</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td align=left><?php echo $r->mail_id?></td>
                                                <td align=left><?php echo $r->date_mail?></td>
                                                <td align=left><?php echo $r->nama_pic?></td>
                                                <td align=left><?php echo $r->nama_logistik?></td>
                                                <td align=left><?php echo $r->airwaybill?></td>
                                                <td align=left><?php echo $r->shipperName?></td>
                                                <td align=left><?php echo $r->nama_kota?></td>
                                                <td align=left><?php echo $r->recipientName?></td>
                                                <td align=left><?php echo $r->nama_departemen?></td>
                                                <td align=left><?php echo $r->additional_Info?></td>
                                                <td align=left><?php echo $r->received_by?></td>
                                                <td align=left><?php echo $r->received_date?></td>
                                                <td align=left><?php echo $r->nama_leveldoc?></td>
                                                <?php
                                                if($r->status=='0'){
                                                    echo "<td>Tidak Sukses </td>";
                                                    }
                                                    else{                  
                                                    echo "<td> Sukses</td>";
                                                    }
                                                    ?>
                                                <td class="center">
                                                    <?php echo "<a href='transaksiin/edit/$r->transaksiin_id'><i class='fa fa-edit'></i></a> |
                                                    <a href='transaksiin/delete/$r->transaksiin_id' onClick=\"return confirm('Anda yakin akan menghapus data dari tabel ini?')\"><i class='fa fa-trash-o'></i></a>";?>
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


