<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();
        $this->load->model('Pemesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pemesan = $this->Pemesan_model->get_all();

        $data = array(
            'pemesan_data' => $pemesan
        );

        //$this->load->view('pemesan/pemesan_list', $data);
        $this->template->display('Pemesan/pemesan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pemesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idpemesan' => $row->idpemesan,
		'nmpemesan' => $row->nmpemesan,
		'telpon' => $row->telpon,
		'alamat' => $row->alamat,
		'email' => $row->email,
	    );
            //$this->load->view('pemesan/pemesan_read', $data);
            $this->template->display('Pemesan/pemesan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pemesan/create_action'),
	    'idpemesan' => set_value('idpemesan'),
	    'nmpemesan' => set_value('nmpemesan'),
	    'telpon' => set_value('telpon'),
	    'alamat' => set_value('alamat'),
	    'email' => set_value('email'),
	);
        //$this->load->view('pemesan/pemesan_form', $data);
        $this->template->display('Pemesan/pemesan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nmpemesan' => $this->input->post('nmpemesan',TRUE),
		'telpon' => $this->input->post('telpon',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'email' => $this->input->post('email',TRUE),
	    );

            $this->Pemesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Pemesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pemesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pemesan/update_action'),
		'idpemesan' => set_value('idpemesan', $row->idpemesan),
		'nmpemesan' => set_value('nmpemesan', $row->nmpemesan),
		'telpon' => set_value('telpon', $row->telpon),
		'alamat' => set_value('alamat', $row->alamat),
		'email' => set_value('email', $row->email),
	    );
            //$this->load->view('pemesan/pemesan_form', $data);
            $this->template->display('pemesan/pemesan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idpemesan', TRUE));
        } else {
            $data = array(
		'nmpemesan' => $this->input->post('nmpemesan',TRUE),
		'telpon' => $this->input->post('telpon',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'email' => $this->input->post('email',TRUE),
	    );

            $this->Pemesan_model->update($this->input->post('idpemesan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Pemesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pemesan_model->get_by_id($id);

        if ($row) {
            $this->Pemesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Pemesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nmpemesan', 'nmpemesan', 'trim|required');
	$this->form_validation->set_rules('telpon', 'telpon', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');

	$this->form_validation->set_rules('idpemesan', 'idpemesan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pemesan.xls";
        $judul = "pemesan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nmpemesan");
	xlsWriteLabel($tablehead, $kolomhead++, "Telpon");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");

	foreach ($this->Pemesan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nmpemesan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telpon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pemesan.doc");

        $data = array(
            'pemesan_data' => $this->Pemesan_model->get_all(),
            'start' => 0
        );
        
        //$this->load->view('pemesan/pemesan_doc',$data);
        $this->template->display('Pemesan/pemesan_doc', $data);
    }

}

/* End of file Pemesan.php */
/* Location: ./application/controllers/Pemesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-16 08:47:14 */
/* http://harviacode.com */