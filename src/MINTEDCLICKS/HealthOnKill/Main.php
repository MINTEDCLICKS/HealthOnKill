<?php

namespace MINTEDCLICKS\HealthOnKill;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerDeathEvent;

class Main extends PluginBase implements Listener{

public function onEnable() : void{
$this->getServer()->getPluginManager()->registerEvents($this, $this);
}

public function onPlayerDeath(PlayerDeathEvent $event) : void{
$cause = $event->getPlayer()->getLastDamageCause(); //finds the cause of death
if ($cause instanceof EntityDamageByEntityEvent){ //ensures that the following is only ran if the cause is due to a player killing
$killer = $event->getPlayer()->getLastDamageCause()?->getDamager(); //finds the player who dealt the kill to the player killed
$killer->setHealth($killer->getMaxHealth()); //sets health to max health. change getMaxHealth to getHealth()+NUMBER to add health instead of setting it to the max
}
}
}
