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
            echo form_open('jurusan/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('kd_jurusan', $jurusan['kd_jurusan']);
            ?>
            <div class="form-group">
                    <input type="hidden" value="<?php echo $jurusan['kd_jurusan'];?>" name="kd_jurusan_temp" placeholder="MASUKAN KODE" id="form-field-1" class="form-control">
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    KODE JURUSAN
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $jurusan['kd_jurusan'];?>" name="kd_jurusan" placeholder="MASUKAN KODE JURUSAN" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    JURUSAN
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $jurusan['nama_jurusan'];?>" name="nama_jurusan" placeholder="MASUKAN NAMA JURUSAN" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('jurusan', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>