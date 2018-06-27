<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <table class="table table-bordered">
        <tr><td width="200">TAHUN AKADEMIK</td><td> : <?php echo get_tahun_akademik_aktif('tahun_akademik')?></td></tr>
        <tr><td>SEMESTER</td><td> :  <?php echo get_tahun_akademik_aktif('semester_aktif')?></td></tr>
        <tr><td>JURUSAN</td><td> : KELAS <?php echo $kelas['kelas'].' '.$kelas['nama_jurusan']?> ( <?php echo $kelas['nama_kelas']?> )</td></tr>
        <tr><td>MATA PELAJARAN</td><td><?php echo $kelas['nama_mapel']?></td></tr>
    </table>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>


<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> DAFTAR SISWA
            <div class="panel-tools">
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr><th>NIS</th><th>NAMA</th><th>ULANGAN</th><th>UTS</th><th>UAS</th></tr>
                <?php foreach ($siswa as $row){
                    
                    echo "<tr>  <td width='100'>$row->nim</td>
                                <td>".  strtoupper($row->nama)."</td>
                                <td width='60'><input type='int' onKeyup='updateNilai(\"$row->nim\")' id='ulangan".$row->nim."' value='".  chek_nilai($row->nim, $this->uri->segment(3))."' class='form-control'></td>
                                <td width='60'><input type='int' onKeyup='updateNilai(\"$row->nim\")' id='uts".$row->nim."' value='".  chek_nilaiuts($row->nim, $this->uri->segment(3))."' class='form-control'></td>
                                <td width='60'><input type='int' onKeyup='updateNilai(\"$row->nim\")' id='uas".$row->nim."' value='".  chek_nilaiuas($row->nim, $this->uri->segment(3))."' class='form-control'></td> 
                                </tr>";
                }
?>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>


<script type="text/javascript">

function updateNilai(nim){
    
    var ulangan = $("#ulangan"+nim).val();
    var uts = $("#uts"+nim).val();
    var uas = $("#uas"+nim).val();
    $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/nilai/update_nilai',
            data:'nim='+nim+'&id_jadwal='+<?php echo $this->uri->segment(3)?>+'&ulangan='+ulangan+'&uts='+uts+'&uas='+uas,
            
            success:function(html){
                //$("#dataSiswa").html(html);
                console.log('success');
            }
        })
}

</script>