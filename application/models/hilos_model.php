
<?php
class Hilos_model extends CI_Model{
 public function _construct(){
 	parent::_construct();
 }
 //Metodo que mostrará todos los articulos
 public function get_hilos(){
 	$consulta = $this->db->query('Select * from hilo;');
 	return $consulta->result();
 }
 //Metodo que devuelve los titulos y el usuario ordenados de manera descendiente por la fecha (Timeline)
 public function get_titulos(){
 	$consulta = $this->db->query('Select id,titulo,creador,fecha from hilo ORDER BY fecha DESC;');
 	return $consulta->result();
 }
 public function get_hilosUser($user){
 	$consulta = $this->db->query('Select id,titulo,creador,fecha from hilo WHERE usuario = '.$user.' ORDER BY fecha DESC;');
 	return $consulta->result();
 }
 //Metodo que devuelve hilos en funcion parametro de un titulo
public function get_busqueda($param){
	$consulta = $this->db->query('Select id,titulo,creador,fecha from hilo WHERE titulo like \'%'.$param.'%\' ORDER BY fecha DESC;');
 	return $consulta->result();
}
//Metodo que devuelve hilos en fucion de la categoria
public function get_hilosCat($cat){
	$consulta = $this->db->query('Select id,titulo,creador,fecha from hilo WHERE categoria = '.$cat.' ORDER BY fecha DESC;');
 	return $consulta->result();
}
 //Metodo que inserta un articulo en la tabla
 public function add_hilo(){
 	$this->db->query('Insert into hilo values(null,'.$this->input->post('creador').',\''.$this->input->post('titulo').'\',\''.$this->input->post('texto').'\',null,'.$this->input->post('categoria').')');
 }
} 
