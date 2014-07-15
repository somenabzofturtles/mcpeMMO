<?php

namespace mcpeMMO;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

use mcpeMMO\api\exceptions\InvalidPlayerException;
use mcpeMMO\api\exceptions\InvalidSkillException;
use mcpeMMO\api\exceptions\InvalidXPGainReasonException;
use mcpeMMO\api\AbilityAPI;
use mcpeMMO\api\ChatAPI;
use mcpeMMO\api\ExperienceAPI;
use mcpeMMO\api\PartyAPI;

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
