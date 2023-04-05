<?php

namespace MINTEDCLICKS\HealthOnKill;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\event\entity\EntityDamageByEntityEvent;

class Main extends PluginBase implements Listener{

public function onEnable() : void{
$this->getServer()->getPluginManager()->registerEvents($this, $this);
}

public function onPlayerDeath(EntityDamageByEntityEvent $event) : void{
$playerKilled = $event->getEntity();
$killer = $event->getDamager();

if($playerKilled instanceof Player && $killer instanceof Player){
if($playerKilled->getHealth() - $event->getFinalDamage() <= 0){
$killer->setHealth($killer->getMaxHealth());
}
}
}
}
