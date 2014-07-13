<?php

namespace PocketWeb;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
    
    public function onEnable() {
        $this->getLogger()->info("mcpeMMO has been enabled.");
    }

    
    public function onDisable() {
        $this->getLogger()->info("McpeMMo has been disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
	switch($command->getName()){ //get command
		case "mcpemmo": //if command is /mcpemmo
			if ($sender instanceof Player) { //if player, not console
		            	$sender->sendMessage("MCPEMMO is a COOL PLUGIN"); //return message
		            	return true; //return command success
		            	break;
			}
	        else { //if not-player (if console)
	        		$sender->sendMessage("Please run command in game."); //return message
	        		return true; //return command success
	        }
	    default:
		  	return false;
	}
    }
}
