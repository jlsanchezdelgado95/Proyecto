<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=CSS . DS?>estilos.css" />
</head>
<body>
<?php
    include "menu.php";
?>
<div id="content">
    <?php
        $idjugador = $this->params["idJugador"];//Cambiar y llamar al PDO Global
        $global = core\Globals::getInstance();
        $mysql = $global->get("mysql");
        $sql = 'SELECT * FROM jugadores WHERE codigo=:codigo';
            $ps = $mysql->prepare($sql);
            $ps->bindParam(':codigo', $idjugador, PDO::PARAM_INT);
            $ps->execute();
            echo "<table border='1'>";
            foreach ($ps->fetchAll(PDO::FETCH_ASSOC) as $row) {
                foreach ($row as $key => $value) {
                    echo '<tr><th>' . $key . '</th><td>' . $value . '</td></tr>';
                } 
            }
            echo "</table>";
        
    ?>
</div>    
</body>
</html>