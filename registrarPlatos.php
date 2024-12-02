<?php 
require_once('helpers/dd.php');
require_once('controladores/funciones.php');

$errores = []; 

if ($_POST) {
    
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];

    $errores = validarPlato($_POST, $_FILES);

    $bd = conexion('localhost', 'restaurant', 'root', ''); // Ajusta según tu configuración

if ($bd === null) {
    echo "Error al establecer la conexión a la base de datos.";
    exit; // Detén la ejecución si la conexión falla
}

guardarPlato($bd, 'dishes', $_POST, $avatar);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">

    <title>EP3</title>
</head>
<body>
<body>
    <div class="container-fluid">
    <?php require_once('partial/navBar.php') ;?>
        <section class="row">
        <article class="col-12">
          <h2 class="display-4 text-white bg-info text-center pt-5">Registro de Platos</h2>
        </article>

      </section>

        <section class="bg-home pt-4">
            <div class="container">
                <div class="row" >
                    <div class="col-8 mx-auto bg-light ">
                        <?php if(count($errores) > 0) : ?>
                            <ul class="alert alert-danger">
                                <?php foreach ($errores as $key => $error) :?>
                                    <li><?= $error?></li>
                                <?php endforeach; ?>
                            </ul>    
                        <?php endif;?>                
                        <div class="signup-form">
                            <form action="" method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?= isset($nombre) ? $nombre : '';?>" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="descripcion" placeholder="Descripcion" value="<?= isset($descripcion) ? $descripcion : '';?>">
                                </div>	
                                <div class="form-group">
                                    <input type="text" class="form-control" name="precio" placeholder="Precio" value="<?= isset($precio) ? $precio : '';?>">
                                    <label for="price" class="form-label">Precio (20-90 soles)</label>
                                </div>
                                <div class="form-group" name="descuento" placeholder="Descuento" value="<?= isset($descuento) ? $descuento : '';?>">
                                    <label for="discount" class="form-label">Descuento</label>
                                        <select class="form-select" id="discount" name="descuento">
                                            <option value="">Seleccione un descuento</option>
                                            <option value="10">10%</option>
                                            <option value="15">15%</option>
                                            <option value="20">20%</option>
                                        </select>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Avatar</label>
                                    <input class="form-control" type="file" id="formFile" name="avatar">
                                </div>       
                                <div class="form-group">
                                    <button type="submit" class="btn btn btn-info">Registrar</button>
                                    
                                </div>
                            </form>
                            
                        </div>
                    </div>                        
                    </div>
                </div>
            </div>
        </section>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</body>
</html>

