<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();
        $this->load->model('Area_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $area = $this->Area_model->get_all();

        $data = array(
            'area_data' => $area
        );

        //$this->load->view('area/area_list', $data);
        $this->template->display('Area/area_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Area_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idarea' => $row->idarea,
		'nmarea' => $row->nmarea,
		'hrgarea' => $row->hrgarea,
	    );
            //$this->load->view('area/area_read', $data);
            $this->template->display('Area/area_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Area'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('area/create_action'),
	    'idarea' => set_value('idarea'),
	    'nmarea' => set_value('nmarea'),
	    'hrgarea' => set_value('hrgarea'),
	);
        //$this->load->view('area/area_form', $data);
        $this->template->display('Area/area_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nmarea' => $this->input->post('nmarea',TRUE),
		'hrgarea' => $this->input->post('hrgarea',TRUE),
	    );

            $this->Area_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Area'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Area_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('area/update_action'),
		'idarea' => set_value('idarea', $row->idarea),
		'nmarea' => set_value('nmarea', $row->nmarea),
		'hrgarea' => set_value('hrgarea', $row->hrgarea),
	    );
            //$this->load->view('area/area_form', $data);
            $this->template->display('Area/area_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Area'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idarea', TRUE));
        } else {
            $data = array(
		'nmarea' => $this->input->post('nmarea',TRUE),
		'hrgarea' => $this->input->post('hrgarea',TRUE),
	    );

            $this->Area_model->update($this->input->post('idarea', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Area'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Area_model->get_by_id($id);

        if ($row) {
            $this->Area_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Area'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Area'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nmarea', 'nmarea', 'trim|required');
	$this->form_validation->set_rules('hrgarea', 'hrgarea', 'trim|required');

	$this->form_validation->set_rules('idarea', 'idarea', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "area.xls";
        $judul = "area";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nmarea");
	xlsWriteLabel($tablehead, $kolomhead++, "Hrgarea");

	foreach ($this->Area_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nmarea);
	    xlsWriteNumber($tablebody, $kolombody++, $data->hrgarea);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=area.doc");

        $data = array(
            'area_data' => $this->Area_model->get_all(),
            'start' => 0
        );
        
        //$this->load->view('area/area_doc',$data);
        $this->template->display('Area/area_doc', $data);
    }

}

/* End of file Area.php */
/* Location: ./application/controllers/Area.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-16 08:47:14 */
/* http://harviacode.com */