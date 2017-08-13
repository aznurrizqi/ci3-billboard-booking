<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_model extends CI_Model
{

    public $table = 'detail';
    public $id = 'iddetail';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();

    }

    function get_kode($kode)
    {
        //$this->db->join('reklame', 'detail.reklame = reklame.idreklame');     
        $this->db->join('reklame', 'detail.reklame = reklame.idreklame');     
        $this->db->join('ukuran', 'reklame.ukuran = ukuran.idukuran');     
        $this->db->join('area', 'reklame.area = area.idarea');     
        $this->db->join('jenis', 'reklame.jenis = jenis.idjenis');     
        $this->db->order_by($this->id, $this->order);

        $this->db->like('kodepemesanan',$kode);

        return $this->db->get($this->table)->result();
    }

    // get all
    function get_all()
    {
        //$this->db->join('reklame', 'detail.reklame = reklame.idreklame');     
        $this->db->join('reklame', 'detail.reklame = reklame.idreklame');     
        $this->db->join('ukuran', 'reklame.ukuran = ukuran.idukuran');     
        $this->db->join('area', 'reklame.area = area.idarea');     
        $this->db->join('jenis', 'reklame.jenis = jenis.idjenis');     
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }


    // get data by id
    function get_by_id($id)
    {
        //$this->db->join('reklame', 'detail.reklame = reklame.idreklame');     
        $this->db->join('reklame', 'detail.reklame = reklame.idreklame');     
        $this->db->join('ukuran', 'reklame.ukuran = ukuran.idukuran');     
        $this->db->join('area', 'reklame.area = area.idarea');     
        $this->db->join('jenis', 'reklame.jenis = jenis.idjenis');     
        $this->db->order_by($this->id, $this->order);
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('iddetail', $q);
	$this->db->or_like('kodepemesanan', $q);
	$this->db->or_like('reklame', $q);
    $this->db->or_like('jangkawaktu', $q);
    $this->db->or_like('hrgdetail', $q);
	$this->db->or_like('tglpasang', $q);
	$this->db->or_like('tgllepas', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('iddetail', $q);
	$this->db->or_like('kodepemesanan', $q);
	$this->db->or_like('reklame', $q);
    $this->db->or_like('jangkawaktu', $q);
    $this->db->or_like('hrgdetail', $q);
	$this->db->or_like('tglpasang', $q);
	$this->db->or_like('tgllepas', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

/**    function jumlah($id)
    {
        $this->db->where($this->id, $id);
        $total=$this->db->select_sum('hrgdetail');
        return $total;
    }
*/
    function dd_reklame()
    {
        $this->db->join('ukuran', 'reklame.ukuran = ukuran.idukuran');     
        $this->db->join('area', 'reklame.area = area.idarea');     
        $this->db->join('jenis', 'reklame.jenis = jenis.idjenis');           
        //$this->db->join('reklame', 'detail.reklame = reklame.idreklame');     
        $this->db->order_by('jenis', 'asc');
        //$result = $this->db->get('reklame');
        //$result = $this->db->where('status'=="Tersedia");
        $where_array = array(
               'status'=>"Tersedia"
              );
        $result = $this->db->get_where('reklame',$where_array);

        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->idreklame] = $row->nmjenis." | ".$row->nmarea." | ".$row->nmukuran." | ".$row->hrg;
            }
        }
        return $dd;
    }

    public function hargaR($id){
        $this->db->select('hrg')->from('reklame')->where('idreklame',$id);

        $query = $this->db->get();

         if ($query->num_rows() > 0) {
             return $query->row()->hrg;
        }
        return false;    
    }

/**        public function bayar($kode)
    {
        $total = '';
        $where_array = array(
               'kodepemesanan'=>$kode
              );
        $result = $this->db->get_where('detail',$where_array);
        // $result =$this->db->like('kodepemesanan',$kode);



        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $total=$total+'hrgdetail';
                //$total+=$row['hrgdetail'];
            }
        }
        return $total;
    }
*/
}


/* End of file Detail_model.php */
/* Location: ./application/models/Detail_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-16 11:13:33 */
/* http://harviacode.com */