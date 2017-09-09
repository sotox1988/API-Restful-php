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
 *
 * @author Matías Sotomayor Ramos
 */
/**
 * Librerias y clases necesarias.
 */
require_once 'Dao.php';

$dao = new Dao();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $json = json_decode(file_get_contents("php://input"));

    if (isset($json->operacion) && !empty($json->operacion)) {

        $operacion = $json->operacion;

        if ($operacion == 'signup') {
            if (isset($json->email) && isset($json->password) &&
                    !empty($json->email) && !empty($json->password)) {

                $email = $json->email;
                $password = $json->password;

                if ($dao->verificaEmailUsuario($email)) {
                    $respuesta["resultado"]["estado"] = "Incorrecto";
                    $respuesta["resultado"]["mensaje"] = "El Usuario Existe.";
                    echo json_encode($respuesta);
                } else {
                    $consulta = $dao->signUp($email, $password);

                    if ($consulta) {
                        $respuesta["resultado"]["estado"] = "Correcto";
                        $respuesta["resultado"]["mensaje"] = "Usuario Registrado.";
                        echo json_encode($respuesta);
                    } else {
                        $respuesta["resultado"]["estado"] = "Incorrecto";
                        $respuesta["resultado"]["mensaje"] = "Usuario No Registrado.";
                        echo json_encode($respuesta);
                    }
                }
            } else {
                $respuesta["resultado"]["estado"] = "Error";
                $respuesta["resultado"]["mensaje"] = "Datos No Definidos o Nulos.";
                echo json_encode($respuesta);
            }
        } else if ($operacion == 'login') {

            if (isset($json->email) && isset($json->password) &&
                    !empty($json->email) && !empty($json->password)) {

                $email = $json->email;
                $password = $json->password;

                if ($dao->verificaEmailUsuario($email)) {

                    $consulta = $dao->logIn($email, $password);

                    if (!$consulta) {
                        $respuesta["resultado"]["estado"] = "Incorrecto";
                        $respuesta["resultado"]["mensaje"] = "Password Incorrecto.";
                        echo json_encode($respuesta);
                    } else {
                        $respuesta["resultado"]["estado"] = "Correcto";
                        $respuesta["resultado"]["mensaje"] = "Datos Correctos.";
                        echo json_encode($respuesta);
                    }
                } else {
                    $respuesta["resultado"]["estado"] = "Incorrecto";
                    $respuesta["resultado"]["mensaje"] = "Email Incorrecto.";
                    echo json_encode($respuesta);
                }
            } else {
                $respuesta["resultado"]["estado"] = "Error";
                $respuesta["resultado"]["mensaje"] = "Datos No Definidos o Nulos.";
                echo json_encode($respuesta);
            }
        } else if ($operacion == 'listado') {

            $consulta = $dao->listado();

            if ($consulta) {
                echo json_encode($consulta);
            }
        } else if ($operacion == 'add') {
            if (isset($json->nombre) && isset($json->apellidos) &&
                    isset($json->email) && isset($json->especialidad) &&
                    isset($json->dni) && !empty($json->nombre) &&
                    !empty($json->dni) && !empty($json->email) &&
                    !empty($json->apellidos) && !empty($json->especialidad)) {

                $dni = $json->dni;
                $nombre = $json->nombre;
                $apellidos = $json->apellidos;
                $email = $json->email;
                $especialidad = $json->especialidad;

                if ($dao->verificaEmailDesarrollador($email)) {
                    $respuesta["resultado"]["estado"] = "Incorrecto";
                    $respuesta["resultado"]["mensaje"] = "El Desarrollador Existe.";
                    echo json_encode($respuesta);
                } else {
                    $consulta = $dao->add($dni, $nombre, $apellidos, $email, $especialidad);

                    if ($consulta) {
                        $respuesta["resultado"]["estado"] = "Correcto";
                        $respuesta["resultado"]["mensaje"] = "Desarrollador Registrado.";
                        echo json_encode($respuesta);
                    } else {
                        $respuesta["resultado"]["estado"] = "Incorrecto";
                        $respuesta["resultado"]["mensaje"] = "Desarrollador No Registrado.";
                        echo json_encode($respuesta);
                    }
                }
            } else {
                $respuesta["resultado"]["estado"] = "Error";
                $respuesta["resultado"]["mensaje"] = "Datos No Definidos o Nulos.";
                echo json_encode($respuesta);
            }
        } else if ($operacion == 'saludo') {
            $respuesta["resultado"]["estado"] = "Correcto";
            $respuesta["resultado"]["mensaje"] = "API REST on POST Holi :).";
            echo json_encode($respuesta);
        }
    } else {
        $respuesta["resultado"]["estado"] = "Error";
        $respuesta["resultado"]["mensaje"] = "Datos No Definidos o Nulos.";
        echo json_encode($respuesta);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "Acceso GET Restful Api";
}
