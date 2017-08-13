<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ukuran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();
        $this->load->model('Ukuran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $ukuran = $this->Ukuran_model->get_all();

        $data = array(
            'ukuran_data' => $ukuran
        );

        //$this->load->view('ukuran/ukuran_list', $data);
        $this->template->display('Ukuran/ukuran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Ukuran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idukuran' => $row->idukuran,
		'nmukuran' => $row->nmukuran,
		'hrgukuran' => $row->hrgukuran,
		'detailukuran' => $row->detailukuran,
	    );
            //$this->load->view('ukuran/ukuran_read', $data);
            $this->template->display('Ukuran/ukuran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Ukuran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ukuran/create_action'),
	    'idukuran' => set_value('idukuran'),
	    'nmukuran' => set_value('nmukuran'),
	    'hrgukuran' => set_value('hrgukuran'),
	    'detailukuran' => set_value('detailukuran'),
	);
        //$this->load->view('ukuran/ukuran_form', $data);
        $this->template->display('Ukuran/ukuran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nmukuran' => $this->input->post('nmukuran',TRUE),
		'hrgukuran' => $this->input->post('hrgukuran',TRUE),
		'detailukuran' => $this->input->post('detailukuran',TRUE),
	    );

            $this->Ukuran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Ukuran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ukuran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ukuran/update_action'),
		'idukuran' => set_value('idukuran', $row->idukuran),
		'nmukuran' => set_value('nmukuran', $row->nmukuran),
		'hrgukuran' => set_value('hrgukuran', $row->hrgukuran),
		'detailukuran' => set_value('detailukuran', $row->detailukuran),
	    );
            //$this->load->view('ukuran/ukuran_form', $data);
            $this->template->display('Ukuran/ukuran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Ukuran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idukuran', TRUE));
        } else {
            $data = array(
		'nmukuran' => $this->input->post('nmukuran',TRUE),
		'hrgukuran' => $this->input->post('hrgukuran',TRUE),
		'detailukuran' => $this->input->post('detailukuran',TRUE),
	    );

            $this->Ukuran_model->update($this->input->post('idukuran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Ukuran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ukuran_model->get_by_id($id);

        if ($row) {
            $this->Ukuran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Ukuran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Ukuran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nmukuran', 'nmukuran', 'trim|required');
	$this->form_validation->set_rules('hrgukuran', 'hrgukuran', 'trim|required');
	$this->form_validation->set_rules('detailukuran', 'detailukuran', 'trim|required');

	$this->form_validation->set_rules('idukuran', 'idukuran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ukuran.xls";
        $judul = "ukuran";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nmukuran");
	xlsWriteLabel($tablehead, $kolomhead++, "Hrgukuran");
	xlsWriteLabel($tablehead, $kolomhead++, "Detailukuran");

	foreach ($this->Ukuran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nmukuran);
	    xlsWriteNumber($tablebody, $kolombody++, $data->hrgukuran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->detailukuran);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ukuran.doc");

        $data = array(
            'ukuran_data' => $this->Ukuran_model->get_all(),
            'start' => 0
        );
        
        //$this->load->view('ukuran/ukuran_doc',$data);
        $this->template->display('Ukuran/ukuran_doc', $data);
    }

}

/* End of file Ukuran.php */
/* Location: ./application/controllers/Ukuran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-16 08:47:14 */
/* http://harviacode.com */