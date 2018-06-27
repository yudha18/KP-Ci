<?php

class Model_siswa extends CI_Model {

    public $table ="tbl_siswa";
    
    function save($foto) {
        $data = array(
            'nim'           => $this->input->post('nim', TRUE),
            'password'      => md5($this->input->post('password')),
            'kd_agama'      => $this->input->post('agama', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
            'gender'        => $this->input->post('gender', TRUE),
            'foto'          => $foto,
            'Alamat'        =>$this->input->post('Alamat',TRUE),
            'id_kelas'     => $this->input->post('kelas',TRUE)
        );
        $this->db->insert($this->table,$data);
        
        $tahun_akademik = $this->db->get_where('tbl_tahun_akademik',array('is_aktif'=>'y'))->row_array();
        
        $history =  array(
            'nim'                 =>  $this->input->post('nim', TRUE),
            'id_tahun_akademik'   =>  $tahun_akademik['id_tahun_akademik'],
            'id_kelas'           =>  $this->input->post('kelas', TRUE)
            );
        $this->db->insert('tbl_history_kelas',$history);
    }
    
    function update($foto) {
        if(empty($foto)){
            // update without foto
            $data = array(
            'password'      => md5($this->input->post('password')),
            'nama'          => $this->input->post('nama', TRUE),
            'kd_agama'      => $this->input->post('agama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
            'gender'        => $this->input->post('gender', TRUE),
            'Alamat'        =>$this->input->post('Alamat',TRUE),
        );
        }else{
            // update with foto
            $data = array(
            'password'      => md5($this->input->post('password')),
            'nama'          => $this->input->post('nama', TRUE),
            'kd_agama'      => $this->input->post('agama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
            'gender'        => $this->input->post('gender', TRUE),
            'foto'          => $foto,
            'Alamat'        =>$this->input->post('Alamat',TRUE),
            'id_kelas'     => $this->input->post('kelas',TRUE)
        );
        }
        $nim   = $this->input->post('nim');
        $this->db->where('nim',$nim);
        $this->db->update($this->table,$data);
    }

    function chekLogin($username,$password){
        $this->db->where('nim',$username);
        $this->db->where('password',  md5($password));
        $user = $this->db->get('tbl_siswa')->row_array();
        return $user;
    }
}