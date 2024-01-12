<?php
require_once 'Bot.php';

header('content-type: application/json');
$token = $_REQUEST['6507183171:AAFY4QUEG-MC9yxDJO6uPOpIMGgdjve18vQ'] ?? null;
$message = $_REQUEST['message'] ?? '';

$bot = new Bot();

if (is_null($token)) {
    echo json_encode(['code' => 422, 'message' => 'token 不能为空']);
} else {
    // 发送消息
    $chat_id = $bot->decryption($token);
    $ret = $bot->sendMessage(['text' => $message, 'chat_id' => $chat_id]);
    if ($ret['ok']) {
        echo json_encode(['code' => 200, 'message' => 'success']);
    } else {
        echo json_encode(['code' => 422, 'message' => $ret['description']]);
    }
}
