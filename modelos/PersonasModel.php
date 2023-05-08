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

    public static function obtenerTodos()
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->personas;
        return $coleccion->find(); // Sin criterio de búsqueda
    }

    public static function insertar($persona)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
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

    public static function eliminar($id)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->personas;
        $resultado = $coleccion->deleteOne(
            // El criterio, algo así como where
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
                    "capturas" => $persona->getCapturas(),
                ],
            ]
        );
        # Recuerda que puedes ver a cuántos afectó con $resultado->getModifiedCount()
        return true;
    }

}
?>