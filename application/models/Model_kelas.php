<?php

class Model_kelas extends CI_Model {

    public $table ="tbl_kelas";
    
    function save() {
        $data = array(
            'kd_jurusan'    => $this->input->post('jurusan', TRUE),
            'kelas'    => $this->input->post('kelas', TRUE),
            'nama_kelas'  => $this->input->post('nama_kelas', TRUE)
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'kd_jurusan'    => $this->input->post('jurusan', TRUE),
            'kelas'    => $this->input->post('kelas', TRUE),
            'nama_kelas'  => $this->input->post('nama_kelas', TRUE)
        );
        $id_kelas   = $this->input->post('id_kelas');
        $this->db->where('id_kelas',$id_kelas);
        $this->db->update($this->table,$data);
    }
    


}