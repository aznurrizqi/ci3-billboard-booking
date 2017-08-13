<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();
        $this->load->model('Detail_model');
        $this->load->model('Pemesanan_model');
        $this->load->model('Kode_model');
        $this->load->library('form_validation');
    }

    public function ubah_status() 
    {
        $stt = "Tersedia";
        $data2 = array(
            'status' => $stt,
        );
        $this->Reklame_model->update($this->input->post('reklame', TRUE), $data2);
    }

    public function index()
    {
        //$detail = $this->Detail_model->get_all();
        if ('tgllepas'==date('Y-m-d')){
            $this->ubah_status();
        }
        
        $pemesanan = $this->Pemesanan_model->get_all();

        $data = array(
            'pemesanan_data' => $pemesanan
        );

        $this->template->display('Pemesanan/pemesanan_list', $data);
        //$this->load->view('pemesanan/pemesanan_list', $data);
    }

    public function read($kode) 
    {
        $row = $this->Pemesanan_model->get_by_id($kode);
        $detail = $this->Detail_model->get_kode($kode);
        //$totalbayar = $this->Detail_model->jumlah($kode);
        if ($row) {
            $data = array(
		'idpemesanan' => $row->idpemesanan,
        'kodepemesanan' => $row->kodepemesanan,
		'tglpemesanan' => $row->tglpemesanan,
		'pemesan' => $row->nmpemesan,
		'totalbayar' => $row->totalbayar,
	    'detail_data' => $detail
        );
            //$this->load->view('pemesanan/pemesanan_read', $data);
            $this->template->display('Pemesanan/pemesanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemesanan'));
        }
    }


    public function create() 
    {

        //$detail = $this->Detail_model->get_all();
        $kode=$this->Kode_model->getkodepemesanan();
        $detail = $this->Detail_model->get_kode($kode);
        $tglpesan=date('Y-m-d');
        //$code = $this->generatecode->code();
        //$code="P"&"-"&LEFT("00000",5-(LEN(TEXT([1,2,3,4,5],"0"))))&TEXT([1,2,3,4,5],"0");
        $data = array(
            'button' => 'Create',
            'action' => site_url('pemesanan/create_action'),
	    'idpemesanan' => set_value('idpemesanan'),
        'kodepemesanan' => $kode,
	    'tglpemesanan' => $tglpesan,
	    //'pemesan' => set_value('pemesan'),
        'pemesan' => $this->Pemesanan_model->dd_pemesan(),
        'pemesan_selected' => $this->input->post('nmpemesan') ? $this->input->post('nmpemesan') : '',
	    'totalbayar' => set_value('totalbayar'),
        'detail_data' => $detail
	   );
        //$this->load->view('pemesanan/pemesanan_form', $data);
        $this->template->display('Pemesanan/pemesanan_form', $data);
    }
    
    public function create_action() 
    {
        //$kode = $this->input->post('kodepemesanan',TRUE);
        //$total = $this->Detail_model->bayar($kode);
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'kodepemesanan' => $this->input->post('kodepemesanan',TRUE),
		'tglpemesanan' => $this->input->post('tglpemesanan',TRUE),
		'pemesan' => $this->input->post('pemesan',TRUE),
		'totalbayar' => $this->input->post('totalbayar',TRUE),
	    );

            $this->Pemesanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Pemesanan'));
        }
    }
    
    public function update($kode) 
    {
        //$kode = set_value('kodepemesanan');
        $detail = $this->Detail_model->get_kode($kode);
        $row = $this->Pemesanan_model->get_by_id($kode);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pemesanan/update_action'),
        'idpemesanan' => set_value('idpemesanan', $row->idpemesanan),
		'kodepemesanan' => set_value('kodepemesanan', $row->kodepemesanan),
		'tglpemesanan' => set_value('tglpemesanan', $row->tglpemesanan),
		//'pemesan' => set_value('pemesan', $row->pemesan),
        'pemesan' => $this->Pemesanan_model->dd_pemesan(),
        'pemesan_selected' => $this->input->post('nmpemesan') ? $this->input->post('nmpemesan') : $row->pemesan,
		'totalbayar' => set_value('totalbayar', $row->totalbayar),
        'detail_data' => $detail
	    );
            //$this->load->view('pemesanan/pemesanan_form', $data);
            $this->template->display('Pemesanan/pemesanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemesanan'));
        }
    }
    
    public function update_action() 
    {
        //$kode = $this->input->post('kodepemesanan',TRUE);
        //$total = $this->Detail_model->bayar($kode);
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idpemesanan', TRUE));
        } else {
            $data = array(
        'kodepemesanan' => $this->input->post('kodepemesanan',TRUE),
		'tglpemesanan' => $this->input->post('tglpemesanan',TRUE),
		'pemesan' => $this->input->post('pemesan',TRUE),
		'totalbayar' => $this->input->post('totalbayar',TRUE)
	    );

            $this->Pemesanan_model->update($this->input->post('idpemesanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Pemesanan'));
        }
    }
    
    public function delete($kode) 
    {
        $row = $this->Pemesanan_model->get_by_id($kode);

        if ($row) {
            $this->Pemesanan_model->delete($kode);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Pemesanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemesanan'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('kodepemesanan', 'kodepemesanan', 'trim|required');
	$this->form_validation->set_rules('tglpemesanan', 'tglpemesanan', 'trim|required');
	$this->form_validation->set_rules('pemesan', 'pemesan', 'trim|required');
	$this->form_validation->set_rules('totalbayar', 'totalbayar', 'trim');

	$this->form_validation->set_rules('idpemesanan', 'idpemesanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pemesanan.xls";
        $judul = "pemesanan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    xlsWriteLabel($tablehead, $kolomhead++, "Kode Pemesanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tglpemesanan");
	xlsWriteLabel($tablehead, $kolomhead++, "pemesan");
	xlsWriteLabel($tablehead, $kolomhead++, "Totalbayar");

	foreach ($this->Pemesanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tglpemesanan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pemesan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->totalbayar);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pemesanan.doc");

        $data = array(
            'pemesanan_data' => $this->Pemesanan_model->get_all(),
            'start' => 0
        );
        
        //$this->load->view('pemesanan/pemesanan_doc',$data);
        $this->template->display('Pemesanan/pemesanan_doc', $data);
    }

}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/Pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-16 08:47:14 */
/* http://harviacode.com */