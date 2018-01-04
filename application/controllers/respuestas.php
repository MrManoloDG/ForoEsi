<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class Respuestas extends CI_Controller{
 public function _construct(){
 parent::_construct();
 //cargo el modelo de artículos
 $this->load->model('respuestas_model');
 }
 public function index()//$hilos
 {
 	$datos = array('titulo_web' => 'ForoEsi','hilos' => $this->hilos_model->get_titulos(),
 		'categorias' => $this->categoria_model->get_categoria());
 	$this->load->view('hilos_view',$datos);
 }

 public function vistaHilo($id){
 	$datos = array('titulo_web' => 'Respuestas',
	'respuestas' => $this->respuestas_model->get_respuestas($id));
 	//$hilos
 	$this->load->view('respuestas_view',$datos);
 }
 public function Guardar(){
 	if($this->input->post('submit')){
 	//reglas de validacion
 	$this->form_validation->set_rules('Comentario','Comentario del hilo' , 'required');
    //mensaje de error de validacion
 	$this->form_validation->set_message('required','%s es
	 obligatorio.');
 	if ($this->form_validation->run() ==FALSE){
	 $this->index();
	 }else{
	 $data = array('hilo' => $this->input->post('id') ,
	'texto' => $this->input->post('Comentario') ,
	'usuario' => $this->input->post('cuerpo')
	 );// usuario teine que ser el que esta registrado
 	$this->articulos_model->add_articulo();

 	$this->load->view('un_articulo_view',$data);
 	}
 	}
 	}

 }
?>