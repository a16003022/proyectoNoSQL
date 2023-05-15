<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anzuelo Inc</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">

</head>
<style>
  .textNav{
    font-weight:bold;
    font-family: 'Quicksand', sans-serif;
    color: #004880;
  }
  .bg{
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("css/img/fondo2.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    font-family: 'Quicksand', sans-serif;

  }
</style>
<body class="bg" style="min-height: 100vh;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light textNav">
    <a class="navbar-brand" target="_blank" href=""><img src="css/img/logo.png" width="100" height="70"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php echo isset($_GET["q"]) && $_GET["q"] === "listarBarcos" ? "active": "" ?>">
          <a class="nav-link" href="?q=listarBarcos">Barcos</a>
        </li>
        <li class="nav-item <?php echo isset($_GET["q"]) && $_GET["q"] === "listarSalidas" ? "active": "" ?>">
          <a class="nav-link" href="?q=listarSalidas">Salidas</a>
        </li>
        <li class="nav-item <?php echo isset($_GET["q"]) && $_GET["q"] === "listarCapturas" ? "active": "" ?>">
          <a class="nav-link" href="?q=listarCapturas">Capturas</a>
        </li>
        <li class="nav-item <?php echo isset($_GET["q"]) && $_GET["q"] === "posiciones" ? "active": "" ?>">
          <a class="nav-link" href="?q=posiciones">Posiciones</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container p-5 text-white">
