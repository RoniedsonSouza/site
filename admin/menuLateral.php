<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }
    require_once 'classes/usuarios.php';
    $conec = new Usuario;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="sortcut icon" href="/Site/img/icon-maintence.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administração Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/adminSite.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../admin/adminSite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a>Menu do Sistema</a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header">
            <div class="user-pic">
                <?php 
                    $conn = mysqli_connect("localhost","root","");
                    mysqli_select_db($conn, "projeto_login");

                    $queryID = "SELECT id_usuario FROM usuarios";
                    $queryquery = mysqli_query($conn, $queryID);
                    // $queryqueryquery = mysqli_fetch_array($queryquery);
                    // $query = $queryqueryquery['id_usuario'];
                    $query = $_SESSION['id_usuario'];

                    $selectimg = "SELECT arquivo FROM ft_user WHERE id_user = '$query'";
                    $img = mysqli_query($conn, $selectimg);
                    $uuu = mysqli_fetch_array($img);
                ?>
                <img class="img-responsive img-rounded" src="classes/imgUser/<?php echo $uuu['arquivo']; ?>"
                    alt="User picture">
            </div>
            <div class="user-info">
                <?php 
            $conec->conectar("projeto_login", "localhost", "root", "");
            $id_usuario = $_SESSION['id_usuario'];
            $column = $pdo->prepare("SELECT nome FROM usuarios WHERE id_usuario = ".$id_usuario);
            $column->execute();
            while($nome = $column->fetch(PDO::FETCH_ASSOC)):
            ?>
                <span class="user-name">
                    <?php echo $nome['nome']; ?>
                </span>
                <?php
              endwhile;
            ?>
                <span class="user-role">Usuário</span>
                <span class="user-status">
                </span>
            </div>
        </div>
        <!-- sidebar-header  -->
        <!-- <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div> -->
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>Geral</span>
                </li>
                <li>
                    <a href="../admin/adminSite.php">
                        <i class="fa fa-columns"></i>
                        <span>Dashboard</span>
                        <!-- <span class="badge badge-pill badge-warning">New</span> -->
                    </a>
                </li>
                <li>
                    <!-- <a href="../index.php">
                        <i class="fa fa-eye"></i>
                        <span>Visitar Site</span>
                        <span class="badge badge-pill badge-danger">3</span>
                    </a> -->
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-sitemap"></i>
                        <span>Site</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="../index.php">
                                    <i class="fa fa-eye"></i>
                                    <span>Visitar Site</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-cog"></i>
                                    <span>Configurações do Site</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Products

                  </a>
                </li>
                <li>
                  <a href="#">Orders</a>
                </li>
                <li>
                  <a href="#">Credit cart</a>
                </li>
              </ul>
            </div> -->
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>Empresa</span>
                        <!-- <span class="badge badge-pill badge-warning">New</span> -->
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="usuarios.php">
                                    <i class="fa fa-users"></i>
                                    <span>Usuarios</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="../admin/produtos.php">
                        <i class="fas fa-tags"></i>
                        <span>Produtos</span>
                    </a>
                    <!-- <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">General</a>
                </li>
                <li>
                  <a href="#">Panels</a>
                </li>
                <li>
                  <a href="#">Tables</a>
                </li>
                <li>
                  <a href="#">Icons</a>
                </li>
                <li>
                  <a href="#">Forms</a>
                </li>
              </ul>
            </div> -->
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-chart-line"></i>
                        <span>Estatísticas</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                
                                <a href="../logistica.php"><i class="fas fa-truck"></i>Logística</a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-dollar-sign"></i>Meta</a>
                            </li>
                            <li>
                                <a href="#"> <i class="fas fa-list"></i>Histórico</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="header-menu">
                    <span>Extra</span>
                </li>
                <!-- <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Documentation</span>
              <span class="badge badge-pill badge-primary">Beta</span>
            </a>
          </li> -->
                <li>
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Calendario</span>
                    </a>
                </li>
                <li>
                    <a href="../sair.php">
                        <i class="fa fa-sign-out-alt"></i>
                        <span>Sair</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <!-- <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="#">
        <i class="fa fa-power-off"></i>
      </a>
    </div> -->
</nav>