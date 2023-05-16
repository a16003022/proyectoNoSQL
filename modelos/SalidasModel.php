<?php
class SalidasModel
{
    private static function obtenerBaseDeDatos()
    {
        $host = "127.0.0.1";
        $puerto = "27017";
        //$usuario = rawurlencode("parzibyte");
        //$pass = rawurlencode("hunter2");
        $nombreBD = "pescaderia";
        $cadenaConexion ='mongodb+srv://hnarvaez:hnarvaez@cluster0.z7brgwz.mongodb.net/log?retryWrites=true&w=majority';
        $cliente = new MongoDB\Client($cadenaConexion);
        return $cliente->selectDatabase($nombreBD);
    }

    public static function insertar($salida)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->salidas;
        $resultado = $coleccion->insertOne([
            "nombreSalida" => $salida->getNombreSalida(),
            "idBarco" => $salida->getIdBarco(),
            "fechaSalida" => $salida->getFechaSalida(),
            "totalTripulantes" => $salida->getTotalTripulantes(),
            "longitud" => $salida->getLongitud(),
            "latitud" => $salida->getLatitud(),
            "peces" => $salida->getPeces(),
        ]);
        return $resultado->getInsertedId(); // Devolverá el ID del documento que se insertó
    }
    
    public static function obtenerPorId($id)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->salidas;
        return $coleccion->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
    }

    public static function obtenerTodos()
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->salidas;
        return $coleccion->find(); // Sin criterio de búsqueda
    }

    public static function obtenerConCapturas()
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->salidasConCapturas;
        return $coleccion->find(); // Sin criterio de búsqueda
    }

    public static function actualizar($id, $salida)
    {
        echo "id => $id";
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->salidas;
        $resultado = $coleccion->updateOne(
            // El criterio, algo así como where
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            // Nuevos valores
            [
                '$set' => [
                    "nombreSalida" => $salida->getNombreSalida(),
                    "idBarco" => $salida->getIdBarco(),
                    "fechaSalida" => $salida->getFechaSalida(),
                    "totalTripulantes" => $salida->getTotalTripulantes(),
                    "longitud" => $salida->getLongitud(),
                    "latitud" => $salida->getLatitud(),
                ],
            ]
        );
        # Recuerda que puedes ver a cuántos afectó con $resultado->getModifiedCount()
        return true;
    }

    public static function actualizarPosicion($id, $longitud, $latitud)
    {
        echo "id => $id";
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->salidas;
        $resultado = $coleccion->updateOne(
            // El criterio, algo así como where
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            // Nuevos valores
            [
                '$set' => [
                    "longitud" => $longitud,
                    "latitud" => $latitud,
                ],
            ]
        );
        # Recuerda que puedes ver a cuántos afectó con $resultado->getModifiedCount()
        return true;
    }

    public static function actualizarConPeces($id, $salida)
    {
        echo "id => $id";
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->salidas;
        $peces = array();
        foreach ($salida->getPeces() as $pez) {
            $pezArray = array(
                "id" => $pez["id"],
                "nombre" => $pez["nombre"],
                "precio" => $pez["precio"],
            );
            array_push($peces, $pezArray);
        }
        $resultado = $coleccion->updateOne(
            // El criterio, algo así como where
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            // Nuevos valores
            [
                '$set' => [
                    "nombreSalida" => $salida->getNombreSalida(),
                    "idBarco" => $salida->getIdBarco(),
                    "fechaSalida" => $salida->getFechaSalida(),
                    "totalTripulantes" => $salida->getTotalTripulantes(),
                    "longitud" => $salida->getLongitud(),
                    "latitud" => $salida->getLatitud(),
                    "peces" => $peces,
                ],
            ]
        );
        return true;
    }

    public static function cambiosPeces($id, $datos)
    {
        echo "id => $id";
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->salidas;
        $peces = array();
        foreach ($datos as $pez) {
            $pezArray = array(
                "id" => $pez["id"],
                "nombre" => $pez["nombre"],
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
                    "peces" => $peces,
                ],
            ]
        ); 

    return true;
    }

    public static function eliminar($id)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->salidas;
        $resultado = $coleccion->deleteOne(
            // El criterio, algo así como where
            ["_id" => new MongoDB\BSON\ObjectId($id)]
        );
        return $resultado->getDeletedCount() === 1;
    }
}
