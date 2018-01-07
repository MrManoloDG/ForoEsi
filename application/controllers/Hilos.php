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
 	$opciones = array();
    $desde = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
    $opciones['per_page'] = 15;
    $opciones['base_url'] = base_url().'index.php/hilos/index';
    $opciones['total_rows'] = $this->hilos_model->getNumHilos();
    $opciones['uri_segment'] = 3;
 
    $this->pagination->initialize($opciones);
 	$datos = array('titulo_web' => 'ForoEsi','hilos' => $this->hilos_model->get_titulos($opciones['per_page'],$desde),
 		'categorias' => $this->categoria_model->get_categoria(),'paginacion' => $this->pagination->create_links());
 	$this->load->view('hilos_view',$datos);

 }
 public function categorias($id,$cat){
 	$datos = array('titulo_web' => $cat ,'hilos' => $this->hilos_model->get_hilosCat($id),'categoria' => $this->categoria_model->get_categoria());
 	$this->load->view('categoria_view',$datos);
 } 
 
 public function buscar(){
 	if($this->input->post('submit')){

 	$param = $this->input->post('parametro');
 	$datos = array('titulo_web' => 'Busqueda de '.$param ,'hilos' => $this->hilos_model->get_busqueda($param),
 		'categorias' => $this->categoria_model->get_categoria());
 	$this->load->view('hilos_view',$datos);
 	}
 }

 public function hilosUsuario($id){
 	$datos = array('titulo_web' => 'Hilos del usuario' ,'hilos' => $this->hilos_model->get_hilosUser($id),
 		'categorias' => $this->categoria_model->get_categoria());
 	$this->load->view('hilos_view',$datos);
 }
 public function nuevo(){
 	$cat = $this->categoria_model->get_categoria();
 	$categ =  array();
 	foreach ($cat as $key) {
 		array_push($categ, $key->nombre);
 	}
 	$datos = array('titulo_web' => 'Nuevo articulo',
 		'categorias' => $categ,'categoria' => $this->categoria_model->get_categoria());
 	$this->load->view('nuevohilo_view',$datos);
 }
 public function nuevoHilo(){
 	if($this->input->post('submit')){
 		$this->form_validation->set_rules('titulo','Titulo','required|trim');
		$this->form_validation->set_rules('texto','Texto','required|trim');
		$this->form_validation->set_rules('categ','Categoria','required|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio.');
		if ($this->form_validation->run() == FALSE){
			$this->nuevo();
		}else{
			$idhilo = $this->hilos_model->add_hilo();
			$datos = array('titulo_web' => 'Respuestas','respuestas' => $this->respuestas_model->get_respuestas($idhilo),'categorias' => $this->categoria_model->get_categoria(),$this->hilos_model,'id' => $idhilo);
 			$this->load->view('respuestas_view',$datos);
		}
	}
 }
 
}
?>