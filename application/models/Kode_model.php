<?php 
class Kode_model extends CI_Model {     
   public function __construct() { 
     parent::__construct();     
   } 

   function getkodepemesanan() { 
        $query = $this->db->query("SELECT MAX(RIGHT(kodepemesanan,4)) AS idmax FROM pemesanan");
        $kd = ""; //kode awal
        if($query->num_rows()>0){ //jika data ada
            foreach($query->result() as $q){
                $tmp = ((int)$q->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%04s", $tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "0001";
        }
        $kar = "P"; //karakter depan kodenya
        return $kar.$kd;
   } 

   function getkodedetail() { 
        $query = $this->db->query("SELECT MAX(RIGHT(kodepemesanan,4)) AS idmax FROM detail");
        $kd = ""; //kode awal
        if($query->num_rows()>0){ //jika data ada
            foreach($query->result() as $q){
                $tmp = ((int)$q->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%04s", $tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "0001";
        }
        $kar = "D"; //karakter depan kodenya
        return $kar.$kd;
   } 
 }
