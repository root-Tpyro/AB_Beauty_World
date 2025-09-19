<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PayOS\PayOS;

$CLIENT_ID = 'c8e5a933-24cd-44ae-98b9-9455bc5c83e4';
$API_KEY =  '27ef0e85-abaa-4588-acac-1238c73cd241';
$CHECKSUM_KEY = '65505ebf42b5365da6e5597bb03d76a3c4aa79c170edea6ded21f80f71ef4566';

$payOS = new PayOS($CLIENT_ID, $API_KEY, $CHECKSUM_KEY);

// URL webhook của bạn, ví dụ: http://localhost/payos-demo/webhook.php
$webhookUrl = "https://xmart.io.vn/qr/webhook.php";

try {
    $payOS->confirmWebhook($webhookUrl);
    echo "Webhook confirmed successfully!";
} catch (\Throwable $th) {
    echo "Webhook confirmation failed: " . $th->getMessage();
}
