<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class Hilos extends CI_Controller{
 public function _construct(){
 	parent::_construct();
 	//cargo el modelo de artículos
 	$this->load->model('hilos_model');
 }
 public function index()
 {
 	$datos = array('titulo_web' => 'ForoEsi','hilos' => $this->hilos_model->get_titulos(),
 		'categorias' => $this->categoria_model->get_categoria());
 	$this->load->view('hilos_view',$datos);

 }
 public function categorias($id,$cat){
 	$datos = array('titulo_web' => $cat ,'hilos' => $this->hilos_model->get_hilosCat($id));
 	$this->load->view('categoria_view',$datos);
 } 
 public function hilo($id,$tit){
 	//Cambiar por modelo de hilos vista de dani
 	$datos = array('titulo_web' => $tit ,'hilos' => $this->hilos_model->get_hilosCat($id));
 	$this->load->view('hilos_view',$datos);
 }
 public function buscar(){
 	if($this->input->post('submit')){

 	$param = $this->input->post('parametro');
 	$datos = array('titulo_web' => 'Busqueda de '.$param ,'hilos' => $this->hilos_model->get_busqueda($param),
 		'categorias' => $this->categoria_model->get_categoria());
 	$this->load->view('hilos_view',$datos);
 	}
 }
 public function nuevo(){
 	$cat = $this->categoria_model->get_categoria();
 	$categ =  array();
 	foreach ($cat as $key) {
 		array_push($categ, $key->nombre);
 	}
 	$datos = array('titulo_web' => 'Nuevo articulo',
 		'categorias' => $categ);
 	$this->load->view('nuevohilo_view',$datos);
 }
 public function nausu($id){
 	
 	$d = $this->Usu_model->nom_usuario($id);
 	echo $d->usuario;
 	//$datos = array('usuario' => $this->Usu_model->nom_usuario($id));

 	//$this->load->view('nausuario_view',$datos);
 }
}
?>