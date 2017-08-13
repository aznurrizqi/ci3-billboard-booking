<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reklame extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();
        $this->load->model('Reklame_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $reklame = $this->Reklame_model->get_all();

        $data = array(
            'reklame_data' => $reklame
        );

        //$this->load->view('reklame/reklame_list', $data);
        $this->template->display('Reklame/reklame_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Reklame_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idreklame' => $row->idreklame,
		'jenis' => $row->nmjenis,
		'area' => $row->nmarea,
		'ukuran' => $row->nmukuran,
		'hrg' => $row->hrg,
		'status' => $row->status,
	    );
            //$this->load->view('reklame/reklame_read', $data);
            $this->template->display('Reklame/reklame_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Reklame'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('reklame/create_action'),
	    'idreklame' => set_value('idreklame'),
	    //'jenis' => set_value('jenis'),
	    //'area' => set_value('area'),
	    //'ukuran' => set_value('ukuran'),
            'jenis' => $this->Reklame_model->dd_jenis(),
            'jenis_selected' => $this->input->post('nmjenis') ? $this->input->post('nmjenis') : '',
            'area' => $this->Reklame_model->dd_area(),
            'area_selected' => $this->input->post('nmarea') ? $this->input->post('nmarea') : '',
            'ukuran' => $this->Reklame_model->dd_ukuran(),
            'ukuran_selected' => $this->input->post('nmukuran') ? $this->input->post('nmukuran') : '',
	    'hrg' => set_value('hrg'),
	    'status' => set_value('status'),
	);
        //$this->load->view('reklame/reklame_form', $data);
        $this->template->display('Reklame/reklame_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

        $idjenis = $this->input->post('jenis', TRUE);
        $idarea = $this->input->post('area', TRUE);
        $idukuran = $this->input->post('ukuran', TRUE);
        $hargaJ = $this->Reklame_model->hargaJ($idjenis);
        $hargaA = $this->Reklame_model->hargaA($idarea);
        $hargaU = $this->Reklame_model->hargaU($idukuran);
        $harga = $hargaJ + $hargaA + $hargaU;
        $stt = "Tersedia";

            $data = array(
		'jenis' => $this->input->post('jenis',TRUE),
		'area' => $this->input->post('area',TRUE),
		'ukuran' => $this->input->post('ukuran',TRUE),
		'hrg' => $harga,
		'status' => $stt,
	    );

            $this->Reklame_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Reklame'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Reklame_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('reklame/update_action'),
		'idreklame' => set_value('idreklame', $row->idreklame),
		//'jenis' => set_value('jenis', $row->jenis),
		//'area' => set_value('area', $row->area),
		//'ukuran' => set_value('ukuran', $row->ukuran),
        'jenis' => $this->Reklame_model->dd_jenis(),
            'jenis_selected' => $this->input->post('nmjenis') ? $this->input->post('nmjenis') : $row->jenis,
		'area' => $this->Reklame_model->dd_area(),
            'area_selected' => $this->input->post('nmarea') ? $this->input->post('nmarea') : $row->area, // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
        'ukuran' => $this->Reklame_model->dd_ukuran(),
            'ukuran_selected' => $this->input->post('nmukuran') ? $this->input->post('nmukuran') : $row->ukuran,
		'status' => set_value('status', $row->status),
        'hrg' => set_value('hrg', $row->hrg)
	    );
            //$this->load->view('reklame/reklame_form', $data);
            $this->template->display('Reklame/reklame_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Reklame'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idreklame', TRUE));
        } else {

        $idjenis = $this->input->post('jenis', TRUE);
        $idarea = $this->input->post('area', TRUE);
        $idukuran = $this->input->post('ukuran', TRUE);
        $hargaJ = $this->Reklame_model->hargaJ($idjenis);
        $hargaA = $this->Reklame_model->hargaA($idarea);
        $hargaU = $this->Reklame_model->hargaU($idukuran);
        $harga = $hargaJ + $hargaA + $hargaU;
        $stt = "Tersedia";

            $data = array(
		'jenis' => $this->input->post('jenis',TRUE),
		'area' => $this->input->post('area',TRUE),
		'ukuran' => $this->input->post('ukuran',TRUE),
		'hrg' => $harga,
		'status' => $stt,
	    );

            $this->Reklame_model->update($this->input->post('idreklame', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Reklame'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Reklame_model->get_by_id($id);

        if ($row) {
            $this->Reklame_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Reklame'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Reklame'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('area', 'area', 'trim|required');
	$this->form_validation->set_rules('ukuran', 'ukuran', 'trim|required');
	$this->form_validation->set_rules('hrg', 'hrg', 'trim');
	$this->form_validation->set_rules('status', 'status', 'trim');

	$this->form_validation->set_rules('idreklame', 'idreklame', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "reklame.xls";
        $judul = "reklame";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Area");
	xlsWriteLabel($tablehead, $kolomhead++, "Ukuran");
	xlsWriteLabel($tablehead, $kolomhead++, "Hrg");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Reklame_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->area);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ukuran);
	    xlsWriteNumber($tablebody, $kolombody++, $data->hrg);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=reklame.doc");

        $data = array(
            'reklame_data' => $this->Reklame_model->get_all(),
            'start' => 0
        );
        
        //$this->load->view('reklame/reklame_doc',$data);
        $this->template->display('Reklame/reklame_doc', $data);
    }

}

/* End of file Reklame.php */
/* Location: ./application/controllers/Reklame.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-16 08:47:14 */
/* http://harviacode.com */