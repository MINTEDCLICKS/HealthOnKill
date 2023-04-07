<?php

namespace MINTEDCLICKS\HealthOnKill;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\scheduler\TaskHandler;
use pocketmine\scheduler\Scheduler;
use pocketmine\scheduler\Task;
use pocketmine\scheduler\ClosureTask;


class Main extends PluginBase implements Listener{

public function onEnable() : void{
$this->getServer()->getPluginManager()->registerEvents($this, $this);
}

public function onPlayerDeath(PlayerDeathEvent $event) : void{
$cause = $event->getPlayer()->getLastDamageCause(); //finds the case of death
if ($cause instanceof EntityDamageByEntityEvent){ //ensures that the following is only ran if the cause is due to a player killing
$killer = $event->getPlayer()->getLastDamageCause()?->getDamager(); //finds the player who dealt the kill to the player killed
$this->getScheduler()->scheduleDelayedTask(new ClosureTask(function() use($killer) : void{ // used to delay the task (for compatibility with plugins that fetch player health upon a kill)
$killer->setHealth($killer->getMaxHealth()); //sets the health max health after 1 tick (0.05 seconds) change getMaxHealth to getHealth()+NUMBER to add health instead of setting it to the max
}), 1); 
}
}
}
