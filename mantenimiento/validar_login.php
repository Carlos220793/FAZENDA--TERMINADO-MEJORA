<?php
session_start();

// Permitir peticiones CORS desde cualquier origen (solo para desarrollo)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Datos fijos
$usuario = "Administrador";
$clave = "sysadm1n";

// Obtener datos del fetch
$data = json_decode(file_get_contents("php://input"), true);
$u = $data["usuario"] ?? "";
$c = $data["clave"] ?? "";

// Validar
if ($u === $usuario && $c === $clave) {
    $_SESSION["autenticado"] = true;
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
