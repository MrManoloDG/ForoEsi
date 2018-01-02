<?php
class respuestas_model extends CI_Model{
 public function _construct(){
 parent::_construct();
 }
 //Metodo que mostrará todos los articulos
 public function get_respuestas($parametro){
 $consulta = $this->db->query('Select * from respuesta where hilo = '$parametro' order by id ASC');
 return $consulta->result();
 }
 //Metodo que inserta un articulo en la tabla
 public function add_respuestas(){ 
 $this->db->query('Insert into respuestas
values(null,"'.$this->input->post('hilo').'","'.$this->input->post('usuario
').'","'.$this->input->post('texto').'",null)');
 }

}