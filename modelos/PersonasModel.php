<?php
class PersonasModel
{
    private static function obtenerBaseDeDatos()
    {
        $host = "127.0.0.1";
        $puerto = "27017";
        //$usuario = rawurlencode("parzibyte");
        //$pass = rawurlencode("hunter2");
        $nombreBD = "pescaderia";
        $cadenaConexion ='mongodb://localhost:27017';
        $cliente = new MongoDB\Client($cadenaConexion);
        return $cliente->selectDatabase($nombreBD);
    }
    
    public static function obtenerPorId($id)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->personas;
        return $coleccion->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
    }

    public static function obtenerPorSalidas()
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->groupPorSalidas;
        return $coleccion->find(); // Sin criterio de búsqueda
    }

    public static function obtenerConDatos()
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->personasConDatos;
        return $coleccion->find(); // Sin criterio de búsqueda
    }

    public static function obtenerConDatosPorIdSalida($id)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->personasConDatos;
        return $coleccion->find(['idSalida' => $id]); // por idSalida
    }

    public static function obtenerTodos()
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->personas;
        return $coleccion->find(); // Sin criterio de búsqueda
    }

    public static function insertar($persona)
    {
        // Obtener la salida correspondiente
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccionSalidas = $baseDeDatos->salidas;
        $salida = $coleccionSalidas->findOne([
            "_id" => new MongoDB\BSON\ObjectId($persona->getIdSalida())
        ]);

        // Actualizar el campo totalTripulantes de la salida
        $totalTripulantes = intval($salida->totalTripulantes) + 1;
        $resultado = $coleccionSalidas->updateOne(
            ["_id" => new MongoDB\BSON\ObjectId($persona->getIdSalida())],
            ['$set' => ['totalTripulantes' => strval($totalTripulantes)]]
        );

        //realizar la inserción de una nueva persona
        $coleccion = $baseDeDatos->personas;
        $resultado = $coleccion->insertOne([
            "idSalida" => $persona->getIdSalida(),
            "idBarco" => $persona->getIdBarco(),
            "nombre" => $persona->getNombre(),
            "direccion" => $persona->getDireccion(),
            "telefono" => $persona->getTelefono(),
            "contacto" => $persona->getContacto(),
            "capturas" => $persona->getCapturas(),
        ]);
        return $resultado->getInsertedCount() === 1;
    }

    public static function insertarTodos($personas)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->personas;
        $datos = [];
        foreach ($personas as $persona) {
            $datos[] = [
                "idSalida" => $persona['idSalida'],
                "idBarco" => $persona['idBarco'],
                "nombre" => $persona['nombre'],
                "direccion" => $persona['direccion'],
                "telefono" => $persona['telefono'],
                "contacto" => $persona['contacto'],
                "capturas" => $persona['capturas'],
            ];
        }
    $resultado = $coleccion->insertMany($datos);
    return $resultado->getInsertedCount() === count($datos);
    }

    public static function eliminar($id, $idSalida)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $personasColeccion = $baseDeDatos->personas;
        $salidasColeccion = $baseDeDatos->salidas;
        
        // 1. Obtener el valor actual del campo totalTripulantes y convertirlo a numérico
        $salida = $salidasColeccion->findOne(
            ["_id" => new MongoDB\BSON\ObjectId($idSalida)],
            ["projection" => ["totalTripulantes" => 1]]
        );
        $totalTripulantes = intval($salida->totalTripulantes);

        // 2. Restar uno al valor obtenido
        $nuevoTotalTripulantes = $totalTripulantes - 1;

        // 3. Actualizar el campo totalTripulantes de la salida correspondiente
        $salidasColeccion->updateOne(
            ["_id" => new MongoDB\BSON\ObjectId($idSalida)],
            ['$set' => ["totalTripulantes" => strval($nuevoTotalTripulantes)]]
        );

        // 4. Eliminar el documento en la colección Personas
        $resultado = $personasColeccion->deleteOne(
            ["_id" => new MongoDB\BSON\ObjectId($id)]
        );
        
        return $resultado->getDeletedCount() === 1;
    }
    
    
    public static function actualizar($id, $persona)
    {
        echo "id => $id";
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->personas;
        $resultado = $coleccion->updateOne(
            // El criterio, algo así como where
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            // Nuevos valores
            [
                '$set' => [
                    "idSalida" => $persona->getIdSalida(),
                    "idBarco" => $persona->getIdBarco(),
                    "nombre" => $persona->getNombre(),
                    "direccion" => $persona->getDireccion(),
                    "telefono" => $persona->getTelefono(),
                    "contacto" => $persona->getContacto(),
                ],
            ]
        );
        # Recuerda que puedes ver a cuántos afectó con $resultado->getModifiedCount()
        return true;
    }

    public static function actualizarConCapturas($id, $datos)
    {
        echo "id => $id";
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->personas;
        $peces = array();
        foreach ($datos as $pez) {
            $pezArray = array(
                "id" => $pez["id"],
                "nombre" => $pez["nombre"],
                "cantidad" => $pez["cantidad"],
                "precio"=> $pez["precio"],
            );
            array_push($peces, $pezArray);
        }
        $resultado = $coleccion->updateOne(
            // El criterio, algo así como where
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            // Nuevos valores
            [
                '$set' => [
                    "capturas" => $peces,
                ],
            ]
        );
        return true;
    }

    public static function eliminarPorIdSalida($idSalida)
    {
    $baseDeDatos = self::obtenerBaseDeDatos();
    $coleccion = $baseDeDatos->personas;
    $resultado = $coleccion->deleteMany(
        // El criterio, algo así como where
        ["idSalida" => $idSalida]
    );
    return $resultado->getDeletedCount();
    }


}
?>