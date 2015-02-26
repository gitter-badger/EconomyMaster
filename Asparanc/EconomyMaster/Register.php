<?php

namespace Asparanc\EconomyMaster;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\permission\Permission;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat;
use Asparanc\EconomyMaster\EcoAPI;
class Register implements Listener{

public function __construct(EcoAPI $plugin){
  $this->plugin = $plugin;
 }
 
public function onJoin(PlayerJoinEvent $event){
    	$player = $event->getPlayer();
    	if(!EcoAPI::getInstance()->isRegistered($player->getName())){
    	  $this->data = $this->getDataFolder();
    	  $data = new Config($this->data . "players/" . strtolower($player->getName() . ".yml"), Config::YAML);
    	$data->set("money", 0);
    	$date->set("bank", 0);
    	$data->save();
    	  $this->plugin->getLogger()->notice("New player : ".$player->getName());
    	}
}
}
