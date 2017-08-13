<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reklame_model extends CI_Model
{

    public $table = 'reklame';
    public $id = 'idreklame';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('ukuran', 'reklame.ukuran = ukuran.idukuran');     
        $this->db->join('area', 'reklame.area = area.idarea');     
        $this->db->join('jenis', 'reklame.jenis = jenis.idjenis');     
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->join('ukuran', 'reklame.ukuran = ukuran.idukuran');     
        $this->db->join('area', 'reklame.area = area.idarea');  
        $this->db->join('jenis', 'reklame.jenis = jenis.idjenis');     
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idreklame', $q);
	$this->db->or_like('jenis', $q);
	$this->db->or_like('area', $q);
	$this->db->or_like('ukuran', $q);
	$this->db->or_like('hrg', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idreklame', $q);
	$this->db->or_like('jenis', $q);
	$this->db->or_like('area', $q);
	$this->db->or_like('ukuran', $q);
	$this->db->or_like('hrg', $q);
	$this->db->or_like('status', $q);
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


    public function hargaA($id){
        $this->db->select('hrgarea')->from('area')->where('idarea',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->hrgarea;
        }
        return false;    
    }

    public function hargaU($id){
        $this->db->select('hrgukuran')->from('ukuran')->where('idukuran',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->hrgukuran;
        }
        return false;    
    }

    public function hargaJ($id){
        $this->db->select('hrgjenis')->from('jenis')->where('idjenis',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->hrgjenis;
        }
        return false;    
    }

    function dd_area(){
        $this->db->order_by('nmarea', 'asc');
        $result = $this->db->get('area');
        $dd[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $dd[$row->idarea] = $row->nmarea;
            }
        }
        return $dd;
    }

    function dd_jenis(){
        $this->db->order_by('nmjenis', 'asc');
        $result = $this->db->get('jenis');
        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $dd[$row->idjenis] = $row->nmjenis;
            }
        }
        return $dd;
    }

    function dd_ukuran(){
        // ambil data dari db
        $this->db->order_by('nmukuran', 'asc');
        $result = $this->db->get('ukuran');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->idukuran] = $row->nmukuran." (".$row->detailukuran.")";
            }
        }
        return $dd;
    }
}

/* End of file Reklame_model.php */
/* Location: ./application/models/Reklame_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-16 08:47:14 */
/* http://harviacode.com */