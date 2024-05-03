<?php

namespace Valres\JoinQuit;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;
use ReflectionException;
use Valres\JoinQuit\listeners\PlayerJoin;
use Valres\JoinQuit\listeners\PlayerQuit;

class Main extends PluginBase implements Listener
{
    use SingletonTrait;

    public function onEnable(): void {
        $this->getLogger()->info("by Valres est lancé.");
        $this->saveDefaultConfig();

        $this->getServer()->getPluginManager()->registerEvents(new PlayerJoin(), $this);
        $this->getServer()->getPluginManager()->registerEvents(new PlayerQuit(), $this);
    }

    protected function onLoad(): void {
        self::setInstance($this);
    }
}
