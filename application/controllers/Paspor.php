<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paspor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
    
    public function index()
    {

        $data = [
            'title'        => 'Paspor',
            'conten'       => 'paspor/index.php',
            'footer_js' => array('assets/js/paspor.js')
        ];
        
        $this->load->view('template/conten', $data);
    }

    function tablePaspor()
    {
        // $data['modul'] = $this->m_data->get_data('tbl_modul')->result();

        echo json_encode($this->load->view('paspor/paspor-table',false));
    }
}
