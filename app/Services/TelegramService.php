<?php

namespace App\Services;

use Telegram\Bot\Api;

class TelegramService
{
    protected $telegram;
    protected $ids;

    public function __construct()
    {
        $this->telegram = new Api('7288918403:AAFrU7IvY-Iyi9ywUB6cbjUZUzd6g63efvo');
        $this->ids = [
            5597049706,
            80329025
        ];
    }

    public function sendMessage($message)
    {
        foreach ($this->ids as $id) {
            $response = $this->telegram->sendMessage([
                'chat_id' => $id,
                'text' => $message
            ]);
        }
    }
}
