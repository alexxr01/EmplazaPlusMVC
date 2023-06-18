<?php
// Configuración de la pasarela de pago
$DS_MERCHANT_AMOUNT = "1000"; // Importe en céntimos (10 euros)
$DS_MERCHANT_ORDER = "123456789"; // Número de pedido
$DS_MERCHANT_MERCHANTCODE = "999008881"; // Código de comercio proporcionado por Redsys
$DS_MERCHANT_CURRENCY = "978"; // Código numérico ISO-4217 de la moneda (EUR)
$DS_MERCHANT_TRANSACTIONTYPE = "0"; // Tipo de transacción (0 = pago)
$DS_MERCHANT_TERMINAL = "001"; // Número de terminal proporcionado por Redsys
$DS_MERCHANT_MERCHANTURL = "https://www.example.com/response.php"; // URL donde Redsys notificará el resultado de la transacción
$DS_MERCHANT_URLOK = "https://www.example.com/success.php"; // URL a la que Redsys redirigirá al usuario en caso de transacción exitosa
$DS_MERCHANT_URLKO = "https://www.example.com/error.php"; // URL a la que Redsys redirigirá al usuario en caso de transacción fallida

// Calcular la firma
$claveSecreta = "sq7HjrUOBfKmC576ILgskD5srU870gJ7"; // Clave secreta proporcionada por Redsys
$message = $DS_MERCHANT_AMOUNT.$DS_MERCHANT_ORDER.$DS_MERCHANT_MERCHANTCODE.$DS_MERCHANT_CURRENCY.$DS_MERCHANT_TRANSACTIONTYPE.$DS_MERCHANT_TERMINAL.$DS_MERCHANT_MERCHANTURL.$claveSecreta;
$DS_MERCHANT_MERCHANTSIGNATURE = strtoupper(sha1($message));

// Construir formulario de pago
$formData = array(
    'DS_MERCHANT_AMOUNT' => $DS_MERCHANT_AMOUNT,
    'DS_MERCHANT_ORDER' => $DS_MERCHANT_ORDER,
    'DS_MERCHANT_MERCHANTCODE' => $DS_MERCHANT_MERCHANTCODE,
    'DS_MERCHANT_CURRENCY' => $DS_MERCHANT_CURRENCY,
    'DS_MERCHANT_TRANSACTIONTYPE' => $DS_MERCHANT_TRANSACTIONTYPE,
    'DS_MERCHANT_TERMINAL' => $DS_MERCHANT_TERMINAL,
    'DS_MERCHANT_MERCHANTURL' => $DS_MERCHANT_MERCHANTURL,
    'DS_MERCHANT_URLOK' => $DS_MERCHANT_URLOK,
    'DS_MERCHANT_URLKO' => $DS_MERCHANT_URLKO,
    'DS_MERCHANT_MERCHANTSIGNATURE' => $DS_MERCHANT_MERCHANTSIGNATURE
);

// Generar formulario HTML
$formHtml = '<form action="https://sis-t.redsys.es:25443/sis/realizarPago" method="POST">';
foreach ($formData as $name => $value) {
    $formHtml .= '<input type="hidden" name="'.$name.'" value="'.$value.'" />';
}
$formHtml .= '<input type="submit" value="Realizar pago" /></form>';

echo $formHtml;
?>
