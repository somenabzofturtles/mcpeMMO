<?php

namespace Main;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info("mcpeMMO has been enabled.");
    }

    
    public function onDisable(){
        $this->getLogger()->info("McpeMMo has been disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
	switch($command->getName()){ 
		case "mcpemmo":
			if ($sender instanceof Player){
		            	$sender->sendMessage("This plugin is still in the works");
		            	return true;
		            	break;
			}
	        	else{
	        		$sender->sendMessage("Please run this command in-game.");
	        		return true;
	        		break;
	        	}
		default:
		  	return false;
	}
    }
}
