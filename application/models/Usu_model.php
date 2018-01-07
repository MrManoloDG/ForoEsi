<?php
class Usu_model extends CI_Model{


 public function _construct(){
 parent::_construct();
 }

 

 //añade un usuario
 public function registrar_usuario(){
  $this->db->insert('usuario', array(
  //el true es para que limpie este campo de inyecciones xss
  'usuario'=>$this->input->post('usuario',TRUE),
  'password'=>$this->input->post('pass',TRUE),
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
 	$usuario = $this->session->userdata('username');

  if($this->Usu_model->verificar_usuario($usuario,$oldPass))
  {
 	  $this->db->query("update usuario set password ='".$newPass."' where usuario = '".$usuario."'");
    return true;
  }
  else return false;
 }


 //cambiar correo
 //devuelve -1 si el correo ya está siendo utilizado por otro usuario
 //devuelve 1 si el correo 
 public function cambiar_correo($usuario,$newCorreo){
  $enuso = $this->db->query("select id from usuario where correo='".$newCorreo."'");
  $data = array('correo' => $newCorreo);
  $consulta = $enuso->row();
  if(isset($consulta)){
    if($enuso->row()->id != $usuario){
    }
  }else{
    $this->db->query("update usuario set correo ='".$newCorreo."' where id='".$usuario."'");
  }
  
  
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
    $consulta = $this->db->query('Select usuario,avatar,fechaCreacion from usuario WHERE id = '.$id.';');
    $datos = $consulta->result();
    $categ =  array();
    foreach ($datos as $key) {
    array_push($categ, $key->usuario);
    array_push($categ, $key->avatar);
    array_push($categ, $key->fechaCreacion);
    }
    return $categ;
 }


 public function verify_user($user){
 $ssql = "select * from usuario where usuario='".$user."'";
 $consulta = mysql_query($ssql);
 if(mysql_numrows($consulta) == 0){ //el usuario no existe
 return false;
 }else{ //el usuario existe
 return true;
 }
 }


  //Comprueba si el usuario existe o no
 public function verificar_usuario($user, $pass){
 $ssql = "select * from usuario where usuario='".$user."' and password='".$pass."'";
 $consulta = mysql_query($ssql);
 if(mysql_numrows($consulta) == 0){ //el usuario no existe
 return false;
 }else{ //el usuario existe
 return true;
 }
 }

 public function banearUsu(){
  $usuario = $this->input->post('baneado');
  $query = "select * from usuario where usuario = '".$usuario."'";
  $consulta = mysql_query($query);
  if(mysql_numrows($consulta)!=0){
    $this->db->query("update usuario set reportado=1 where usuario = '".$usuario."'");
    return true;
  }
  else
    return false;
}

public function desbanearUsu(){
  $usuario = $this->input->post('desbaneado');
  $query = "select * from usuario where usuario = '".$usuario."'";
  $consulta = mysql_query($query);
  if(mysql_numrows($consulta)!=0){
    $this->db->query("update usuario set reportado=0 where usuario = '".$usuario."'");
    return true;
  }
  else
    return false;
}

  public function datos_usuarionom($usuario){
  $data = $this->db->query("Select * from usuario WHERE usuario = '".$usuario."';");
  
  return $data->row();
 }
 public function datos_usuario($id){
  $data = $this->db->query('Select * from usuario WHERE id = '.$id.';');
  return $data->row();
 }

 public function editarAvatar($id,$imagen){

    $data = array('avatar' => $imagen);
    $this->db->where('id',$id);
    $this->db->update('usuario',$data);
 }

}

//