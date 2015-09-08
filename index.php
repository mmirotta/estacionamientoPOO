<?php

$path = "gestion.php";
require "estacionamiento.php";
estacionamiento::CargarTablaEstacionados();

?>
<!doctype html>
<html lang="en-US">
<head>

  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title> Archivos </title>

  <link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="stylesheet" type="text/css" href="animacion.css">
  <link rel="stylesheet" type="text/css" media="all" href="style.css">
 
  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
  <script type="text/javascript">
  
 
</script>
  <!--script type="text/javascript" src="js/currency-autocomplete.js"></script-->
</head>
	<body>
    <div class="CajaUno animated bounceInDown">

            <form action="<?php echo $path; ?>" method="post" >
            <input type="text" name="patente"  id="autocomplete"/>
            <br>
            <input type="submit" class="MiBotonUTN" value="ingreso"  name="estacionar" />
            <br/>
            <input type="submit" class="MiBotonUTNLinea" value="egreso" name="estacionar" />
          </form>



    </div>
      <div class="CajaEnunciado animated bounceInLeft">
      <?php
        include "tablaestacionados.php";
      ?>
      
    </div>
      		
	</body>
</html>