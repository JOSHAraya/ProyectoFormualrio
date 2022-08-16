<?php
  class DatosPersonales{
      private $cedula;
      private $nombre;
      private $peso;
      private $estatura;
      private $objetivo;
      private $observaciones;
     
      public  function __construct() {
          
      }

      public  function getCedula() {
          return $this->cedula;
      }

      public  function getNombre() {
          return $this->nombre;
      }

      public  function getPeso() {
          return $this->peso;
      }

      public  function getObjetivo() {
        return $this->objetivo;
    }

    public  function getObservaciones() {
        return $this->observaciones;
    }

     

      public  function getEstatura() {
          return $this->estatura;
      }

      public  function setCedula($cedula): void {
          $this->cedula = $cedula;
      }

      public  function setNombre($nombre): void {
          $this->nombre = $nombre;
      }

      public function setPeso($peso):void {
          $this->peso = $peso;
      }

     
      public  function setEstatura($estatura): void  {
          $this->estatura = $estatura;
      }

      public function setObjetivo($objetivo):void {
        $this->objetivo = $objetivo;
    }

   
    public  function setObservaciones($observaciones): void  {
        $this->observaciones = $observaciones;
    }


      public static function insertar($datosPersonales){
          try{
            $db= Db::getConnect();
            $db->beginTransaction();
            $consulta=$db->prepare("INSERT INTO tbl_datos_clientes (cedula, nombre, peso,estatura,objetivo,observaciones)"
                 ." values(:cedula,:nombre,:peso,:estatura,:objetivo,:observaciones)");
            $consulta->bindValue(':cedula',$datosPersonales->getCedula());
            $consulta->bindValue(':nombre',$datosPersonales->getNombre());
            $consulta->bindValue(':peso',$datosPersonales->getPeso());
            $consulta->bindValue(':estatura',$datosPersonales->getEstatura());
            $consulta->bindValue(':objetivo',$datosPersonales->getObjetivo());
            $consulta->bindValue(':observaciones',$datosPersonales->getObservaciones());
            $consulta->execute();
            $db->commit();
          }catch(PDOException $e){
            $db->rollBack();// se hace para reestablecer la base de datos cuando algo fall
            echo "Se ha presentado un error en la conexión " .$e->getMessage();
      }
     
    }
    
    public static function listarTodos(){
        $datos=[];
        try{
            $db= Db::getConnect();
            
            $consulta=$db->prepare("SELECT cedula, nombre from tbl_datos_clientes"); //aquí ejecuta 
            $consulta->execute();// y aqui se guarda lo que se ejecutó
            foreach($consulta->fetchAll() as $dato){
                $datosPersonales = new DatosPersonales();
                $datosPersonales->setCedula($dato['cedula']);
                $datosPersonales->setNombre($dato['nombre']);
            
            $datos[]=$datosPersonales ;//para asignarle valores al array
            
            }
            return $datos;

        }catch(PDOException $e){
           
            echo "Se ha presentado un error en la conexión " .$e->getMessage();
        }
    } 

    public static function mostrar($cedula){
          
        try{
            $db= Db::getConnect();
            $db->beginTransaction();
            $consulta=$db->prepare("SELECT * from tbl_datos_clientes where cedula= :cedula"); //aquí ejecuta 
            $consulta->bindValue(':cedula',$cedula);

            $consulta->execute();// y aqui se guarda lo que se ejecutó
            $respuesta= $consulta->fetch();
            if($respuesta){
                $datosPersonales= new DatosPersonales();
                $datosPersonales->setCedula($respuesta['cedula']);
                $datosPersonales->setNombre($respuesta['nombre']);
                $datosPersonales->setPeso($respuesta['peso']);
                $datosPersonales->setEstatura($respuesta['estatura']);
                $datosPersonales->setObjetivo($respuesta['objetivo']);
                $datosPersonales->setObservaciones($respuesta['observaciones']);
                return $datosPersonales; 
            }
          

        }catch(PDOException $e){
            
            echo "Se ha presentado un error en la conexión " .$e->getMessage();
        }
      }
      public static function actualizar($datosPersonales){
        try{
            $db= Db::getConnect();
            $db->beginTransaction();
            $consulta =$db->prepare("UPDATE tbl_datos_clientes set nombre=:nombre,"
            ."peso=:peso, estatura=:estatura, objetivo=:objetivo, observaciones=:observaciones "
            ." where cedula=:cedula");
            $consulta->bindValue(':cedula',$datosPersonales->getCedula());
            $consulta->bindValue(':nombre',$datosPersonales->getNombre());
            $consulta->bindValue(':peso',$datosPersonales->getPeso());
            $consulta->bindValue(':estatura',$datosPersonales->getEstatura());
            $consulta->bindValue(':objetivo',$datosPersonales->getObjetivo());
            $consulta->bindValue(':observaciones',$datosPersonales->getObservaciones());
            $consulta->execute();
            $db->commit();//indicar que está bien todo 
        }catch(PDOException $e){
            $db->rollBack();// se hace para reestablecer la base de datos cuando algo fall
            echo "Se ha presentado un error en la conexión " .$e->getMessage();
        }
        
      }


    public static function delete($cedula){
        try{    
            $db= Db::getConnect();
            $db->beginTransaction();
            $consulta=$db->prepare("DELETE from tbl_datos_clientes WHERE cedula=:cedula");
            $consulta->bindValue(':cedula', $cedula);
            $consulta->execute();
            $db->commit();

        }catch(PDOException $e){
            $db->rollBack();// se hace para reestablecer la base de datos cuando algo fall
            echo "Se ha presentado un error en la conexión " .$e->getMessage();
            
        }
        


    }
    public static function buscarNombre($texto){
        $datos=[];
        $textoBusqueda= "'%".$texto."%'";
        $consultaFormateo = "SELECT cedula,nombre from tbl_datos_clientes "
        ."where nombre like " .$textoBusqueda;
        try{
            $db= Db::getConnect();         
            $consulta=$db->prepare($consultaFormateo); 
            $consulta->execute();// y aqui se guarda lo que se ejecutó
            foreach($consulta->fetchAll() as $dato){
                $datosPersonales = new DatosPersonales();
                $datosPersonales->setCedula($dato['cedula']);
                $datosPersonales->setNombre($dato['nombre']);
                $datos[]=$datosPersonales ;//para asignarle valores al array
            
            }
            return $datos;

        }catch(PDOException $e){
           
            echo "Se ha presentado un error en la conexión " .$e->getMessage();
        }
    } 
}       
?>