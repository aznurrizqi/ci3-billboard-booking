<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_model');
        $this->load->model('Kode_model');
        $this->load->model('Reklame_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $detail = $this->Detail_model->get_all();

        $data = array(
            'detail_data' => $detail
        );

        //$this->load->view('detail/detail_list', $data);
        $this->template->display('Detail/detail_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detail_model->get_by_id($id);
        if ($row) {
            $data = array(
		'iddetail' => $row->iddetail,
		'kodepemesanan' => $row->kodepemesanan,
		'reklame' => $row->nmjenis." | ".$row->nmarea." | ".$row->nmukuran." | ".$row->hrg,
        'jangkawaktu' => $row->jangkawaktu,
        'hrgdetail' => $row->hrgdetail,
		'tglpasang' => $row->tglpasang,
		'tgllepas' => $row->tgllepas,
	    );
            //$this->load->view('detail/detail_read', $data);
            $this->template->display('Detail/detail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemesanan/create'));
        }
    }

    public function create() 
    {        
        //$options=array(1,3,6);
        $kode1=$this->Kode_model->getkodepemesanan();
        $kode2=$this->Kode_model->getkodedetail();
        $kode=$kode1.$kode2;
        $detail = $this->Detail_model->get_all();
        //$code = $this->generatecode->code();
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail/create_action'),
	    'iddetail' => set_value('iddetail'),
	    'kodepemesanan' => $kode,
	    //'reklame' => set_value('reklame'),
	    'reklame' => $this->Detail_model->dd_reklame(),
        'reklame_selected' => $this->input->post('jenis') ? $this->input->post('jenis') : '',
        'jangkawaktu' => set_value('jangkawaktu'),
        'hrgdetail' => set_value('hrgdetail'),
        //'jangkawaktu' => $options,
        //'jangkawaktu_selected' => $this->input->post('jangkawaktu') ? $this->input->post('jangkawaktu') : '',
        'tglpasang' => set_value('tglpasang'),
	    'tgllepas' => set_value('tgllepas'),
	);
        //$this->load->view('detail/detail_form', $data);
        $this->template->display('Detail/detail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $idreklame = $this->input->post('reklame',TRUE);
            $hargaR = $this->Detail_model->hargaR($idreklame);

            $stt = "Disewa";
            $jangkawaktu = $this->input->post('jangkawaktu');
            $tglpasang = $this->input->post('tglpasang');
            $tgllepas='';
            $enddate='';
            $hrgdetail='';
            $harga='';

            if ($jangkawaktu==1){
                $enddate = date('Y-m-d', strtotime("+1 months", strtotime($tglpasang)));
                $harga=$hargaR*1*30;
            }else if ($jangkawaktu==3){
                $enddate = date('Y-m-d', strtotime("+3 months", strtotime($tglpasang)));
                $harga=$hargaR*3*30;
            }else if ($jangkawaktu==6){
                $enddate = date('Y-m-d', strtotime("+6 months", strtotime($tglpasang)));
                $harga=$hargaR*6*30;
            }
            $tgllepas=$enddate;
            $hrgdetail=$harga;


            $data = array(
		'kodepemesanan' => $this->input->post('kodepemesanan',TRUE),
		'reklame' => $this->input->post('reklame',TRUE),
		'jangkawaktu' => $this->input->post('jangkawaktu',TRUE),
        'hrgdetail' => $hrgdetail,
		'tglpasang' => $this->input->post('tglpasang',TRUE),
		'tgllepas' => $tgllepas
	    );
            $data2 = array(
        'status' => $stt,
        );

            $this->Detail_model->insert($data);
            $this->Reklame_model->update($this->input->post('reklame', TRUE), $data2);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Pemesanan/create'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_model->get_by_id($id);


        $stt = "Tersedia";
        $data2 = array(
            'status' => $stt,
        );
        //$this->Reklame_model->insert($data2);
        $this->Reklame_model->update($row->reklame, $data2);



        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail/update_action'),
		'iddetail' => set_value('iddetail', $row->iddetail),
		'kodepemesanan' => set_value('kodepemesanan', $row->kodepemesanan),
		//'reklame' => set_value('reklame', $row->reklame),
		'reklame' => $this->Detail_model->dd_reklame(),
        'reklame_selected' => $this->input->post('jenis') ? $this->input->post('jenis') : $row->reklame,
        'jangkawaktu' => set_value('jangkawaktu', $row->jangkawaktu),
        'hrgdetail' => set_value('hrgdetail', $row->hrgdetail),
		'tglpasang' => set_value('tglpasang', $row->tglpasang),
		'tgllepas' => set_value('tgllepas', $row->tgllepas),
	    );
            //$this->load->view('detail/detail_form', $data);
            $this->template->display('Detail/detail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemesanan/create'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('iddetail', TRUE));
        } else {
            //$ididid=$this->input->post('iddetail');
            $idreklame = $this->input->post('reklame',TRUE);
            $hargaR = $this->Detail_model->hargaR($idreklame);

            $stt = "Disewa";
            $jangkawaktu = $this->input->post('jangkawaktu');
            $tglpasang = $this->input->post('tglpasang');
            $tgllepas='';
            $enddate='';
            $hrgdetail='';
            $harga='';

            if ($jangkawaktu==1){
                $enddate = date('Y-m-d', strtotime("+1 months", strtotime($tglpasang)));
                $harga=$hargaR*1*30;
            }else if ($jangkawaktu==3){
                $enddate = date('Y-m-d', strtotime("+3 months", strtotime($tglpasang)));
                $harga=$hargaR*3*30;
            }else if ($jangkawaktu==6){
                $enddate = date('Y-m-d', strtotime("+6 months", strtotime($tglpasang)));
                $harga=$hargaR*6*30;
            }
            $tgllepas=$enddate;
            $hrgdetail=$harga;

            $data = array(

		'kodepemesanan' => $this->input->post('kodepemesanan',TRUE),
		'reklame' => $this->input->post('reklame',TRUE),
        'jangkawaktu' => $this->input->post('jangkawaktu',TRUE),
        'hrgdetail' => $hrgdetail,
		'tglpasang' => $this->input->post('tglpasang',TRUE),
		'tgllepas' => $this->input->post('tgllepas',TRUE),
	    );
            $data2 = array(
        'status' => $stt,
        );

            $this->Detail_model->update($this->input->post('iddetail', TRUE), $data);
            $this->Reklame_model->update($this->input->post('reklame', TRUE), $data2);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Pemesanan/update/'.$data->kodepemesanan));
        }
    }
    
    public function delete($id) 
    {
        
        if ($row) {
            $this->Detail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Pemesanan/create'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemesanan/create'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kodepemesanan', 'kodepemesanan', 'trim|required');
	$this->form_validation->set_rules('reklame', 'reklame', 'trim|required');
    $this->form_validation->set_rules('jangkawaktu', 'jangkawaktu', 'trim|required');
    $this->form_validation->set_rules('hrgdetail', 'hrgdetail', 'trim');
	$this->form_validation->set_rules('tglpasang', 'tglpasang', 'trim|required');
	$this->form_validation->set_rules('tgllepas', 'tgllepas', 'trim');

	$this->form_validation->set_rules('iddetail', 'iddetail', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "detail.xls";
        $judul = "detail";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kodepemesanan");
	xlsWriteLabel($tablehead, $kolomhead++, "reklame");
    xlsWriteLabel($tablehead, $kolomhead++, "jangkawaktu");
    xlsWriteLabel($tablehead, $kolomhead++, "hrgdetail");
	xlsWriteLabel($tablehead, $kolomhead++, "Tglpasang");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgllepas");

	foreach ($this->Detail_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kodepemesanan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->reklame);
        xlsWriteLabel($tablebody, $kolombody++, $data->jangkawaktu);
        xlsWriteLabel($tablebody, $kolombody++, $data->hrgdetail);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tglpasang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgllepas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=detail.doc");

        $data = array(
            'detail_data' => $this->Detail_model->get_all(),
            'start' => 0
        );
        
        //$this->load->view('detail/detail_doc',$data);
        $this->template->display('Detail/detail_doc', $data);
    }

}

/* End of file Detail.php */
/* Location: ./application/controllers/Detail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-16 11:13:33 */
/* http://harviacode.com */