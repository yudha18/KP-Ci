<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <table class="table table-bordered">
        <tr><td width="200">TAHUN AKADEMIK</td><td> : <?php echo get_tahun_akademik_aktif('tahun_akademik')?></td></tr>
        <br>
         <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    PILIH kelas
                </label>
                <div class="col-sm-6">
                   <?php echo cmb_dinamis('kelas', 'tbl_kelas', 'nama_kelas', 'id_kelas')?>
                </div>
            </div>
    </table>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>


<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Daftar Siswa
            <div class="panel-tools">

            </div>
        </div>
        <div class="panel-body">
                <table class="table table-bordered">
                    <tr><th>NIM</th><th>NAMA</th><th>TAGIHAN</th></tr>
                    <?php
                    foreach ($siswa->result() as $row){
                        echo "<tr>
                            <td width='100'>$row->nim</td>
                            <td>$row->nama</td>
                            <td width='100'>".anchor('pembayaran/tagihan/'.$row->nim,'Lihat pembayaran ','class="btn btn-success btn-sm"')."</td></tr>";
                    }
                    ?>
                </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
