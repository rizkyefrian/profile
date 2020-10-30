<?php 
 
class Modelapp extends CI_Model{
  
/**===========================================================*/
          /** Fungsi CREATE */
  
function input_data($data,$table){
		$this->db->insert($table,$data);
	}
/**===========================================================*/
  
/**===========================================================*/
          /** Fungsi READ */
  
//   function tampil_data(){
// 		return $this->db->get('user');
// 	}
    function tampil_data(){
            
        $this->db->select('user.*, gender.jenis'); /**untuk memilih tabel user dan kolom jenis pada tabel gender */
        $this->db->from('user'); /**untuk memilih tabel user untuk dihubungkan ke tabel gender */
        $this->db->join('gender', 'gender.id_gender = user.jenis_kelamin'); /**untuk menggabungkan 2 tabel tadi */
        $query = $this->db->get();
    return $query->result();
    }
 /**===========================================================*/
 
 /**===========================================================*/
          /** Fungsi UPDATE */
  
  function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
 
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
 /**===========================================================*/
 
 /**===========================================================*/
          /** Fungsi DELETE */
  
   function hapus_data($where,$table){
      $this->db->where($where);
      $this->db->delete($table);
    }
 /**===========================================================*/
  
}