<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();
        $this->load->model('Jenis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $jenis = $this->Jenis_model->get_all();

        $data = array(
            'jenis_data' => $jenis
        );

        //$this->load->view('jenis/jenis_list', $data);
        $this->template->display('Jenis/jenis_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idjenis' => $row->idjenis,
		'nmjenis' => $row->nmjenis,
		'hrgjenis' => $row->hrgjenis,
	    );
            //$this->load->view('jenis/jenis_read', $data);
            $this->template->display('Jenis/jenis_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis/create_action'),
	    'idjenis' => set_value('idjenis'),
	    'nmjenis' => set_value('nmjenis'),
	    'hrgjenis' => set_value('hrgjenis'),
	);
        //$this->load->view('jenis/jenis_form', $data);
        $this->template->display('Jenis/jenis_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nmjenis' => $this->input->post('nmjenis',TRUE),
		'hrgjenis' => $this->input->post('hrgjenis',TRUE),
	    );

            $this->Jenis_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis/update_action'),
		'idjenis' => set_value('idjenis', $row->idjenis),
		'nmjenis' => set_value('nmjenis', $row->nmjenis),
		'hrgjenis' => set_value('hrgjenis', $row->hrgjenis),
	    );
            //$this->load->view('jenis/jenis_form', $data);
            $this->template->display('Jenis/jenis_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idjenis', TRUE));
        } else {
            $data = array(
		'nmjenis' => $this->input->post('nmjenis',TRUE),
		'hrgjenis' => $this->input->post('hrgjenis',TRUE),
	    );

            $this->Jenis_model->update($this->input->post('idjenis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_model->get_by_id($id);

        if ($row) {
            $this->Jenis_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nmjenis', 'nmjenis', 'trim|required');
	$this->form_validation->set_rules('hrgjenis', 'hrgjenis', 'trim|required');

	$this->form_validation->set_rules('idjenis', 'idjenis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jenis.xls";
        $judul = "jenis";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nmjenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Hrgjenis");

	foreach ($this->Jenis_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nmjenis);
	    xlsWriteNumber($tablebody, $kolombody++, $data->hrgjenis);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jenis.doc");

        $data = array(
            'jenis_data' => $this->Jenis_model->get_all(),
            'start' => 0
        );
        
        //$this->load->view('jenis/jenis_doc',$data);
        $this->template->display('Jenis/jenis_doc', $data);
    }

}

/* End of file Jenis.php */
/* Location: ./application/controllers/Jenis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-16 22:30:41 */
/* http://harviacode.com */