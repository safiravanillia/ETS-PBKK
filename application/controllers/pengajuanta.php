<?php 
 
class Pengajuanta extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
        $this->load->model('m_mahasiswa');
  		$data['mahasiswa'] = $this->m_mahasiswa->tampil()->row();
		$this->load->view('v_pengajuanTA',$data);
    }
    
    function tambah(){
        $pid = $this->input->post('p_id');
        $abstraksi = $this->input->post('t_abstraksi');
        
		$config['upload_path']          = './file/';
        $config['allowed_types']        = 'pdf';
        $this->load->library('upload', $config);

            if (!$this->upload->do_upload('t_file')) {
                $error = $this->upload->display_errors();
                echo "gagal";
            } else  {
                $data = array(
                    'p_id' => $pid,
                    't_abstrak' => $abstraksi,
                    't_file' => $this->upload->data('file_name'),
                    't_status' => "Tunggu"
                );
                    $this->load->model('m_ta');
                    $this->m_ta->input_data($data,'ta');
                    redirect('pengajuanta/index');
            }
    }
}