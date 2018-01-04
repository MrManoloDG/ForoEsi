<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class Usu extends CI_Controller{
 public function _construct(){
 	parent::_construct();
 }
 public function index()
 {
    $this->load->model('Usu_model');
 	  $num=$this->Usu_model->num_usuarios_registrados();
    $data = array('registrados'=>$num);
    if($this->session->userdata('username')=='admin')
      $this->load->view('admin_view',$data);
    else
    if($this->session->userdata('username')==NULL)
    $this->load->view('usuSin_view',$data);
    else
    $this->load->view('usu_view',$data);  
 }

 public function logear(){
    $this->load->view('login_view');
 }

 public function registro() {
    $this->load->view('registrar_view');
 }

 public function cpass(){
    $this->load->view('cpass_view');
 }

 public function cemail(){
    $this->load->view('cmail_view');
 }

 public function admin(){
    $this->load->view('admin_view');
 }

 public function banear(){
    $this->load->view('banear_view');
 }


 public function validar(){

 	$this->load->model('Usu_model');
 	$usu = $this->input->post('username');
 	$pass = $this->input->post('password');
  $query = "select * from usuario where usuario = '".$usu."' and password = '".$pass."' and reportado = 1";
  
  $consulta = mysql_query($query);
  if(mysql_num_rows($consulta) == 0){
 	if($this->Usu_model->verificar_usuario($usu,$pass))
 	{
 		$d = $this->Usu_model->datos_usuarionom($usu);
 		$newdata = array(
        'username'  => $usu,
        'id'=> $d->id,
        'avatar' => $d->avatar,
        'estado' => $d->estado,
        'correo' => $d->correo,
        'fechaCreacion' => $d->fechaCreacion
    	);
    	$this->session->set_userdata($newdata);
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
	else 
	{
		$this->load->view('loginFail_view');
	}
 }
 else{
  $this->load->view('baneado_view');
 }

}


 public function verify_registro() {
 //si se envia un submit_reg por el metodo post, entonces...
 if($this->input->post('submit_reg')){
 //validamos usando la libreria form_validation
 //asignamos un rol (set_rules, uso(name,title,required[|...])
 //trim = limpia los espacios en blanco
 //callback_ = para llamar un método
 //$this->form_validation->set_rules('nombre','Nombre', 'required');
 $this->form_validation->set_rules('correo','Correo',
'required|valid_email|trim');
 $this->form_validation->set_rules('usuario','Usuario',
'required|trim|callback_verificar_usuario');
 $this->form_validation->set_rules('pass','Contraseña',
'required|trim');
 $this->form_validation->set_rules('pass2','Confirmación de
contraseña','required|trim|matches[pass]');
 //mensaje de error de validacion
 $this->form_validation->set_message('required','El campo %s es
obligatorio.');
 $this->form_validation->set_message('valid_email','El campo %s es
invalido.');
 $this->form_validation->set_message('verify_user','El %s ya
existe.');
 $this->form_validation->set_message('matches','El campo %s no es 
  igual que el campo %s.');
 if ($this->form_validation->run() ==FALSE){
 $this->registro();
 }else{
 $this->Usu_model->registrar_usuario();
 $datos=array('mensaje'=>'El usuario se ha registrado
correctamente.');
 $this->load->view('registrar_view',$datos);
 }
 }
 }

  public function verificar_usuario($usuario){
  $this->load->model('Usu_model');
  $variable = $this->Usu_model->verify_user($usuario);
  if($variable == true){ //existe el usuario
  return false; //no pasaria la validación porque el usuario ya existe
  }else{
  return true;
  }
}

 public function verify_user($usuario){
 $variable = $this->Usu_model->verify_user($usuario);
 if($variable == true){ //existe el usuario
 return false; //no pasaria la validación porque el usuario ya existe
 }else{
 return true;
 }
 }


 public function num_usuarios_registrados(){
  $num = $this->Usu_model->num_usuarios_registrados();
  return $num;
 }

public function logout() {
  $this->session->sess_destroy();
  redirect(base_url());
}
 
public function cambiar_pass(){
  $this->load->model('Usu_model');
  $variable = $this->Usu_model->cambiar_pass();
  if($variable){
    $datos = array('mensaje' => 'CONTRASEÑA CAMBIADA CON ÉXITO');
    $this->load->view('cpass_view',$datos);
  }else{
    $datos = array('mensaje' => 'ERROR, EL USUARIO NO EXISTE Y/O LA CONTRASEÑA NO ES VÁLIDA');
    $this->load->view('cpass_view',$datos);
  }
}





public function banearUsu(){
  $this->load->model('Usu_model');
  $variable = $this->Usu_model->banearUsu();
  if($variable){
    $datos = array('mensaje' => 'OPERACIÓN REALIZADA CON ÉXITO');
    $this->load->view('banear_view');
  }else{
    $datos = array('mensaje' => 'ERROR, EL USUARIO INTRODUCIDO NO EXISTE');
    $this->load->view('banear_view');
  }
}

public function desbanearUsu(){
  $this->load->model('Usu_model');
  $variable = $this->Usu_model->desbanearUsu();
  if($variable)
    $this->load->view('banearOK_view');
  else
    $this->load->view('banearFAIL_view');
}

public function editarPerfil(){
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
    $this->Usu_model->cambiar_estado($this->session->userdata('id'),$estado);
    $this->session->unset_userdata('estado');
    $this->session->set_userdata('estado',$estado);
    echo "Estado cambiado correctamente<br>";
  }
  if ($correo != '') {
      $this->Usu_model->cambiar_correo($this->session->userdata('id'),$correo);
      $this->session->unset_userdata('correo');
    $this->session->set_userdata('correo',$correo);
  }
  if ( ! $this->upload->do_upload('userfile'))
    {
    $this->load->view('editperfil_view');
    }
    else
    {
    $data = array('upload_data' => $this->upload->data());
    $this->Usu_model->editarAvatar($this->session->userdata('id'),$data['upload_data']['file_name']);
    $this->session->unset_userdata('avatar');
    $this->session->set_userdata('avatar',$data['upload_data']['file_name']);
    echo "Avatar cambiado satisfactoriamente<br>";
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