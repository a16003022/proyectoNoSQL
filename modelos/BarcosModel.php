<?php
class BarcosModel
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

    public static function insertar($barco)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->barcos;
        $resultado = $coleccion->insertOne([
            "nombreBarco" => $barco->getNombreBarco(),
        ]);
        return $resultado->getInsertedCount() === 1;
    }
    
    public static function obtenerPorId($id)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->barcos;
        return $coleccion->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
    }

    public static function obtenerTodos()
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->barcos;
        return $coleccion->find(); // Sin criterio de búsqueda
    }

    public static function actualizar($id, $barco)
    {
        echo "id => $id";
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->barcos;
        $resultado = $coleccion->updateOne(
            // El criterio, algo así como where
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            // Nuevos valores
            [
                '$set' => [
                    "nombreBarco" => $barco->getNombreBarco(),
                ],
            ]
        );
        # Recuerda que puedes ver a cuántos afectó con $resultado->getModifiedCount()
        return true;
    }

    public static function eliminar($id)
{
    $baseDeDatos = self::obtenerBaseDeDatos();
    $coleccionBarcos = $baseDeDatos->barcos;
    $coleccionSalidas = $baseDeDatos->salidas;

    // Verifica si hay alguna salida que haga referencia al barco que se quiere eliminar
    $salidaConBarco = $coleccionSalidas->findOne(["idBarco" => $id]);
    if (!empty($salidaConBarco)) {
        throw new Exception("No se puede eliminar el barco ya que está relacionado a una salida registrada.");
    }

    // Si no hay salidas que hagan referencia al barco, procede a eliminar el documento de la colección "barcos"
    $resultado = $coleccionBarcos->deleteOne(
        // El criterio, algo así como where
        ["_id" => new MongoDB\BSON\ObjectId($id)]
    );
    return $resultado->getDeletedCount() === 1;
}

}
