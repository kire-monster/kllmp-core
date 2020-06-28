<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kllmp</title>

  <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/css/scrolling-nav.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-darkly.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Kllmp</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Acerca</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
          </li>
          <li class="nav-item">
            <?php if(isset($_SESSION['usuario'])): ?>
              <a class="nav-link" href="/index.php/admin">Administrador</a>
            <?php else: ?>
              <a class="nav-link" href="/index.php/login">Login</a>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Welcome To The Jungle</h1>
      <p class="lead">we've got fun and games</p>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Acerca de la pagina</h2>
          <p class="lead">
            Esta página es con fines personales (entrenamiento/ocio), creada por un solo programador
          </p>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Servicios</h2>
          <p class="lead">
            Compartire algunos plugin's que les puedan servir.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Conctato</h2>
          <p class="lead">
            Email's
          </p>
          <ul class="list-group">
            <li class="list-group-item">Email: <code>devs@kllmp.org</code></li>
            <li class="list-group-item">Email: <code>hell-dxd@hotmail.com</code></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; kllmp.org 2020</p>
    </div>
  </footer>

  <script src="/assets/jquery/jquery.min.js"></script>
  <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/jquery-easing/jquery.easing.min.js"></script>
  <script src="/assets/js/scrolling-nav.js"></script>

</body>

</html>
