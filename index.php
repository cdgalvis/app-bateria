<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="./css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="body">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-xl-8">
                <div class="card">

                    <div class="card-header text-center">
                        Login
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-login" role="tabpanel" aria-labelledby="list-login-list">
                                <form action="./config/authenticate.php" method="POST">

                                <?php 
                                    $mensajes = array(
                                        0=>"No se pudo realizar la acción, comunicate con el administrador",
                                        1=>"Nombre de usuario o contraseña no válidos, Inténtelo de nuevo",
                                        2=>"Por favor, inicie sesión para acceder a esta área",
                                        3=>"No se puede registrar debido a que ya existe una cuenta con el mismo correo electronico",
                                        4=>"No tienes acceso a esta area, Inicia sesion nuevamente",
                                        5=>"Se registro correctamente"
                                    );

                                    $mensaje_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
                                    $mensaje='';

                                    if($mensaje_id=='5'){
                                        $clase = 'alert-success';
                                    }else{
                                        $clase = 'alert-danger';
                                    }

                                    if ($mensaje_id != '') {
                                        $mensaje = $mensajes[$mensaje_id];
                                    }

                                    if ($mensaje!='') echo "<div class='alert $clase' role='alert'> $mensaje </div>";
                                    
                                ?>  
                                
                                    <div class="form-group">
                                        <label for="username">Usuario:</label>
                                        <input type="username" class="form-control" id="username" name="username" aria-describedby="usernameHelp" required>
                                        <small id="usernameHelp" class="form-text text-muted">Nunca compartiremos su usuario con nadie más.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                </form>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>

    <script src="./js/jquery.slim.min.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.min.js" ></script>
    <script src="./js/validaciones.js"></script>                                
</body>
</html>