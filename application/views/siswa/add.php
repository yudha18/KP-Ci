<link rel="stylesheet" type="text/css" href="datetime/bootstrap-datetimepicker.min.css">
<!-- <link rel="stylesheet" type="text/css" href="assets/datetime/bootstrap-datetimepicker.min.js"> -->
    <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Text Fields
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>
                <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                    <i class="fa fa-wrench"></i>
                </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#">
                    <i class="fa fa-refresh"></i>
                </a>
                <a class="btn btn-xs btn-link panel-expand" href="#">
                    <i class="fa fa-resize-full"></i>
                </a>
                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">

            <?php
            echo form_open_multipart('siswa/add', 'role="form" class="form-horizontal"');
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NIM
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nim" placeholder="MASUKAN NIM" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    PASSWORD
                </label>
                <div class="col-sm-9">
                    <input type="text" name="password" placeholder="MASUKAN PASSWORD" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA LENGKAP
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nama" placeholder="MASUKAN NAMA LENGKAP" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    TEMPAT, TGL LAHIR
                </label>
                <div class="col-sm-5">
                    <input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" id="form-field-1" class="form-control">
                </div>
                    <div class="col-sm-4">
                    <input type="date" name="tanggal_lahir" placeholder="TANGGAL LAHIR" id="form-field-1" class="form-control">
                </div>
     
             
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    ALAMAT
                </label>
                <div class="col-sm-9">
                    <input type="text" name="Alamat" placeholder="MASUKAN ALAMAT" id="form-field-1" class="form-control">
                </div>
           </div>
                <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    GENDER
                </label>
                <div class="col-sm-2">
                    <?php
                    echo form_dropdown('gender', array('P' => 'LAKI LAKI', 'W' => 'PEREMPUAN'), null, "class='form-control'");
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    AGAMA
                </label>
                <div class="col-sm-2">
                    <?php
                    echo cmb_dinamis('agama', 'tbl_agama', 'nama_agama', 'kd_agama');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Foto
                </label>
                <div class="col-sm-2">
                    <input type="file" name="userfile">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    PILIH kelas
                </label>
                <div class="col-sm-6">
                   <?php echo cmb_dinamis('kelas', 'tbl_kelas', 'nama_kelas', 'id_kelas')?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('siswa', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>