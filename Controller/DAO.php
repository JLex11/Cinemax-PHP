<?php

class Pelicula {
    public static function listar($opc, $campo, $valor) {
        include "../Connection/conexion.php";
        
        if ($opc == '1') {
            $sql = "SELECT\n"
            . "    pelicula.idpelicula,\n" 
            . "    pelicula.titulooriginal,\n"      
            . "    pelicula.titulolatino,\n"
            . "    pelicula.foto,\n"
            . "    pelicula.lanzamiento,\n"
            . "    pelicula.duracion,\n"
            . "    pelicula.resena,\n"
            . "    pelicula.estado,\n"
            . "    tipo.tipo,\n"
            . "    pais.nombre AS pais,\n"
            . "    estadisticas.cantvistas,\n"
            . "    estadisticas.cantlikes,\n"
            . "    estadisticas.cantcomentarios\n"
            . "FROM\n"
            . "    pelicula\n"
            . "INNER JOIN tipo ON pelicula.idtipo = tipo.idtipo\n"
            . "INNER JOIN pais ON pelicula.idpais = pais.idpais\n"
            . "LEFT JOIN estadisticaspelicula ON pelicula.idpelicula = estadisticaspelicula.idpelicula\n"
            . "LEFT JOIN estadisticas ON estadisticaspelicula.idestadisticas = estadisticas.idestadisticas\n"
            . "ORDER BY pelicula.estado ASC;";
        }

        $datos = array();
        $consulta = mysqli_query($cnn, $sql);
        $rows = mysqli_num_rows($consulta);

        for ($i = 0; $i < $rows; $i++) {
            $datos[$i] = $consulta->fetch_assoc();
        }
        return $datos;
    }
}

class Actor {
    public static function listar($opc, $campo, $valor) {
        include "../Connection/conexion.php";
        
        if ($opc == '61') {
            $sql = "SELECT * FROM actor";
        }

        $datos = array();
        $consulta = mysqli_query($cnn, $sql);
        $rows = mysqli_num_rows($consulta);

        for ($i = 0; $i < $rows; $i++) {
            $datos[$i] = $consulta->fetch_assoc();
        }
        return $datos;
    }
}

class Director {
    public static function listar($opc, $campo, $valor) {
        include "../Connection/conexion.php";
        
        if ($opc == '101') {
            $sql = "SELECT * FROM director";
        }

        $datos = array();
        $consulta = mysqli_query($cnn, $sql);
        $rows = mysqli_num_rows($consulta);

        for ($i = 0; $i < $rows; $i++) {
            $datos[$i] = $consulta->fetch_assoc();
        }
        return $datos;
    }
}

class Genero {
    public static function listar($opc, $campo, $valor) {
        include "../Connection/conexion.php";
        
        if ($opc == '141') {
            $sql = "SELECT * FROM genero";
        }

        $datos = array();
        $consulta = mysqli_query($cnn, $sql);
        $rows = mysqli_num_rows($consulta);

        for ($i = 0; $i < $rows; $i++) {
            $datos[$i] = $consulta->fetch_assoc();
        }
        return $datos;
    }
}

?>