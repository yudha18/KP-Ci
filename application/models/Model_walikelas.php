<?php
class Model_walikelas extends CI_Model{
    
    
    
    function setup_walikelas($idTahunAkademik){
        
        $kelas = $this->db->get('tbl_kelas');
        foreach ($kelas->result() as $row){
            $walikelas = array(
                'id_guru'           =>  '2',
                'id_tahun_akademik' =>  $idTahunAkademik,
                'id_kelas'         =>  $row->id_kelas);
            $this->db->insert('tbl_walikelas',$walikelas);
        }
    }
    
}