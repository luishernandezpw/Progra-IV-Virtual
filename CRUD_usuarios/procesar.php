
<?php
    include('../Config/Config.php');
    extract($_REQUEST);
    $usuario = isset($usuario) ? $usuario : '[]';
    $accion = isset($accion) ? $accion : '';

    $objUsuario = new Usuario($conexion);
    if($accion=='consultar'){
        print_r( json_encode($objUsuario->obtener_datos()) );
    }else if($accion=='eliminar'){
        print_r( json_encode($objUsuario->eliminar_datos()) );
    }else{
        print_r( $objUsuario->recibir_datos($usuario) );
    }
    
    class Usuario{
        private $datos=[], $db;
        public $resp = ['msg'=>'ok'];

        public function __construct($db){
            $this->db=$db;
        }
        public function obtener_datos(){
            $this->db->consultas('SELECT * FROM usuarios');
            return $this->db->obtener_datos();
        }
        public function eliminar_datos(){
            global $idUsuario;
            return $this->db->consultas('
                DELETE usuarios FROM usuarios
                WHERE idUsuario=?', $idUsuario
            );
        }
        public function recibir_datos($usuario){
            $this->datos = json_decode($usuario, true);
            return $this->validar_datos();
        }
        private function validar_datos(){
            if( empty($this->datos['usuario']) ){
                $this->resp['msg'] = 'Por favor ingrese el usuario';
            }
            if( empty($this->datos['clave']) ){
                $this->resp['msg'] = 'Por favor ingrese una clave';
            }
            if( empty($this->datos['nombre']) ){
                $this->resp['msg'] = 'Por favor ingrese un nombre';
            }
            return $this->administrar_usuario();
        }
        private function administrar_usuario(){
            global $accion;
            if( $this->resp['msg']=='ok' ){
                if( $accion=='nuevo' ){
                    return $this->db->consultas('
                        INSERT INTO usuarios (usuario, clave, nombre, tipo)
                        VALUES(?,?,?,?)',$this->datos['usuario'], $this->datos['clave'],
                        $this->datos['nombre'], $this->datos['tipo']
                    );
                }else if( $accion=='modificar' ){
                    return $this->db->consultas('
                        UPDATE usuarios SET usuario=?, clave=?, nombre=?, tipo=?
                        WHERE idUsuario=?', $this->datos['usuario'], $this->datos['clave'],
                        $this->datos['nombre'], $this->datos['tipo'], $this->datos['idUsuario']
                    );
                }
            }else{
                return $this->resp;
            }

        }
    }
?>