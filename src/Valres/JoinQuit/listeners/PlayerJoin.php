<?php

namespace Valres\JoinQuit\listeners;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Server;
use Valres\JoinQuit\Main;

class PlayerJoin implements Listener
{
    private bool $firstJoinMessageEnabled;
    private string $firstJoinType;
    private string $firstJoinMessage;
    private string $joinType;
    private string $joinMessage;

    public function __construct() {
        $config = Main::getInstance()->getConfig();

        $this->firstJoinMessageEnabled = $config->get("first-join-message")["enabled"];
        $this->firstJoinType = $config->get("first-join-message")["type"];
        $this->firstJoinMessage = $config->get("first-join-message")["message"];

        $this->joinType = $config->get("join-message")["type"];
        $this->joinMessage = $config->get("join-message")["message"];
    }

    public function onPlayerJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $joinMessage = $this->joinMessage;
        $joinType = $this->joinType;

        if(!$player->hasPlayedBefore() && $this->firstJoinMessageEnabled){
            $joinMessage = $this->firstJoinMessage;
            $joinType = $this->firstJoinType;
        }

        $event->setJoinMessage("");

        $joinMessage = str_replace("{player}", $player->getName(), $joinMessage);
        match($joinType){
            default => $event->setJoinMessage($joinMessage),
            "popup" => Server::getInstance()->broadcastTip($joinMessage)
        };
    }
}
