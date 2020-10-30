<?php 
 
class Controllerapp extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('modelapp');
                $this->load->helper(array('url'));
	}
  
/**===========================================================*/
          /** Fungsi CREATE */
  
	function tambah(){
			$this->load->view('view_create');
		}
 
	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
			'nama' => $nama,
			'jenis_kelamin' => $jenis_kelamin,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->modelapp->input_data($data,'user');
		redirect('controllerapp/index');
	}
/**===========================================================*/
  
/**===========================================================*/
          /** Fungsi READ */
  
	  function index(){
			$data['user'] = $this->modelapp->tampil_data()->result();
			$this->load->view('view',$data);
		}
 /**===========================================================*/
 
 /**===========================================================*/
          /** Fungsi UPDATE */

 	function edit($id){
		$where = array('id' => $id);
		$data['user'] = $this->modelapp->edit_data($where,'user')->result();
		$this->load->view('view_edit',$data);
	}
  
	 function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
	 
		$data = array(
			'nama' => $nama,
			'jenis_kelamin' => $jenis_kelamin,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
		);
	 
		$where = array(
			'id' => $id
		);
	 
		$this->modelapp->update_data($where,$data,'user');
		redirect('controllerapp/index');
	}
 /**===========================================================*/
	
 /**===========================================================*/
          /** Fungsi DELETE */
  
  function hapus($id){
		$where = array('id' => $id);
		$this->modelapp->hapus_data($where,'user');
		redirect('controllerapp/index');
	}
 /**===========================================================*/
}