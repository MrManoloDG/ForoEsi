<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class Usu extends CI_Controller{
 public function _construct(){
 	parent::_construct();
 	//cargo el modelo de artículos
 	$this->load->model('hilos_model');
 }
 public function index()
 {
 	$this->load->view('login_view');

 }

 public function validar(){
	$usu       = $this->input->post('username');
	$pass      = $this->input->post('password');
	$newdata   = array(
	'username' => $usu,
	);
    $this->session->set_userdata($newdata);
    $this->load->view('log_view');

 }

 public function editarperfil(){

 	$this->load->view('editperfil_view');
 }

 public function editado(){
	$config['upload_path']   = './uploads/';
	$config['allowed_types'] = '*';
	$config['max_size']      = 10000000;
	$config['max_width']     = 1024;
	$config['max_height']    = 768;
	$this->upload->initialize($config);
	$estado = $this->input->post('estado');
	$correo = $this->input->post('correo');
	if ($estado != '') {
		$this->Usu_model->cambiar_estado(1,$estado);
	}
	if ($correo != '') {
		try {
			$this->Usu_model->cambiar_correo(1,$correo);
		} catch (Exception $e) {
			echo $e;
		}
	}
	if ( ! $this->upload->do_upload('userfile'))
    {
		$error = array('error' => $this->upload->display_errors());
		$this->load->view('editperfil_view', $error);
    }
    else
    {
		$data = array('upload_data' => $this->upload->data());
		$this->Usu_model->editarAvatar(1,$data['upload_data']['file_name']);
		$this->load->view('editperfil_view', $data);
	}
		
 }


 public function vistaPerfil($id)
 {
 	$datos = array('titulo_web' => 'ForoEsi','usuario' => $this->Usu_model->datos_usuario($id),
 		'nmensajes' => $this->respuestas_model->num_mensajes($id));
 	$this->load->view('perfil_view',$datos);
 }



 
}
?>