<?php
class categoria_model extends CI_Model{
 public function _construct(){
 parent::_construct();
 }
 //sacar todas las categoria
 public function get_categoria(){
 $consulta = $this->db->query('Select * from categoria');
 return $consulta->result();
 }
 //añadir una categoria
 public function add_categoria(){ 
 $this->db->query('Insert into categoria
 values(null,"'.$this->input->post('nombre').'")');
 }
 //sacar el id mediante el nombre de la categoria
 public function get_categoria_id($parametro){
 $consulta = $this->db->query('Select id from categoria where nombre = '.$parametro);
 return $consulta->result();
 }
}