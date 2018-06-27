<?php

class Model_jurusan extends CI_Model {

    public $table ="tbl_jurusan";
    
    function save() {
        $data = array(
            'kd_jurusan'    => $this->input->post('kd_jurusan', TRUE),
            'nama_jurusan'  => $this->input->post('nama_jurusan', TRUE)
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        // print_r($this->input->post('kd_jurusan', TRUE));
        $data = array(
            'kd_jurusan'    => $this->input->post('kd_jurusan', TRUE),
            'nama_jurusan'  => $this->input->post('nama_jurusan', TRUE)
        );
        // $this->db->where('kd_jurusan',$data['kd_jurusan']);
        $this->db->where('kd_jurusan', $this->input->post('kd_jurusan_temp', TRUE));
        $success = $this->db->update($this->table, $data);
        // if ($success) {
        //     die();
        // }
    }
    
    

}