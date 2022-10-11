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

      public function DatosDepartamentos() 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT dep_id,dep_nombre	 from departamentos order by dep_id asc"; 
         $result = $conexion->db->prepare($sql);
         $result->execute(); 
         return ($result); 
      }

      public function DatosMunicipios() 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT mun_id,mun_nombre,mun_estado,dep_id  from municipios order by mun_id asc"; 
         $result = $conexion->db->prepare($sql);
         $result->execute(); 
         return ($result); 
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


      public function DatosRespuestas() 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT res_codigo,res_nombre	 from respuestas where res_tipo = 1 order by res_codigo asc"; 
         $result = $conexion->db->prepare($sql);
         $result->execute(); 
         return ($result); 
      }

      public function DatosRespuestasBournout() 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT res_codigo,res_nombre	 from respuestas where res_tipo = 2 order by res_codigo asc"; 
         $result = $conexion->db->prepare($sql);
         $result->execute(); 
         return ($result); 
      }

      public function DatosFormatoAIntralaboral() 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT pre_codigo,pre_nombre,form_codigo,tip_codigo	 from preguntas WHERE form_codigo = 1 and tip_codigo = 1 order by pre_codigo asc"; 
         $result = $conexion->db->prepare($sql);
         $result->execute(); 
         return ($result); 
      }

      public function DatosFormatoBIntralaboral() 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT pre_codigo,pre_nombre,form_codigo,tip_codigo	 from preguntas WHERE form_codigo = 2 and tip_codigo = 1 order by pre_codigo asc"; 
         $result = $conexion->db->prepare($sql);
         $result->execute(); 
         return ($result); 
      }

      public function DatosFormatoAestres() 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT pre_codigo,pre_nombre,form_codigo,tip_codigo	 from preguntas WHERE form_codigo = 1 and tip_codigo = 2 order by pre_codigo asc"; 
         $result = $conexion->db->prepare($sql);
         $result->execute(); 
         return ($result); 
      }

      public function DatosFormatoAExtralaboral() 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT pre_codigo,pre_nombre,form_codigo,tip_codigo	 from preguntas WHERE form_codigo = 1 and tip_codigo = 3 order by pre_codigo asc"; 
         $result = $conexion->db->prepare($sql);
         $result->execute(); 
         return ($result); 
      }

      public function DatosFormatoBExtralaboral() 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT pre_codigo,pre_nombre,form_codigo,tip_codigo	 from preguntas WHERE form_codigo = 2 and tip_codigo = 3 order by pre_codigo asc"; 
         $result = $conexion->db->prepare($sql);
         $result->execute(); 
         return ($result); 
      }

      public function DatosBurnout() 
      { 
         $conexion = Database::getInstance(); 
         $sql="SELECT pre_codigo,pre_nombre,form_codigo,tip_codigo	 from preguntas WHERE form_codigo = 3 and tip_codigo = 4 order by pre_codigo asc"; 
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

      public function CantidadEvaluaciones() { 
        $conexion = Database::getInstance(); 
        $sql="SELECT CASE WHEN count(1) IS null or count(1) = '' THEN 1 ELSE count(1)+1 END as id FROM evaluacion"; 
        $result = $conexion->db->prepare($sql);    
        $result->execute(); 
        return $result; 
     }

     public function SesionEvaluaciones() { 
        $conexion = Database::getInstance(); 
        $sql="SELECT CASE WHEN codigo_sesion IS null or codigo_sesion = '' THEN 1 ELSE codigo_sesion+1 END as id FROM evaluacion"; 
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

      public function addRespuestas($formato,$tipo,$pregunta,$respuesta,$usuario,$fechaActual) {        

        try {
            $conexion = Database::getInstance(); 
            $result = $conexion->db->prepare("INSERT INTO detalle_respuestas (det_formato,det_tipo,det_pregunta,det_respuesta,det_usuario,det_fecha) VALUES (:det_formato, :det_tipo, :det_pregunta, :det_respuesta, :det_usuario, :det_fecha)");
            $result->execute(
                                array(
                                    ':det_formato'=>$formato, 
                                    ':det_tipo'=>$tipo, 
                                    ':det_pregunta'=>$pregunta, 
                                    ':det_respuesta'=>$respuesta, 
                                    ':det_usuario'=>$usuario, 
                                    ':det_fecha'=>$fechaActual,  
                                )
                            );
            return "5";
        } catch(PDOException $e) {
            return "0";
        }
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

      public function deleteEvaluacionDet($id){
        try{
            $conexion = Database::getInstance(); 
            $result = $conexion->db->prepare("DELETE FROM detevaluacion WHERE id=:id");
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

      public function editGrupos($id) { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,gru_nombre,gru_visible,gru_url from groups where id=:id"; 
         $result = $conexion->db->prepare($sql);     
         $params = array("id" => $id); 
         $result->execute($params);
         return $result; 
      } 

      public function editEvaluacion($id) { 
         $conexion = Database::getInstance(); 
         $sql="SELECT id,companies_id,cities_id,codigo_sesion,respuesta,formatoA,formatoB,burnout,users_id from evaluacion where id=:id"; 
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

        public function addDetEvaluacion($evaluacion_id,$contacts_id,$nombres,$fecha_registro,$companies_id) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("INSERT INTO detevaluacion (evaluacion_id,contacts_id,nombres,fecha_registro,companies_id) VALUES (:evaluacion_id, :contacts_id, :nombres, :fecha_registro, :companies_id)");
                $result->execute(
                                    array(
                                    ':evaluacion_id'=>$evaluacion_id,
                                    ':contacts_id'=>$contacts_id, 
                                    ':nombres'=>$nombres, 
                                    ':fecha_registro'=>$fecha_registro,
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

      public function DatosContactosEmpresaBus($companies_id,$txtbus) { 
        $conexion = Database::getInstance(); 

        $pattern = '%'.$txtbus.'%';
        $sql="SELECT id,nombres,apellidos,tipo_documento,identificacion,area,email,telefono,fecha_nacimiento,ciudad,companies_id 
                FROM contacts 
                WHERE companies_id=:companies_id and (identificacion LIKE :identificacion or nombres LIKE :nombres or apellidos LIKE :apellidos)"; 
        $result = $conexion->db->prepare($sql);     
        $result->execute(array(':companies_id'=>$companies_id,':identificacion'=>$pattern,':nombres'=>$pattern,':apellidos'=>$pattern));       
        return $result; 
     }

      public function DatosDetContactosEvalu($companies_id,$evaluacion_id) { 
        $conexion = Database::getInstance(); 
        $sql="SELECT id,evaluacion_id,contacts_id,nombres,fecha_registro,companies_id from detevaluacion where companies_id=:companies_id and evaluacion_id=:evaluacion_id"; 
        $result = $conexion->db->prepare($sql);     
        $result->execute(array(':companies_id'=>$companies_id, ':evaluacion_id'=>$evaluacion_id));
        return $result; 
     }
      
      public function updateEvaluacion($evaluacion_id,$companies_id,$cities_id,$codigo_sesion,$respuesta,$formatoA,$formatoB,$burnout,$users_id) { 
         try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("UPDATE evaluacion set companies_id=:companies_id, cities_id=:cities_id, codigo_sesion=:codigo_sesion, respuesta=:respuesta,formatoA=:formatoA,formatoB=:formatoB, burnout=:burnout, users_id=:users_id where id=:evaluacion_id");
             $result->execute(
                                 array(
                                     ':companies_id'=>$companies_id, 
                                     ':cities_id'=>$cities_id, 
                                     ':codigo_sesion'=>$codigo_sesion, 
                                     ':respuesta'=>$respuesta,
                                     ':formatoA'=>$formatoA,
                                     ':formatoB'=>$formatoB,
                                     ':burnout'=>$burnout,
                                     ':users_id'=>$users_id,
                                     ':evaluacion_id'=>$evaluacion_id
                                 )
                             );
             return "3";
         } catch(PDOException $e) {
             return "0";
         }

        
      }

      public function addEvaluacion($id,$companies_id,$cities_id,$codigo_sesion,$respuesta,$formatoA,$formatoB,$burnout,$users_id) { 
        if($formatoA=="") $formatoA =0;
        if($formatoB=="") $formatoB =0;
        if($burnout=="")  $burnout  =0;

        try {
             $conexion = Database::getInstance(); 
             $result = $conexion->db->prepare("INSERT INTO evaluacion (id,companies_id,cities_id,codigo_sesion,respuesta,formatoA,formatoB,burnout,users_id) VALUES (:id, :companies_id, :cities_id, :codigo_sesion, :respuesta, :formatoA, :formatoB, :burnout, :users_id)");
             $result->execute(
                                 array(
                                    ':id'=>$id, 
                                    ':companies_id'=>$companies_id, 
                                    ':cities_id'=>$cities_id, 
                                    ':codigo_sesion'=>$codigo_sesion,
                                    ':respuesta'=>$respuesta,  
                                    ':formatoA'=>$formatoA,
                                    ':formatoB'=>$formatoB,
                                    ':burnout'=>$burnout,
                                    ':users_id'=>$users_id
                                 )
                             );
             return "5";
         } catch(PDOException $e) {
             return "0";
         }
      }

      public function RegistrarDatosPersonales($tipo_documento,$identificacion,$nombre_completo,$anio_nacimiento,$estado_civil,$nivel_estudio,$ocupacion_profesion,$residenciaciudad,$residenciadepartamento,$estrato,$dependencia_economica,$trabajociudad,$trabajodepartamento,$aniostrabajo,$cargo_ocupa,$tipo_cargo,$aniosCtrabajo,$nombre_area,$tipo_contrato,$horas_diarias,$sexoradio,$viviendaradio,$salarioradio) { 
        try {
              $conexion = Database::getInstance(); 
              $result = $conexion->db->prepare("INSERT INTO datospersonales (tipo_documento,identificacion,nombre_completo,anio_nacimiento,estado_civil,nivel_estudio,ocupacion_profesion,residenciaciudad,residenciadepartamento,estrato,dependencia_economica,trabajociudad,trabajodepartamento,anios_trabajo,cargo_ocupa,tipo_cargo,anios_cargo,nombre_area,tipo_contrato,horas_diarias,sexo,tipo_vivienda,tipo_salario) VALUES (:tipo_documento,:identificacion,:nombre_completo,:anio_nacimiento,:estado_civil,:nivel_estudio,:ocupacion_profesion,:residenciaciudad,:residenciadepartamento,:estrato,:dependencia_economica,:trabajociudad,:trabajodepartamento,:anios_trabajo,:cargo_ocupa,:tipo_cargo,:anios_cargo,:nombre_area,:tipo_contrato,:horas_diarias,:sexo,:tipo_vivienda,:tipo_salario)");
              $result->execute(
                                array(
                                   ':tipo_documento'          => $tipo_documento,
                                   ':identificacion'          => $identificacion,
                                   ':nombre_completo'         => $nombre_completo,
                                   ':anio_nacimiento'         => $anio_nacimiento,
                                   ':estado_civil'            => $estado_civil,
                                   ':nivel_estudio'           => $nivel_estudio,
                                   ':ocupacion_profesion'     => $ocupacion_profesion,
                                   ':residenciaciudad'        => $residenciaciudad,
                                   ':residenciadepartamento'  => $residenciadepartamento,
                                   ':estrato'                 => $estrato,
                                   ':dependencia_economica'   => $dependencia_economica,
                                   ':trabajociudad'           => $trabajociudad,
                                   ':trabajodepartamento'     => $trabajodepartamento,
                                   ':anios_trabajo'           => $aniostrabajo,
                                   ':cargo_ocupa'             => $cargo_ocupa,
                                   ':tipo_cargo'              => $tipo_cargo,
                                   ':anios_cargo'             => $aniosCtrabajo,
                                   ':nombre_area'             => $nombre_area,
                                   ':tipo_contrato'           => $tipo_contrato,
                                   ':horas_diarias'           => $horas_diarias,
                                   ':sexo'                    => $sexoradio,
                                   ':tipo_vivienda'           => $viviendaradio,
                                   ':tipo_salario'            => $salarioradio
                                )
                             );
              return "5";
        } catch(PDOException $e) {
              return "0";
        } 
    }


    public function ValidacionDatosPersonales($identificacion) { 
      $conexion = Database::getInstance(); 
      $sql="SELECT id,tipo_documento,identificacion,nombre_completo,anio_nacimiento,estado_civil,nivel_estudio,ocupacion_profesion,residenciaciudad,residenciadepartamento,estrato,dependencia_economica,trabajociudad,trabajodepartamento,anios_trabajo,cargo_ocupa,tipo_cargo,anios_cargo,nombre_area,tipo_contrato,horas_diarias,sexo,tipo_vivienda,tipo_salario from datospersonales where identificacion=:identificacion"; 
      $result = $conexion->db->prepare($sql);     
      $params = array("identificacion" => $identificacion); 
      $result->execute($params); 
      return ($result); 
   }

   public function ActualizarDatosPersonales($id,$tipo_documento,$identificacion,$nombre_completo,$anio_nacimiento,$estado_civil,$nivel_estudio,$ocupacion_profesion,$residenciaciudad,$residenciadepartamento,$estrato,$dependencia_economica,$trabajociudad,$trabajodepartamento,$aniostrabajo,$cargo_ocupa,$tipo_cargo,$aniosCtrabajo,$nombre_area,$tipo_contrato,$horas_diarias,$sexoradio,$viviendaradio,$salarioradio) { 
      try {
            $conexion = Database::getInstance(); 
            $result = $conexion->db->prepare("UPDATE datospersonales set tipo_documento=:tipo_documento, identificacion=:identificacion, nombre_completo=:nombre_completo, anio_nacimiento=:anio_nacimiento,estado_civil=:estado_civil,nivel_estudio=:nivel_estudio, ocupacion_profesion=:ocupacion_profesion, residenciaciudad=:residenciaciudad, residenciadepartamento=:residenciadepartamento, estrato=:estrato, dependencia_economica=:dependencia_economica, trabajociudad=:trabajociudad, trabajodepartamento=:trabajodepartamento, anios_trabajo=:anios_trabajo, cargo_ocupa=:cargo_ocupa, tipo_cargo=:tipo_cargo, anios_cargo=:anios_cargo, nombre_area=:nombre_area, tipo_contrato=:tipo_contrato, horas_diarias=:horas_diarias, sexo=:sexo, tipo_vivienda=:tipo_vivienda, tipo_salario=:tipo_salario where id=:id");
            $result->execute(
                              array(
                                 ':tipo_documento'          => $tipo_documento,
                                 ':identificacion'          => $identificacion,
                                 ':nombre_completo'         => $nombre_completo,
                                 ':anio_nacimiento'         => $anio_nacimiento,
                                 ':estado_civil'            => $estado_civil,
                                 ':nivel_estudio'           => $nivel_estudio,
                                 ':ocupacion_profesion'     => $ocupacion_profesion,
                                 ':residenciaciudad'        => $residenciaciudad,
                                 ':residenciadepartamento'  => $residenciadepartamento,
                                 ':estrato'                 => $estrato,
                                 ':dependencia_economica'   => $dependencia_economica,
                                 ':trabajociudad'           => $trabajociudad,
                                 ':trabajodepartamento'     => $trabajodepartamento,
                                 ':anios_trabajo'           => $aniostrabajo,
                                 ':cargo_ocupa'             => $cargo_ocupa,
                                 ':tipo_cargo'              => $tipo_cargo,
                                 ':anios_cargo'             => $aniosCtrabajo,
                                 ':nombre_area'             => $nombre_area,
                                 ':tipo_contrato'           => $tipo_contrato,
                                 ':horas_diarias'           => $horas_diarias,
                                 ':sexo'                    => $sexoradio,
                                 ':tipo_vivienda'           => $viviendaradio,
                                 ':tipo_salario'            => $salarioradio,
                                 ':id'                      => $id
                              )
                           );
            return "5";
      } catch(PDOException $e) {
            return "0";
      } 
   }

   public function updateGrupo($id,$gru_nombre,$gru_visible,$gru_url) { 

      try {
         $conexion = Database::getInstance(); 
         $result = $conexion->db->prepare("UPDATE groups set gru_nombre=:gru_nombre, gru_visible=:gru_visible,gru_url=:gru_url where id=:id");
         $result->execute(
                              array(
                                 ':gru_nombre'=>$gru_nombre, 
                                 ':gru_visible'=>$gru_visible, 
                                 ':gru_url'=>$gru_url,
                                 ':id'=>$id
                              )
                        );
         return "3";
      } catch(PDOException $e) {
         return "0";
      }
   }

   public function addGrupo($gru_nombre,$gru_visible,$gru_url) { 

      try {
          $conexion = Database::getInstance(); 
          $result = $conexion->db->prepare("INSERT INTO groups (gru_nombre,gru_visible,gru_url) VALUES (:gru_nombre, :gru_visible, :gru_url)");
          $result->execute(
                              array(
                              ':gru_nombre'=>$gru_nombre,
                              ':gru_visible'=>$gru_visible,
                              ':gru_url'=>$gru_url
                              )
                          );
          return "5";
      } catch(PDOException $e) {
          return "0";
      }
   }

   public function deleteGrupo($id){
      try{
          $conexion = Database::getInstance(); 
          $result = $conexion->db->prepare("UPDATE groups set gru_visible=1 WHERE id=:id");
          $result->execute(array(':id'=>$id));

          return "1";
      }catch (PDOException $e) {
          return "0";
      }
   }

   public function DatosListaModulos() 
   { 
      $conexion = Database::getInstance(); 
      $sql="SELECT id,mod_nombre,mod_visible,mod_url,groups_id from modules order by id asc"; 
      $result = $conexion->db->prepare($sql);
      $result->execute(); 
      return ($result); 
   }

   public function editModulos($id) { 
      $conexion = Database::getInstance(); 
      $sql="SELECT id,mod_nombre,mod_visible,mod_url,groups_id from modules where id=:id"; 
      $result = $conexion->db->prepare($sql);     
      $params = array("id" => $id); 
      $result->execute($params);
      return $result; 
   }

   public function updateModulos($id,$mod_nombre,$mod_visible,$mod_url,$groups_id) { 

      try {
         $conexion = Database::getInstance(); 
         $result = $conexion->db->prepare("UPDATE modules set mod_nombre=:mod_nombre, mod_visible=:mod_visible,mod_url=:mod_url,groups_id=:groups_id where id=:id");
         $result->execute(
                              array(
                                 ':mod_nombre'=>$mod_nombre, 
                                 ':mod_visible'=>$mod_visible, 
                                 ':mod_url'=>$mod_url,
                                 ':groups_id'=>$groups_id,
                                 ':id'=>$id
                              )
                        );
         return "3";
      } catch(PDOException $e) {
         return "0";
      }
   }

   public function addModulos($mod_nombre,$mod_visible,$mod_url,$groups_id) { 

      try {
          $conexion = Database::getInstance(); 
          $result = $conexion->db->prepare("INSERT INTO modules (mod_nombre,mod_visible,mod_url,groups_id) VALUES (:mod_nombre, :mod_visible, :mod_url, :groups_id)");
          $result->execute(
                              array(
                              ':mod_nombre'=>$mod_nombre,
                              ':mod_visible'=>$mod_visible,
                              ':mod_url'=>$mod_url,
                              ':groups_id'=>$groups_id
                              )
                          );
          return "5";
      } catch(PDOException $e) {
          return "0";
      }
   }

   public function deleteModulo($id){
      try{
          $conexion = Database::getInstance(); 
          $result = $conexion->db->prepare("UPDATE modules set mod_visible=1 WHERE id=:id");
          $result->execute(array(':id'=>$id));

          return "1";
      }catch (PDOException $e) {
          return "0";
      }
   }

}
?>