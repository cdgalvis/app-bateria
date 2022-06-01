
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #009188;">
  <a class="navbar-brand" href="#">RIESGO PSICOSOCIAL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav mr-auto">
      <?php     
          foreach ($resultGrupos as $grupos) {
            echo "<li class='nav-item dropdown'>";
            if($grupos['gru_visible'] == "0"){
              echo "  <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>".$grupos['gru_nombre']."</a>";
            }

            $conexion = new Database;  
            $resultModulos = $conexion->DatosModulos($usuario, $grupos['id']);

              echo "  <div class='dropdown-menu' aria-labelledby='navbarDropdown'>";
              foreach ($resultModulos as $modulos) {
                if($modulos['users_id'] == $usuario){
                  if($modulos['mod_visible'] == "0"){
                    echo "<a class='dropdown-item' href='".ROOT.$modulos['mod_url']."'>".$modulos['mod_nombre']."</a>";
                  }
                }
              }
              echo "  </div>";

            echo "</li>";
          }
      ?>

      

    </ul>

    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['sess_nombre'];?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../config/logout.php">Cerrar sesión</a>
            </div>
        </li>
    </ul>
  </div>
</nav>