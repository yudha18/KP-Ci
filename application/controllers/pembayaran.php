<?php
class pembayaran extends CI_Controller{
    
    
    // menampilkan list siswa
    function index(){
        $siswa          =   "SELECT nim,nama FROM tbl_siswa";
                            
        $data['siswa']  =   $this->db->query($siswa);
        $this->template->load('template','pembayaran/list_pembayaran',$data);
    }

   function tagihan(){
       // // blok query info siswa
       $nim = $this->uri->segment(3);
       $sqlSiswa = "SELECT ts.nama as nama_siswa,ts.nim,tj.nama_jurusan,tr.nama_kelas,tr.kelas
                    FROM tbl_history_kelas as hk,tbl_siswa as ts,tbl_kelas as tr,tbl_jurusan as tj
                    WHERE ts.nim=hk.nim and tr.id_kelas=ts.id_kelas and tr.kd_jurusan=tj.kd_jurusan 
                    and hk.nim='$nim' and hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik');
       $siswa = $this->db->query($sqlSiswa)->row_array();

       // print_r($this->nama());
       // print_r($this->bayar());
       // print_r($this->biaya());
   //     print_r($this->data('TI102132','1'));
   // die();
        $this->load->library('CFPDF');
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
      $pdf->Cell(190,5,'TAGIHAN PEMBAYARAN',1,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'SMK N 1 PLERET BANTUL',1,1,'C');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(190,5,'Jl. Imogiri Timur Km 09 Jati, Wonokromo, Pleret, Bantul, Yogyakarta  Kode Pos 55791 Telp. (0274) 4399846, 4399847',1,1,'C'); 


         
        $pdf->Cell(190,5,'',0,1);
        
        $pdf->SetFont('Arial','B',9);
        // BLOCK INFO SISWA
        $pdf->Cell(30,5,'NIS',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nim'],0,0,'L');
        $pdf->Cell(30,5,'KELAS',0,0,'L');
        $pdf->Cell(40,5,': '.$siswa['nama_kelas'],0,1,'L');
        
        $pdf->Cell(30,5,'NAMA',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nama_siswa'],0,0,'L');
        $pdf->Cell(30,5,'TAHUN AJARAN',0,0,'L');
        $pdf->Cell(40,5,': '.  get_tahun_akademik_aktif('tahun_akademik'),0,1,'L');
        
        $pdf->Cell(30,5,'JURUSAN',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nama_jurusan'],0,0,'L');
        $pdf->Cell(30,5,'SEMESTER',0,0,'L');
        $pdf->Cell(40,5,': '.  get_tahun_akademik_aktif('semester_aktif'),0,1,'L');
        // END BLOCK INFO SISWA
        
        
        // BLOCK NILAI SISWA ------------------------
        $pdf->Cell(1,10,'',0,1);
        $pdf->Cell(10,5,'NO',1,0,'L');
        $pdf->Cell(18,5,'NIS',1,0,'L');
        $pdf->Cell(40,5,'NAMA',1,0,'L');
        $pdf->Cell(30,5,'Tagihan',1,0,'L');
        $pdf->Cell(30,5,'Biaya',1,0,'L');
        $pdf->Cell(30,5,'Pembayaran',1,0,'L');
        $pdf->Cell(30,5,'Kekurangan',1,1,'L');
        $pdf->SetFont('Arial','',9);
        // $sqlMapel = "SELECT tj.id_jadwal,tm.nama_mapel 
        //             FROM tbl_jadwal as tj,tbl_mapel as tm
        //             WHERE tj.kd_mapel=tm.kd_mapel and tj.id_kelas=1";
        // $mapel = $this->db->query($sqlMapel)->result();
        $no=1;
       // foreach ($mapel as $m){
            // $pdf->Cell(50,5,$m->nama_mapel,1,0,'L');
       //      $pdf->Cell(10,5,75,1,0,'L');
            $data = $this->data($siswa['nim'], get_tahun_akademik_aktif('id_tahun_akademik'));
            $pdf->Cell(10,5,$no,1,0,'L');
            $pdf->Cell(18,5,$data[0]['nim'],1,0,'L');
            $pdf->Cell(40,5,$data[0]['nama'],1,0,'L');
            $pdf->Cell(30,5,$data[0]['tagihan'],1,0,'L');
            $pdf->Cell(30,5,$data[0]['biaya'],1,0,'L');
            $pdf->Cell(30,5,$data[0]['pembayaran'],1,0,'L');
            $pdf->Cell(30,5,$data[0]['kekurangan'],1,0,'L');
            // $pdf->Cell(15,5,  $nilai,1,0,'L');
       //      $nilaiuts = chek_nilaiuts($siswa['nim'], $m->id_jadwal);
       //      $pdf->Cell(12,5,  $nilaiuts,1,0,'L');
       //      $nilaiuas = chek_nilaiuas($siswa['nim'], $m->id_jadwal);
       //      $pdf->Cell(12,5,  $nilaiuas,1,0,'L');
       //      $nilai_rata_rata = (chek_nilai($siswa['nim'], $m->id_jadwal) + chek_nilaiuts($siswa['nim'], $m->id_jadwal) + chek_nilaiuas($siswa['nim'], $m->id_jadwal)) / 3;
       //      // $pdf->Cell(30,5,  ceil($this->nilai($m->id_jadwal,$siswa['nim'])),1,0,'L');
       //      $pdf->Cell(30,5,  $nilai_rata_rata,1,0,'L');
       //      $pdf->Cell(23,5,  $this->ketercapaian_kopetensi($nilai),1,0,'L');
       //      $pdf->Cell(37,5,'Deskripsi Kemampuan',1,1,'L');
            $no++;
        // }
        // END BLOCK NILAI SISWA --------------------------------
        
        // $pdf->Cell(190,5,'',0,1);
        // $pdf->Cell(8, 5, 'No', 1,0);
        // $pdf->Cell(50, 5, 'Pengembangan Diri', 1,0);
        // $pdf->Cell(10, 5, 'Nilai', 1,0);
        // $pdf->Cell(66, 5, 'Kepribadian', 1,0);
        // $pdf->Cell(20, 5, 'Niilai', 1,0);
        // $pdf->Cell(36, 5, 'Catatan Khusus', 1,1);
        
        $pdf->Cell(190,5,'',0,1);
        $pdf->Cell(45, 15, 'Mengetahui,', 0,0,'C');
        $pdf->Cell(87, 5, '', 0,0,'c');
        $pdf->Cell(25, 5, 'Diberikan Di', 0,0,'c');
        $pdf->Cell(33, 5, ': ', 0,1,'L');
        $pdf->Cell(45, 15, 'Orang Tua Wali', 0,0,'C');
        $pdf->Cell(87, 5, '', 0,0,'c');
        $pdf->Cell(25, 5, 'Pada', 0,0,'c');
        $pdf->Cell(33, 5, ': ', 0,1,'L');
        $pdf->Cell(132, 5, '', 0,0,'c');
        $pdf->Cell(25, 5, 'Keuangan', 0,0,'c');
        $pdf->Cell(33, 5, ': ', 0,1,'L');

        // $pdf->Cell(12,5,  $this->nama(),0,0,'c');
        $pdf->Output();
    }
    
    // function rata_rata_nilai($id_jadwal){
    //     $sql   =  "SELECT sum(nilai)/count(nim) as nilai_rata_rata FROM tbl_nilai WHERE id_jadwal=$id_jadwal";
    //     $nilai = $this->db->query($sql)->row_array();
    //     return $nilai['nilai_rata_rata'];
    // }
    function nama($nim){
        $sql = "SELECT * FROM `tbl_siswa` WHERE nim='". $nim ."'";
        $nama = $this->db->query($sql)->result();
        return $nama;    
    }

    function bayar($nim){
        $sql = "SELECT * FROM `tbl_pembayaran` WHERE nim='". $nim ."'";
        $pembayaran = $this->db->query($sql)->result();
        return $pembayaran;    
    }
    function biaya($id_tahun){
        $sql = "SELECT * FROM `tbl_biaya_sekolah`
        LEFT JOIN `tbl_jenis_pembayaran` ON (`tbl_jenis_pembayaran`.id_jenis_pembayaran = `tbl_biaya_sekolah`.id_jenis_pembayaran)
        WHERE id_tahun_akademik='". $id_tahun ."'";
        $biaya = $this->db->query($sql)->result();
        return $biaya;    
    }

    function count_pembayaran($pembayaran, $key){
        $total = 0;

        for ($i=0; $i < count($pembayaran); $i++) { 
            if ($pembayaran[$i]->id_jenis_pembayaran == $key) {
                $total = $total + $pembayaran[$i]->jumlah;
            }
        }

        return $total;
    }

    function data($nim, $id_tahun_akademik){
        $nama = $this->nama($nim);
        $bayar = $this->bayar($nim);
        $biaya = $this->biaya($id_tahun_akademik);

        $data=[];
        for ($i=0; $i < count($biaya); $i++) { 
            $pembayaran = $this->count_pembayaran($bayar, $biaya[$i]->id_jenis_pembayaran);

            $data[$i] = [
                'nim' => $nama[0]->nim,
                'nama' => $nama[0]->nama,
                'tagihan' => $biaya[$i]->nama_jenis_pembayaran,
                'biaya' => $biaya[$i]->jumlah_biaya,
                'pembayaran' => $pembayaran,
                'kekurangan' => ($biaya[$i]->jumlah_biaya-$pembayaran)
            ];
        }
        return $data;
    }

    // function ketercapaian_kopetensi($nilai){
    //     if($nilai>90){
    //         return 'Sangat baik';
    //     }elseif($nilai>80 and $nilai<=90){
    //         return 'Baik';
    //     }elseif($nilai>75 and $nilai<=80){
    //         return 'Cukup';
    //     }else{
    //         return "Kurang";
    //     }
    // }
}