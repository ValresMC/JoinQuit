<?php

namespace Valres\JoinQuit\listeners;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Server;
use Valres\JoinQuit\Main;

class PlayerQuit implements Listener
{
    private string $type;
    private string $message;

    public function __construct() {
        $config = Main::getInstance()->getConfig();

        $this->type = $config->get("quit-message")["type"];
        $this->message = $config->get("quit-message")["message"];
    }

    public function onPlayerQuit(PlayerQuitEvent $event): void {
        $player = $event->getPlayer();

        $event->setQuitMessage("");
        $quitMessage = str_replace("{player}", $player->getName(), $this->message);
        match($this->type){
            default => $event->setQuitMessage($quitMessage),
            "popup" => Server::getInstance()->broadcastTip($quitMessage)
        };
    }
}
