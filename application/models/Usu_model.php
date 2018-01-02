<?php
class Usu_model extends CI_Model{


 public function _construct(){
 parent::_construct();
 }

 
 //Comprueba si el usuario existe o no
 public function verificar_usuario($user){
 $ssql = "select * from usuario where usuario='".$user."'";
 $consulta = mysql_query($ssql);
 if(mysql_numrows($consulta) == 0){ //el usuario no existe
 return false;
 }else{ //el usuario existe
 return true;
 }
 }


 //añade un usuario
 public function registrar_usuario(){
  $this->db->insert('usuario', array(
  //el true es para que limpie este campo de inyecciones xss
  'usuario'=>$this->input->post('usuario',TRUE),
  'password'=>$this->input->post('password',TRUE),
  'correo'=>$this->input->post('correo',TRUE),
  'estado'=>'0'
  ));
 }


 //verificar sesion
 public function verificar_sesion(){
  $consulta = $this->db->get_where('usuario',array(
  //el true es para que limpie este campo de inyecciones xss
  'usuario'=>$this->input->post('usuario',TRUE),
  'password'=>$this->input->post('password',TRUE)
 ));
 } 
 

 //cambiar contraseña
 public function cambiar_pass(){
  $oldPass = $this->input->post('password', TRUE);
 	$newPass = $this->input->post('nueva_password', TRUE);
 	$usuario = $this->input->post('usuario', TRUE);

  $this->db->select('password');
  $this->db->from('usuario');
  $this->db->where('usuario',$usuario);
  $passwordReal = $this->db->get();

 	$data = array(
 		'usuario' => $usuario,
 		'password' => $newPass
 		);

  if($passwordReal==$oldPass)
  {
 	  $this->bd->where('usuario',$usuario);
 	  $this->bd->update('usuario',$data);
    return true;
  }
  else{return false;}
 }

 //cambiar correo
 //devuelve -1 si el correo ya está siendo utilizado por otro usuario
 //devuelve 1 si el correo 
 public function cambiar_correo($usuario,$newCorreo){
  $data = array('correo' => $newCorreo);
  $this->db->where('id', $usuario);
  $this->db->update('usuario', $data);
  $error = $this->db->_error_message();
  if(isset($error)) throw new Exception("Correo ya en uso", 1);
  
 }


//Cambia el estado
 public function cambiar_estado($usuario,$nuevoEstado){
  $data = array('estado' => $nuevoEstado);
  $this->db->where('id',$usuario);
  $this->db->update('usuario',$data);
 }


//Devuelve el numero de usuarios registrados
 public function num_usuarios_registrados(){
  $num=0;
  $query = $this->db->query("select * from usuario");

  $num = $query->num_rows();
  return $num;
 }
 

//Devuelve el numero de usuarios conectados
 public function num_usuarios_conectados(){
  $query = $this->db->query("select * from usuario where conectado=1");
  $num = $query->num_rows();
  return $num;
 }


//Quitar un numero determinado de reportes (administrador)
 public function quitar_reportes($num, $usuario){
  $reportesActuales = $this->db->query("select nreportes from usuario where usuario = '".$user."'");
  if(($reportesActuales-$num)<0)
  {
    $data = array('nreportes' => 0);
    $this->db->where('usuario',$usuario);
    $this->db->update('usuario',$data);
  }
  else
  {
    $data = array('nreportes' => $reportesActuales - $num);
    $this->db->where('usuario',$usuario);
    $this->db->update('usuario',$data);
  }
 }

 public function nom_usuario($id){
    $consulta = $this->db->query('Select usuario,avatar from usuario WHERE id = '.$id.';');
    $datos = $consulta->result();
    $categ =  array();
    foreach ($datos as $key) {
    array_push($categ, $key->usuario);
    array_push($categ, $key->avatar);
    }
    return $categ;
 }

 public function editarAvatar($id,$imagen){

    $data = array('avatar' => $imagen);
    $this->db->where('id',$id);
    $this->db->update('usuario',$data);
 }
}



//