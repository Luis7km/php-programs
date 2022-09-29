<!DOCTYPE html>
<html>
    <head>
        <title>Parcial #1</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <center>
        <?php
            if(array_key_exists('enviar', $_POST)) {
                if(($_REQUEST['Matriz']%2) != 0) {
                    echo "Debe introducir un numero par.";
                } else {
                    $matriz = array();

                    $salvacion = 0;
                    $suma = 0;
                    $multiplicacion = 1;
                    $random;

                    for($i=0;$i<pow($_REQUEST['Matriz'],2);$i++) {
                        if($i == 0 || $i == 0 + $_REQUEST['Matriz']-1 || $i == pow($_REQUEST['Matriz'],2) - $_REQUEST['Matriz'] || $i == pow($_REQUEST['Matriz'],2)-1) {
                            $random = rand(1,100);
                            $suma = $suma + $random;
                            $multiplicacion = $multiplicacion * $random;
                            array_push($matriz, $random);
                        } else {
                            array_push($matriz, 0);
                        }
                    }

                    echo "<table border=1>";
                    for($i=0;$i<pow($_REQUEST['Matriz'],2);$i++) {
                        if($i%$_REQUEST['Matriz'] == 0) {
                            echo "<tr>";
                            $salvacion = $i;
                        }
                        echo "<td>$matriz[$i]</td>";
                        if($i == $salvacion + $_REQUEST['Matriz']) {
                            echo "</tr>";                                                        
                        }
                    }
                    echo "</table>";

                    echo "<br>La suma de los valores de las esquinas es: $suma <br>";
                    echo "<br>La multiplicacion de los valores de las esquinas es: $multiplicacion <br>";
                }
            } else {
        ?>
        </center> 
        <form action="Generar_matriz.php" method="POST">
            Introduzca el tamaño de la matriz: <input type="text" name="Matriz"><br>
            <input type="submit" name="enviar" value="Aceptar">
        </form>
        <?php
            }
        ?>
    </body>
</html>