
<?php
    include('../Config/Config.php');
    extract($_REQUEST);
    $docente = isset($docente) ? $docente : '[]';
    $accion = isset($accion) ? $accion : '';

    $objDocente = new Docente($conexion);
    if($accion=='consultar'){
        print_r( json_encode($objDocente->obtener_datos()) );
    }else if($accion=='eliminar'){
        print_r( json_encode($objDocente->eliminar_datos()) );
    }else{
        print_r( $objDocente->recibir_datos($docente) );
    }
    
    class Docente{
        private $datos=[], $db;
        public $resp = ['msg'=>'ok'];

        public function __construct($db){
            $this->db=$db;
        }
        public function obtener_datos(){
            $this->db->consultas('SELECT * FROM docentes');
            return $this->db->obtener_datos();
        }
        public function eliminar_datos(){
            global $idDocente;
            return $this->db->consultas('
                DELETE docentes FROM docentes
                WHERE idDocente=?', $idDocente
            );
        }
        public function recibir_datos($docente){
            $this->datos = json_decode($docente, true);
            return $this->validar_datos();
        }
        private function validar_datos(){
            if( empty($this->datos['nombre']) ){
                $this->resp['msg'] = 'Por favor ingrese un nombre';
            } 
            if( empty($this->datos['direccion']) ){
                $this->resp['msg'] = 'Por favor ingrese una direccion';
            }
            if( empty($this->datos['telefono']) ){
                $this->resp['msg'] = 'Por favor ingrese un telefono';
            }
            if( empty($this->datos['dui']) ){
                //$this->resp['msg'] = 'Por favor ingrese el DUI';
            }
            return $this->administrar_docente();
        }
        private function administrar_docente(){
            global $accion;
            if( $this->resp['msg']=='ok' ){
                if( $accion=='nuevo' ){
                    return $this->db->consultas('
                        INSERT INTO docentes (nombre, direccion, telefono, dui)
                        VALUES(?,?,?,?)',$this->datos['nombre'], $this->datos['direccion'],
                        $this->datos['telefono'], $this->datos['dui']
                    );
                }else if( $accion=='modificar' ){
                    return $this->db->consultas('
                        UPDATE docentes SET nombre=?, direccion=?, telefono=?, dui=?
                        WHERE idDocente=?', $this->datos['nombre'], $this->datos['direccion'],
                        $this->datos['telefono'], $this->datos['dui'], $this->datos['idDocente']
                    );
                }
            }else{
                return $this->resp;
            }

        }
    }
?>