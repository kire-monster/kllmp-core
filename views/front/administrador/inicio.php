<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kllmp - Administrador</title>
        <link href="/assets/css/sb-admin.css" rel="stylesheet"/>
        <link href="/assets/css/bootstrap-darkly.min.css" rel="stylesheet"/>
        <link href="/assets/css/sb-admin-custom.css" rel="stylesheet"/>
        <link href="/assets/fontawesome/css/all.css" rel="stylesheet"/>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/index.php/admin">Panel de control</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
              <i class="fas fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="">Settings</a>
                        <a class="dropdown-item" href="/index.php/login/out">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="">
                              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                              Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                              <div class="sb-nav-link-icon">
                                <i class="fas fa-columns"></i>
                              </div>
                              Layouts
                              <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                              </div>
                            </a>
                            <div class="collapse" id="collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                  <a class="nav-link" href="">Static Navigation</a>
                                  <a class="nav-link" href="">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages">
                              <div class="sb-nav-link-icon">
                                <i class="fas fa-book-open"></i>
                              </div>
                              Pages
                              <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                              </div>
                            </a>
                            <div class="collapse" id="collapsePages">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth">
                                      Authentication
                                      <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth">
                                        <nav class="sb-sidenav-menu-nested nav">
                                          <a class="nav-link" href="">Login</a>
                                          <a class="nav-link" href="">Register</a>
                                          <a class="nav-link" href="">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError">
                                      Error
                                      <div class="sb-sidenav-collapse-arrow">
                                        <i class="fas fa-angle-down"></i>
                                      </div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError">
                                        <nav class="sb-sidenav-menu-nested nav">
                                          <a class="nav-link" href="">401 Page</a>
                                          <a class="nav-link" href="">404 Page</a>
                                          <a class="nav-link" href="">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lista de modulos</h1>
                        <div class="row">
<?php if(isset($modulos)): ?>
  <?php if($modulos->Fetch()): ?>
    <?php do{ ?>

                          <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title"><?php echo $modulos->Registro['nombre'] ?></h4>
                                </div>
                                <div class="card-footer">
                                  <p class="card-text">
                                    <b>fecha liberacion:</b> <?php echo $modulos->Registro['fecha'] ?> &nbsp;
                                    <a href="<?php echo $modulos->Registro['ruta'] ?>" class="btn btn-success">Ir</a>
                                  </p>

                                </div>
                            </div>
                          </div>

    <?php }while($modulos->Fetch()); ?>
  <?php else: ?>

                          <div class="col-md-12">
                            <h3>No hay modulos</h3>
                          </div>

  <?php endif; ?>
<?php endif; ?>
                        </div>

                    </div>
                </main>
            </div>
        </div>
        <script src="/assets/jquery/jquery.min.js"></script>
        <script src="/assets/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/assets/js/sb-admin.js"></script>
    </body>
</html>
