<?php

/*
 * Copyright (C) 2017 Matías Sotomayor Ramos
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Descripción de la clase 'Dao.php'.
 *
 * La clase Dao.php gestiona las conexiones a la base de datos y los métodos
 * que implementan las consultas SQL necesarias para la obtención de los datos
 * y la persistencia de los mismos.
 *
 * @author Matías Sotomayor Ramos
 */
class Dao {
    /**
     * Base de Datos Usuarios de la App:
     *
     *  CREATE TABLE dev_age_use (
     *  id int(10) NOT NULL AUTO_INCREMENT,
     *  email varchar(256) NOT NULL,
     *  password varchar(256) NOT NULL,
     *  PRIMARY KEY (id)
     *  )
     */
    /**
     * Base de Datos Desarrolladores:
     *
     *  CREATE TABLE dev_age_dev (
     *  id int(10) NOT NULL AUTO_INCREMENT,
     *  dni varchar(10) NOT NULL,
     *  nombre varchar(50) NOT NULL,
     *  apellidos varchar(50) NOT NULL,
     *  email varchar(50) NOT NULL,
     *  especialidad varchar(256) NOT NULL,
     *  PRIMARY KEY (id)
     *  )
     */

    /**
     * protected static function ejecutaConsulta($sql)
     *
     * Realiza la conexión a la base de datos mediante PDO, especificando el
     * servidor, nombre de la base de datos, usuario y contraseña de la misma.
     * Devuelve el resultado de la consulta que tiene como parámetro de entrada.
     *
     * @param type $sql
     * @return type
     */
    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=wstest1";
        $usuario = 'root';
        $contrasena = '';
        $devage = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
        if (isset($devage)) {
            $resultado = $devage->query($sql);
        }
        return $resultado;
    }

    /**
     * public static function verificaEmailUsuario($email)
     *
     * Verificamos el email de usuario en la base de datos.
     *
     * Definimos la consulta sql y la enviamos como parametro al método propio
     * de la clase Dao:
     * self::ejecutaConsulta ($sql);
     * Definimos la variable $verificado y le asignamos el valor false. Si tiene
     * datos la consulta, mediante fetch obtenemos la fila devuelta en la consulta,
     * existe un registro que cumpla la condición, tenemos usuario registrado,
     * por lo que asignamos el valor de $verificado a true y la retornamos. Si
     * no tenemos datos, retornamos el valor inicial de $verificado, el valor false
     * lo que indica que no existe un registro con ese usuario.
     *
     * @param type $email
     * @return boolean
     */
    public static function verificaEmailUsuario($email) {
        $sql = "SELECT * FROM `dev_age_use` ";
        $sql .= "WHERE email='" . $email . "';";
        $resultado = self::ejecutaConsulta($sql);
        $verificado = false;
        if (isset($resultado)) {
            $fila = $resultado->fetch();
            if ($fila !== false) {
                $verificado = true;
            }
        }
        return $verificado;
    }

    /**
     * public static function logIn($email, $password)
     *
     * Verificamos el email y password del usuario en la base de datos.
     *
     * Definimos la consulta sql y la enviamos como parametro al método propio
     * de la clase Dao:
     * self::ejecutaConsulta ($sql);
     * Definimos la variable $verificado y le asignamos el valor false. Si tiene
     * datos la consulta, mediante fetch obtenemos la fila devuelta en la consulta,
     * existe un registro que cumpla la condición, tenemos usuario registrado,
     * por lo que asignamos el valor de $verificado a true y la retornamos. Si
     * no tenemos datos, retornamos el valor inicial de $verificado, el valor false
     * lo que indica que no existe un registro con ese usuario.
     *
     * @param type $email
     * @param type $password
     * @return boolean
     */
    public static function logIn($email, $password) {
        $sql = "SELECT * FROM `dev_age_use` ";
        $sql .= "WHERE email='" . $email . "' AND password='" . $password . "';";
        $resultado = self::ejecutaConsulta($sql);
        $verificado = false;
        if (isset($resultado)) {
            $fila = $resultado->fetch();
            if ($fila !== false) {
                $verificado = true;
            }
        }
        return $verificado;
    }

    /**
     * public static function signUp($email, $password)
     *
     * Grabamos los datos de un nuevo usuario en la base de datos.
     *
     * Si las variables $email, $password están definidas y no son null, definimos
     * la consulta sql y la enviamos como parametro al método propio de la clase Dao:
     * self::ejecutaConsulta ($sql);
     * Este método realiza la inserción de la fila en la base de datos. Si alguna
     * de las variables no estuviera definida correctamente, no se realiza la
     * inserción de la fila en la tabla. Devuelve true si se ha realizado la
     * consulta, y false en caso de no realizarse correctamente.
     *
     * @param type $email
     * @param type $password
     * @return boolean
     */
    public static function signUp($email, $password) {
        if (isset($email) && isset($password)) {
            $sql = "INSERT INTO `dev_age_use` (`email`, ";
            $sql.="`password`) VALUES ('" . $email . "', '" . $password . "')";
            $resultado = self::ejecutaConsulta($sql);
            $verificado = false;
            if ($resultado) {
                $verificado = true;
            }
        }
        return $verificado;
    }

    /**
     * public static function verificaEmailDesarrollador($email)
     *
     * Verificamos el email del desarrollador en la base de datos.
     *
     * Definimos la consulta sql y la enviamos como parametro al método propio
     * de la clase Dao:
     * self::ejecutaConsulta ($sql);
     * Definimos la variable $verificado y le asignamos el valor false. Si tiene
     * datos la consulta, mediante fetch obtenemos la fila devuelta en la consulta,
     * existe un registro que cumpla la condición, tenemos usuario registrado,
     * por lo que asignamos el valor de $verificado a true y la retornamos. Si
     * no tenemos datos, retornamos el valor inicial de $verificado, el valor false
     * lo que indica que no existe un registro con ese usuario.
     *
     * @param type $email
     * @return boolean
     */
    public static function verificaEmailDesarrollador($email) {
        $sql = "SELECT * FROM `dev_age_dev` ";
        $sql .= "WHERE email='" . $email . "';";
        $resultado = self::ejecutaConsulta($sql);
        $verificado = false;
        if (isset($resultado)) {
            $fila = $resultado->fetch();
            if ($fila !== false) {
                $verificado = true;
            }
        }
        return $verificado;
    }

    /**
     * public static function listado()
     *
     * Obtenemos un listado de los usuarios de la aplicación y sus especialidades.
     *
     * Definimos la consulta sql y la enviamos como parametro al método propio
     * de la clase Dao:
     * self::ejecutaConsulta ($sql);
     * Si tiene datos, mediante fetch obtenemos las filas devueltas en la consulta
     * y creamos un objeto adaptado progresivo con los datos. Finalmente almacenamos
     * todos los objetos en el array $listado y lo retornamos.
     *
     * @return type
     */
    public static function listado() {
        $sql = "SELECT `dni`, `nombre`, `apellidos`, `email`, ";
        $sql.= "`especialidad` FROM `dev_age_dev`;";
        $resultado = self::ejecutaConsulta($sql);
        $listado = array();
        $i = 0;
        if ($resultado) {
            $row = $resultado->fetch();
            while ($row != null) {
                $format = "developer" . (String) $i;
                $listado[$format] = array();
                $listado[$format]["dni"] = $row['dni'];
                $listado[$format]["nombre"] = $row['nombre'];
                $listado[$format]["apellidos"] = $row['apellidos'];
                $listado[$format]["email"] = $row['email'];
                $listado[$format]["especialidad"] = $row['especialidad'];
                $row = $resultado->fetch();
                $i++;
            }
        }
        return $listado;
    }

    /**
     * public static function add($nombre, $apellidos, $email, $password, $especialidad)
     *
     * Grabamos los datos de un nuevo Desarrollador en la base de datos.
     *
     * Si las variables $nombre, $apellidos, $email, $especialidad
     * estan definidas y no son null, definimos la consulta sql y la enviamos
     * como parametro al método propio de la clase Dao:
     * self::ejecutaConsulta ($sql);
     * Este método realiza la inserción de la fila en la base de datos. Si alguna
     * de las variables no estuviera definida correctamente, no se realiza la
     * inserción de la fila en la tabla. Devuelve true si se ha realizado la
     * consulta, y false en caso de no realizarse correctamente.
     *
     * @param type $dni
     * @param type $nombre
     * @param type $apellidos
     * @param type $email
     * @param type $especialidad
     * @return boolean
     */
    public static function add($dni, $nombre, $apellidos, $email, $especialidad) {
        if (isset($dni) && isset($nombre) && isset($apellidos) && isset($email) && isset($especialidad)) {
            $sql = "INSERT INTO `dev_age_dev` (`dni`, `nombre`, `apellidos`, `email`, ";
            $sql.="`especialidad`) VALUES ('" . $dni . "', '" . $nombre . "', '" . $apellidos . "',";
            $sql.="'" . $email . "', '" . $especialidad . "')";
            $resultado = self::ejecutaConsulta($sql);
            $verificado = false;
            if ($resultado) {
                $verificado = true;
            }
        }
        return $verificado;
    }

}
