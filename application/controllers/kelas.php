<?php

Class kelas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_kelas');
    }

    function data() {
        // nama tabel
        $table = 'v_master_kelas';
        // nama PK
        $primaryKey = 'id_kelas';
        // list field
        $columns = array(
            array('db' => 'id_kelas', 'dt' => 'id_kelas'),
            array('db' => 'nama_kelas', 'dt' => 'nama_kelas'),
            array('db' => 'kelas', 'dt' => 'kelas'),
            array('db' => 'nama_jurusan', 'dt' => 'nama_jurusan'),
            array(
                'db' => 'id_kelas',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('kelas/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('kelas/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

    function index() {
        $this->template->load('template', 'kelas/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_kelas->save();
            redirect('kelas');
        } else {
            $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah";
            $data['info']= $this->db->query($infoSekolah)->row_array();
            $this->template->load('template', 'kelas/add',$data);
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_kelas->update();
            redirect('kelas');
        }else{
            $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah";
            $data['info']= $this->db->query($infoSekolah)->row_array();
            $id_kelas      = $this->uri->segment(3);
            $data['kelas'] = $this->db->get_where('tbl_kelas',array('id_kelas'=>$id_kelas))->row_array();
            $this->template->load('template', 'kelas/edit',$data);
        }
    }
    
    function delete(){
        $id_kelas = $this->uri->segment(3);
        if(!empty($id_kelas)){
            // proses delete data
            $this->db->where('id_kelas',$id_kelas);
            $this->db->delete('tbl_kelas');
        }
        redirect('kelas');
    }
    
    function show_combobox_kelas_by_jurusan(){
        
        $jurusan = $_GET['jurusan'];
        echo "<select name='kelas' id='kelas2' class='form-control' onchange='loadSiswa()'>";
        $this->db->where('kd_jurusan',$jurusan);
        $kelas = $this->db->get('tbl_kelas');
        foreach ($kelas->result() as $row){
            echo "<option value='$row->id_kelas'>$row->nama_kelas</option>";
        }
        echo"</select>";
    }

}