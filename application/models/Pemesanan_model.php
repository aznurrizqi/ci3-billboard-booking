<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan_model extends CI_Model
{

    public $table = 'pemesanan';
    public $id = 'idpemesanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('pemesan', 'pemesanan.pemesan = pemesan.idpemesan');     
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($kode)
    {
        $this->db->join('pemesan', 'pemesanan.pemesan = pemesan.idpemesan');     
        $this->db->order_by($this->id, $this->order);

        $this->db->where('kodepemesanan', $kode);

        return $this->db->get($this->table)->row();
    }
    
/**    function get_by_idid($id)
    {
        $this->db->join('pemesan', 'pemesanan.pemesan = pemesan.idpemesan');     
        $this->db->order_by($this->id, $this->order);

        $this->db->where($this->id, $id);

        return $this->db->get($this->table)->row();
    }
*/     // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idpemesanan', $q);
    $this->db->or_like('kodepemesanan', $q);
	$this->db->or_like('tglpemesanan', $q);
	$this->db->or_like('pemesan', $q);
	$this->db->or_like('totalbayar', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idpemesanan', $q);
    $this->db->or_like('kodepemesanan', $q);
	$this->db->or_like('tglpemesanan', $q);
	$this->db->or_like('pemesan', $q);
	$this->db->or_like('totalbayar', $q);
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
    function delete($kode)
    {
        $this->db->where('kodepemesanan', $kode);
        $this->db->delete($this->table);
    }

    function dd_pemesan(){
        // ambil data dari db
        $this->db->order_by('nmpemesan', 'asc');
        $result = $this->db->get('pemesan');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->idpemesan] = $row->nmpemesan;
            }
        }
        return $dd;
    }

}

/* End of file Pemesanan_model.php */
/* Location: ./application/models/Pemesanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-16 08:47:14 */
/* http://harviacode.com */