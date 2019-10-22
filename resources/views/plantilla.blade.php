<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
   <link href="css/carousel.css" rel="stylesheet">

   <title>Home</title>

  </head>

  <body>
    <header>
  
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand mb-0 h1" href="/">Event hall</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" 
  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/services">Servicios<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav- active">
        <a class="nav-link" href="#">Registrarse</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Iniciar sesión</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contacto</a>
      </li>
    </ul>
  </div>
    </nav>
</header>
<main>
@yield('agregar')
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Inicio</a></p>
    <p>Event hall "I can do all things"</p>
    <a href="#">Contacto</a>
  </footer>
</main>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>