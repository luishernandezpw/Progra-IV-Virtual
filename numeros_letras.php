<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertir Numeros a Letras...</title>
</head>
<body>
    <form action="numeros_letras.php" method="POST">
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <td colspan="2">CONVERTIR NUMEROS A LETRAS * HASTA 100</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><label for="txtinicio">INICIO</label></td>
                    <td><input type="text" name="txtinicio" id="txtinicio" 
                        required pattern="[0-9]{1,2}"></td>
                </tr>
                <tr>
                <td><label for="txtfin">FIN</label></td>
                    <td><input type="text" name="txtfin" id="txtfin" 
                        required pattern="[0-9]{1,2}"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="CONVERTIR">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        RESPUESTA:
                        <?php
                        if( $_POST ){
                            $inicio = $_POST['txtinicio'];
                            $fin = $_POST['txtfin'];

                            if( $inicio>$fin ){
                                echo "El numero $inicio NO puede ser mayor que $fin";
                                exit;
                            }
                            //echo "RANGO $inicio - $fin";

                            $obj = new convertir_numeros_letras();
                            echo $obj->convertir($inicio, $fin);
                        }

                        class convertir_numeros_letras{
                            public function convertir($inicio, $fin){
                                $unidades = ['', 'UNO', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS',
                                'SIETE', 'OCHO', 'NUEVE'];

                            $especiales = [11=>'ONCE', 12=>'DOCE', 13=>'TRECE', 14=>'CATORCE',
                                15=>'QUINCE', 16=>'DIECISEIS', 17=>'DIECISIETE', 18=>'DIECIOCHO',
                                19=>'DIECINUEVE', 21=>'VEINTIUNO', 22=>'VEINTIDOS', 23=>'VEINTITRES',
                                24=>'VEINTICUATRO', 25=>'VEINTICINCO', 26=>'VEINTISEIS', 27=>'VEINTISIETE',
                                28=>'VEINTIOCHO', 29=>'VEINTINUEVE', 100=>'CIEN'];

                            $decenas = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA',
                                'SETENTA', 'OCHENTA', 'NOVENTA'];

                                $respuesta = '<br>';

                                for($i=$inicio; $i<=$fin; $i++){
                                    $letras = '';
                                    if( strlen( $i )==1 ){//1,2,3,4...
                                        $letras =  $unidades[$i];
                                    }
                                    if( strlen( $i )==2 ){//11,12,25,35,45
                                        if( ($i>10 && $i<20) || ($i>20 && $i<30) ){//11,12,13,14,15..., 21,22,23,24...
                                            $letras = $especiales[$i];
                                        }else {//20,30,31,32,... 40,41,42,43,44,...,50,51...
                                            $numArray = str_split($i); //$i = 20=> [0=>2,1=>0]
                                            $numDecenas = $decenas[ $numArray[0] ];
                                            $numUnidades = $unidades[ $numArray[1] ];
                                            $letras = $numDecenas . ( strlen($numUnidades)>0 ? ' y ' : '' ) . $numUnidades; 
                                        }  
                                    }
                                    $respuesta .= "$i = $letras<br>";
                                }
                                return $respuesta;
                            }
                        }
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</body>
</html>