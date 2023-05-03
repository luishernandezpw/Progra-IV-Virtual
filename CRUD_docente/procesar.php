
<?php
    include('../Config/Config.php');


    class Docente{
        private $datos=[], $db;
        public $resp = ['msg'=>'ok'];

        public function __construct($db){
            $this->db=$db;
        }
        public function recibir_datos($docente){
            $this->datos = json_decode($docente, true);
            $this->validar_datos();
        }
        private fucntion validar_dato(){
            if( empty($this->datos['nombre']) ){
                $this->resp['msg', 'Por favor ingrese un nombre'];
            }
            if( empty($this->datos['direccion']) ){
                $this->resp['msg', 'Por favor ingrese una direccion'];
            }
            if( empty($this->datos['telefono']) ){
                $this->resp['msg', 'Por favor ingrese un telefono'];
            }
            if( empty($this->datos['dui']) ){
                $this->resp['msg', 'Por favor ingrese el DUI'];
            }
            $this->administrar_docente();
        }
        private function administrar_docente(){
            

        }
    }
?>