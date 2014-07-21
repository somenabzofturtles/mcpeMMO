<?php

namespace mcpeMMO\mcpeMMO;
/* Thanks to LDX GodMode Plugin */

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\event\entity\EntityDamageEvent;

class Main extends PluginBase implements Listener {
  
  public function onEnable() {
    $this->enabled = array();
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
  }
  
  public function onCommand(CommandSender $issuer,Command $cmd,$label,array $args) {
    if((strtolower($cmd->getName()) == "mcgod") && !(isset($args[0])) && ($issuer instanceof Player) && ($issuer->hasPermission("mcmmo.commands.mcgod") || $issuer->hasPermission("mcmmo.commands.mcgod.self"))) {
      $this->enabled[$issuer->getName()] = !$this->enabled[$issuer->getName()];
      if($this->enabled[$issuer->getName()]) {
        $issuer->sendMessage("God mode enabled!");
      } else {
        $issuer->sendMessage("God mode disabled!");
      }
      return true;
    } else if((strtolower($cmd->getName()) == "mcgod") && isset($args[0]) && ($issuer->hasPermission("mcmmo.commands.mcgod") || $issuer->hasPermission("mcmmo.commands.mcgod.others"))) {
      if($this->getServer()->getPlayer($args[0]) instanceof Player) {
        if(isset($this->enabled[$this->getServer()->getPlayer($args[0])->getName()])) {
          $this->enabled[$this->getServer()->getPlayer($args[0])->getName()] = !$this->enabled[$this->getServer()->getPlayer($args[0])->getName()];
          if($this->enabled[$this->getServer()->getPlayer($args[0])->getName()]) {
            $this->getServer()->getPlayer($args[0])->sendMessage("[MCPEMMO] God mode enabled!");
            $issuer->sendMessage("[MCPEMMO] God mode enabled for " . $this->getServer()->getPlayer($args[0])->getName() . "!");
          } else {
            $this->getServer()->getPlayer($args[0])->sendMessage("[MCPEMMO] God mode disabled!");
            $issuer->sendMessage("[MCPEMMO] God mode disabled for " . $this->getServer()->getPlayer($args[0])->getName() . "!");
          }
        } else {
          $this->enabled[$this->getServer()->getPlayer($args[0])->getName()] = true;
          $this->getServer()->getPlayer($args[0])->sendMessage("[MCPEMMO] God mode enabled!");
          $issuer->sendMessage("[MCPEMMO] God mode enabled for " . $this->getServer()->getPlayer($args[0])->getName() . "!");
        }
      } else {
        $issuer->sendMessage("Player not connected.");
      }
      return true;
    } else {
      return false;
    }
  }
  
  public function onHurt(EntityDamageEvent $event) {
    $entity = $event->getEntity();
    if($entity instanceof Player && isset($this->enabled[$entity->getName()])) {
      if($this->enabled[$entity->getName()]) {
        $event->setCancelled();
      }
    }
  }
?>
