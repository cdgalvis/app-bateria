<?php

   class Database { 
      public $db;   // handle of the db connexion    
      private static $dns = "mysql:host=localhost;dbname=tabulacion"; 
      private static $user = "root"; 
      private static $pass = "";     
      private static $instance;

      public function __construct ()  
      {        
         $this->db = new PDO(self::$dns,self::$user,self::$pass);       
      } 

      // Se crea la instancia de la clase Database.
      // Se instancia la clase para iniciarla y poder acceder a las propiedades.
      public static function getInstance()
      { 
         if(!isset(self::$instance)) 
         { 
               $object= __CLASS__; 
               self::$instance=new $object; 
         } 
         return self::$instance; 
      } 

      public function DatosAutenticacion($username,$password) 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,nombres,apellidos,username,roles_id,identificacion,email,active from users where username=:username and password=:password"; 
         $result = $conexion->db->prepare($sql);     
         $params = array("username" => $username,"password" => $password); 
         $result->execute($params); 
         return ($result); 
      }

      public function DatosGrupos() 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,gru_nombre,gru_visible,gru_url from groups order by id asc"; 
         $result = $conexion->db->prepare($sql);
         $result->execute(); 
         return ($result); 
      }

      public function DatosModulos($users_id,$groups_id) 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT m.id,m.mod_nombre,m.mod_url,m.groups_id,mp.modules_id,
                      mp.users_id,gru_nombre,gru_visible,mod_visible,gru_url 
               FROM modules m
               LEFT JOIN groups g on (m.groups_id = g.id)
               LEFT JOIN modpermi mp on (m.id = mp.modules_id)
               WHERE users_id =:users_id and groups_id =:groups_id
               ORDER BY m.groups_id ASC, m.id ASC"; 
         $result = $conexion->db->prepare($sql);
         $result->execute( 
                           array(
                              ':users_id'=>$users_id, 
                              ':groups_id'=>$groups_id
                           )
                        ); 
         return ($result); 
      }

      public function DatosRoles() { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,rol_nombre from roles"; 
         $result = $conexion->db->prepare($sql);    
         $result->execute(); 
         return $result; 
      } 

      public function DatosUsuarios() { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,nombres,apellidos,username,password,roles_id,identificacion,email,active from users"; 
         $result = $conexion->db->prepare($sql);    
         $result->execute(); 
         return $result; 
      }

      public function DatosEmpresas() { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,nombre,documento,direccion,telefono,nombre_contacto,registro_evaluacion,active from companies"; 
         $result = $conexion->db->prepare($sql);    
         $result->execute(); 
         return $result; 
      }

      public function DatosCiudades() { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,nombre,active,departments_id from cities"; 
         $result = $conexion->db->prepare($sql);    
         $result->execute(); 
         return $result; 
      }

      public function DatosEvaluaciones() { 
         $conexion = Database::getInstance(); 
         $sql="SELECT e.id,e.companies_id,e.cities_id,e.codigo_sesion,e.respuesta,e.formatoA,e.formatoB,e.burnout,
                      c.nombre as empresa,ct.nombre as ciudad 
               FROM evaluacion e
               LEFT JOIN companies c ON (e.companies_id=c.id)
               LEFT JOIN cities ct ON (e.cities_id=ct.id)
               "; 
         $result = $conexion->db->prepare($sql);    
         $result->execute(); 
         return $result; 
      }

      public function ValidacionUsername($username) { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,nombres,apellidos,username,role from users where username=:username"; 
         $result = $conexion->db->prepare($sql);     
         $params = array("username" => $username); 
         $result->execute($params); 
         return ($result); 
      }

      public function ValidacionEmpresa($documento) { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,nombre,documento,direccion,telefono,nombre_contacto,registro_evaluacion,active from companies where documento=:documento"; 
         $result = $conexion->db->prepare($sql);     
         $params = array("documento" => $documento); 
         $result->execute($params); 
         return ($result); 
      }

      public function addUsuario($username,$password,$nombres,$apellidos,$identificacion,$email,$roles,$active,$tipo_documento) { 

         try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("INSERT INTO users (username,password,nombres,apellidos,identificacion,roles_id,email,active,tipo_documento) VALUES (:username, :password, :nombres, :apellidos, :identificacion, :roles , :email, :active, :tipo_documento)");
             $result->execute(
                                 array(
                                     ':username'=>$username, 
                                     ':password'=>$password, 
                                     ':nombres'=>$nombres, 
                                     ':apellidos'=>$apellidos, 
                                     ':identificacion'=>$identificacion,
                                     ':roles'=>$roles,
                                     ':email'=>$email,
                                     ':active'=>$active,
                                     ':tipo_documento'=>$tipo_documento,  
                                 )
                             );
             return "5";
         } catch(PDOException $e) {
             return "0";
         }
      }

      public function addEmpresa($documento,$nombre,$direccion,$telefono,$nombre_contacto,$registro_evaluacion,$active) { 

         try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("INSERT INTO companies (documento,nombre,direccion,telefono,nombre_contacto,registro_evaluacion,active) VALUES (:documento, :nombre, :direccion, :telefono, :nombre_contacto, :registro_evaluacion, :active)");
             $result->execute(
                                 array(
                                     ':documento'=>$documento, 
                                     ':nombre'=>$nombre, 
                                     ':direccion'=>$direccion, 
                                     ':telefono'=>$telefono, 
                                     ':nombre_contacto'=>$nombre_contacto,
                                     ':registro_evaluacion'=>$registro_evaluacion,
                                     ':active'=>$active
                                 )
                             );
             return "5";
         } catch(PDOException $e) {
             return "0";
         }
      }

      public function editUsuario($id) { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,tipo_documento,username,password,nombres,apellidos,identificacion,roles_id,email,active from users where id=:id"; 
         $result = $conexion->db->prepare($sql);     
         $params = array("id" => $id); 
         $result->execute($params);
         return $result; 
      } 

      public function editEmpresa($id) { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,nombre,documento,direccion,telefono,nombre_contacto,registro_evaluacion,active from companies where id=:id"; 
         $result = $conexion->db->prepare($sql);     
         $params = array("id" => $id); 
         $result->execute($params);
         return $result; 
      }

      public function updateUsuario($id,$username,$password,$nombres,$apellidos,$identificacion,$email,$roles,$active,$tipo_documento) { 

         try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("UPDATE users set username=:username,password=:password,nombres=:nombres,apellidos=:apellidos,identificacion=:identificacion,email=:email,roles_id=:roles,active=:active,tipo_documento=:tipo_documento where id=:id ");
             $result->execute(
                                 array(
                                     ':username'=>$username,
                                     ':password'=>$password,
                                     ':nombres'=>$nombres,
                                     ':apellidos'=>$apellidos,
                                     ':identificacion'=>$identificacion,
                                     ':email'=>$email,
                                     ':roles'=>$roles,
                                     ':active'=>$active,
                                     ':tipo_documento'=>$tipo_documento,
                                     ':id'=>$id
                                 )
                             );
             return "3";
         } catch(PDOException $e) {
             return "0";
         }
      }

      public function updateEmpresa($id,$documento,$nombre,$direccion,$telefono,$nombre_contacto,$registro_evaluacion,$active) { 

         try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("UPDATE companies set documento=:documento, nombre=:nombre,direccion=:direccion,telefono=:telefono,nombre_contacto=:nombre_contacto,registro_evaluacion=:registro_evaluacion,active=:active where id=:id");
             $result->execute(
                                 array(
                                     ':documento'=>$documento, 
                                     ':nombre'=>$nombre, 
                                     ':direccion'=>$direccion, 
                                     ':telefono'=>$telefono, 
                                     ':nombre_contacto'=>$nombre_contacto,
                                     ':registro_evaluacion'=>$registro_evaluacion,
                                     ':active'=>$active,
                                     ':id'=>$id
                                 )
                             );
             return "3";
         } catch(PDOException $e) {
             return "0";
         }
      }

      public function deleteUsuario($id){
         try{
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("UPDATE users set active=1 WHERE id=:id");
             $result->execute(array(':id'=>$id));

             return "1";
         }catch (PDOException $e) {
             return "0";
         }
      }

      public function deleteEmpresa($id){
         try{
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("UPDATE companies set active=1 WHERE id=:id");
             $result->execute(array(':id'=>$id));

             return "1";
         }catch (PDOException $e) {
             return "0";
         }
      }

      public function deleteEvaluacion($id){
         try{
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("UPDATE evaluacion set active=1 WHERE id=:id");
             $result->execute(array(':id'=>$id));

             return "1";
         }catch (PDOException $e) {
             return "0";
         }
      }

      public function editRol($id) { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,rol_nombre from roles where id=:id"; 
         $result = $conexion->db->prepare($sql);     
         $params = array("id" => $id); 
         $result->execute($params);
         return $result; 
      } 

      public function editEvaluacion($id) { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,companies_id,cities_id,codigo_sesion,respuesta,formatoA,formatoB,burnout from evaluacion where id=:id"; 
         $result = $conexion->db->prepare($sql);     
         $params = array("id" => $id); 
         $result->execute($params);
         return $result; 
      } 

      public function addRol($nombre) { 

         try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("INSERT INTO roles (rol_nombre) VALUES (:nombre)");
             $result->execute(
                                 array(
                                     ':nombre'=>$nombre
                                 )
                             );
             return "2";
         } catch(PDOException $e) {
             return "0";
         }
      }

      public function updateRol($id,$nombre) { 

         try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("UPDATE roles set rol_nombre=:nombre where id=:id ");
             $result->execute(
                                 array(
                                     ':nombre'=>$nombre,
                                     ':id'=>$id
                                 )
                             );
             return "3";
         } catch(PDOException $e) {
             return "0";
         }
      } 

      public function ValidacionContactos($companies_id,$identificacion) { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,nombres,apellidos,tipo_documento,identificacion,area,email,telefono,fecha_nacimiento,ciudad,companies_id from contacts where identificacion=:identificacion and companies_id=:companies_id"; 
         $result = $conexion->db->prepare($sql);     
         $result->execute(
                              array(
                                 ':identificacion'=>$identificacion,
                                 ':companies_id'=>$companies_id
                              )
                        );
         return $result; 
      } 

      public function updateContacto($companies_id,$nombres,$apellidos,$tipo_documento,$x_documento,$area,$email,$telefono,$ciudad,$fecha_nacimiento) { 

         try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("UPDATE contacts set nombres=:nombres, apellidos=:apellidos,tipo_documento=:tipo_documento, area=:area,email=:email,telefono=:telefono,fecha_nacimiento=:fecha_nacimiento,ciudad=:ciudad where identificacion=:x_documento and companies_id=:companies_id");
             $result->execute(
                                 array(
                                     ':nombres'=>$nombres, 
                                     ':apellidos'=>$apellidos, 
                                     ':tipo_documento'=>$tipo_documento, 
                                     ':area'=>$area,
                                     ':email'=>$email,
                                     ':telefono'=>$telefono,
                                     ':fecha_nacimiento'=>$fecha_nacimiento,
                                     ':ciudad'=>$ciudad,
                                     ':x_documento'=>$x_documento, 
                                     ':companies_id'=>$companies_id
                                 )
                             );
             return "3";
         } catch(PDOException $e) {
             return "0";
         }
      }

      public function addContacto($companies_id,$nombres,$apellidos,$tipo_documento,$x_documento,$area,$email,$telefono,$ciudad,$fecha_nacimiento) { 

         try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("INSERT INTO contacts (nombres,apellidos,tipo_documento,identificacion,area,email,telefono,fecha_nacimiento,ciudad,companies_id) VALUES (:nombres, :apellidos, :tipo_documento, :x_documento, :area, :email, :telefono, :fecha_nacimiento, :ciudad, :companies_id)");
             $result->execute(
                                 array(
                                    ':nombres'=>$nombres, 
                                    ':apellidos'=>$apellidos, 
                                    ':tipo_documento'=>$tipo_documento,
                                    ':x_documento'=>$x_documento,  
                                    ':area'=>$area,
                                    ':email'=>$email,
                                    ':telefono'=>$telefono,
                                    ':fecha_nacimiento'=>$fecha_nacimiento,
                                    ':ciudad'=>$ciudad,
                                    ':companies_id'=>$companies_id
                                 )
                             );
             return "5";
         } catch(PDOException $e) {
             return "0";
         }
      }

      public function DatosContactosEmpresa($companies_id) { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,nombres,apellidos,tipo_documento,identificacion,area,email,telefono,fecha_nacimiento,ciudad,companies_id from contacts where companies_id=:companies_id"; 
         $result = $conexion->db->prepare($sql);     
         $result->execute(array(':companies_id'=>$companies_id));
         return $result; 
      }
      
      public function updateEvaluacion($evaluacion_id,$companies_id,$cities_id,$codigo_sesion,$respuesta,$formatoA,$formatoB,$burnout) { 

         try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("UPDATE evaluacion set companies_id=:companies_id, cities_id=:cities_id, codigo_sesion=:codigo_sesion, respuesta=:respuesta,formatoA=:formatoA,formatoB=:formatoB, burnout=:burnout where evaluacion_id=:evaluacion_id");
             $result->execute(
                                 array(
                                     ':companies_id'=>$companies_id, 
                                     ':cities_id'=>$cities_id, 
                                     ':codigo_sesion'=>$codigo_sesion, 
                                     ':respuesta'=>$respuesta,
                                     ':formatoA'=>$formatoA,
                                     ':formatoB'=>$formatoB,
                                     ':burnout'=>$burnout,
                                     ':evaluacion_id'=>$evaluacion_id
                                 )
                             );
             return "3";
         } catch(PDOException $e) {
             return "0";
         }
      }

      public function addEvaluacion($companies_id,$cities_id,$codigo_sesion,$respuesta,$formatoA,$formatoB,$burnout) { 

         try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("INSERT INTO evaluacion (companies_id,cities_id,codigo_sesion,respuesta,formatoA,formatoB,burnout) VALUES (:companies_id, :cities_id, :codigo_sesion, :respuesta, :formatoA, :formatoB, :burnout)");
             $result->execute(
                                 array(
                                    ':companies_id'=>$companies_id, 
                                    ':cities_id'=>$cities_id, 
                                    ':codigo_sesion'=>$codigo_sesion,
                                    ':respuesta'=>$respuesta,  
                                    ':formatoA'=>$formatoA,
                                    ':formatoB'=>$formatoB,
                                    ':burnout'=>$burnout
                                 )
                             );
             return "5";
         } catch(PDOException $e) {
             return "0";
         }
      }

   }
?>