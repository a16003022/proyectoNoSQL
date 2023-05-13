<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/modelos/Barco.php";
require_once __DIR__ . "/modelos/BarcosModel.php";
require_once __DIR__ . "/modelos/Salida.php";
require_once __DIR__ . "/modelos/SalidasModel.php";
require_once __DIR__ . "/modelos/Persona.php";
require_once __DIR__ . "/modelos/PersonasModel.php";
$pagina = "listarSalidas";
if (isset($_GET["q"])) {
    $pagina = $_GET["q"];
}
switch ($pagina) {
    case "creditos":
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/creditos.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "listarPersonas":
        $cursorPersonas = PersonasModel::obtenerConDatos();
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/listarPersonas.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "listarBarcos":
        $cursorBarcos = BarcosModel::obtenerTodos();
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/listarBarcos.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "listarSalidas":
        $cursorPersonas= PersonasModel::obtenerPorSalidas();
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/listarSalidas.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "agregarBarco":
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/agregarBarco.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "agregarSalida":
        $cursorBarcos = BarcosModel::obtenerTodos();
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/agregarSalida.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "agregarPersona":
        if (!isset($_GET["id"])) {
            exit("No hay id");
        }
        $salida = SalidasModel::obtenerPorId($_GET["id"]);
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/agregarPersona.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "agregarPeces":
        if (!isset($_GET["idSalida"])) {
            exit("No hay id");
        }
        $salida = SalidasModel::obtenerPorId($_GET["idSalida"]);
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/agregarPeces.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "agregarCapturas":
        if (!isset($_GET["idPersona"])) {
            exit("No hay id");
        }
        $persona = PersonasModel::obtenerPorId($_GET["idPersona"]);
        $salida = SalidasModel::obtenerPorId($_GET["idSalida"]);
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/agregarCapturas.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "editarBarco":
        if (!isset($_GET["id"])) {
            exit("No hay id");
        }
        $barco = BarcosModel::obtenerPorId($_GET["id"]);
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/editarBarco.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "editarPersona":
        if (!isset($_GET["id"])) {
            exit("No hay id");
        }
        $persona = PersonasModel::obtenerPorId($_GET["id"]);
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/editarPersona.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "editarSalida":
        if (!isset($_GET["id"])) {
            exit("No hay id");
        }
        $cursorBarcos = BarcosModel::obtenerTodos();
        $salida = SalidasModel::obtenerPorId($_GET["id"]);
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/editarSalida.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "agTripulantes":
        if (!isset($_GET["idSalida"])) {
            exit("No hay id");
        }
        $salida = SalidasModel::obtenerPorId($_GET["idSalida"]);
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/agTripulantes.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "guardarSalida":
        $salida = new Salida($_POST["nombreSalida"], $_POST["idBarco"], $_POST["fechaSalida"], $_POST["totalTripulantes"], $_POST["longitud"], $_POST["latitud"], $_POST["peces"]);
        $idInsertado = SalidasModel::insertar($salida);
        $idBarco= $_POST['idBarco'];
        $cantPeces= $_POST['cantPeces'];
        if ($idInsertado) {
            header("Location: ?q=agTripulantes&idSalida=$idInsertado&idBarco=$idBarco&cantPeces=$cantPeces");
            exit;
        } else {
            echo "Error al insertar, intenta más tarde";
        }
        break;
    case "guardarBarco":
        $barco = new Barco($_POST["nombreBarco"]);
        $result = BarcosModel::insertar($barco);
        if ($result) {
            header("Location: ?q=listarBarcos");
            exit;
        } else {
            echo "Error al insertar, intenta más tarde";
        }
        break;
    case "guardarTripulantes":
        $datos = $_POST['datosTripulantes'];
        $idSalida = $_GET['idSalida'];
        $cantPeces = $_GET['cantPeces'];
        $result = PersonasModel::insertarTodos($datos);
        if ($result) {
            header("Location: ?q=agregarPeces&idSalida=$idSalida&cantPeces=$cantPeces");
            exit;
        } else {
            echo "Error al insertar, intenta más tarde";
        }
        break; 
    case "guardarPersona":
        $persona = new Persona($_POST["idSalida"], $_POST["idBarco"], $_POST["nombre"], $_POST["direccion"], $_POST["telefono"], $_POST["contacto"], $_POST["capturas"]);
        $id = $_POST["id"];
        $result = PersonasModel::actualizar($id, $persona);
        if ($result) {
            header("Location: ?q=listarSalidas");
            exit;
        } else {
            echo "Error al insertar, intenta más tarde";
        }
        break;
    case "guardarNewPersona":
        $persona = new Persona($_POST["idSalida"], $_POST["idBarco"], $_POST["nombre"], $_POST["direccion"], $_POST["telefono"], $_POST["contacto"], $_POST["capturas"]);
        $result = PersonasModel::insertar($persona);
        if ($result) {
            header("Location: ?q=listarSalidas");
            exit;
        } else {
            echo "Error al insertar, intenta más tarde";
        }
        break;
    case "guardarPeces":
        $id = $_POST["id"];
        $salida = new Salida($_POST["nombreSalida"], $_POST["idBarco"], $_POST["fechaSalida"], $_POST["totalTripulantes"], $_POST["longitud"], $_POST["latitud"], $_POST["datosPeces"]);
        $resultado = SalidasModel::actualizarConPeces($id, $salida);
        if ($resultado) {
            header("Location: ?q=listarSalidas");
            exit;
        } else {
            echo "Error al actualizar, intenta más tarde";
        }
        break;
    case "guardarCapturas":
        $id = $_POST["id"];
        $datos= $_POST["datosPeces"];
        $resultado = PersonasModel::actualizarConCapturas($id, $datos);
        if ($resultado) {
            header("Location: ?q=listarPersonas");
            exit;
        } else {
            echo "Error al actualizar, intenta más tarde";
        }
        break;
    case "actualizarBarco":
        $barco = new Barco($_POST["nombreBarco"]);
        $id = $_POST["id"];
        $resultado = BarcosModel::actualizar($id, $barco);
        if ($resultado) {
            header("Location: ?q=listarBarcos");
            exit;
        } else {
            echo "Error al actualizar, intenta más tarde";
        }
        break;
    case "actualizarSalida":
        $id = $_POST["id"];
        $salida = new Salida($_POST["nombreSalida"], $_POST["idBarco"], $_POST["fechaSalida"], $_POST["totalTripulantes"], $_POST["longitud"], $_POST["latitud"], $_POST["datosPeces"]);
        $resultado = SalidasModel::actualizarConPeces($id, $salida);
        if ($resultado) {
            header("Location: ?q=listarSalidas");
            exit;
        } else {
            echo "Error al actualizar, intenta más tarde";
        }
        break;        
    case "eliminarBarco":
        if (!isset($_GET["id"])) {
            exit("No hay id");
        }
        $id = $_GET["id"];
        $resultado = BarcosModel::eliminar($id);
        if ($resultado) {
            header("Location: ?q=listarBarcos");
            exit;
        } else {
            echo "Error al eliminar, intenta más tarde";
        }
        break;
    case "eliminarPersona":
        if (!isset($_GET["id"])) {
            exit("No hay id");
        }
        $id = $_GET["id"];
        $resultado = PersonasModel::eliminar($id);
        if ($resultado) {
            header("Location: ?q=listarSalidas");
            exit;
        } else {
            echo "Error al eliminar, intenta más tarde";
        }
        break;
    case "eliminarSalida":
        if (!isset($_GET["id"])) {
            exit("No hay id");
        }
        $id = $_GET["id"];
        $personas = PersonasModel::eliminarPorIdSalida($id);
        $salida = SalidasModel::eliminar($id);
        if ($salida && $personas) {
            header("Location: ?q=listarSalidas");
            exit;
        } else {
            echo "Error al eliminar, intenta más tarde";
        }
        break;
}
