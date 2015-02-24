<?php

namespace Asparanc\EconomyMaster;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandExecutor;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class EcoAPI extends PluginBase{
  
public $config;
public $data;
private static $object = null;
    
public static function getInstance(){
    	return self::$object;
    }
    
public function onLoad(){
    	if(!self::$object instanceof EconomyMaster){
    		self::$object = $this;
    	}
       	$this->data = $this->getDataFolder();
}
    public function onEnable(){
	    @mkdir($this->getDataFolder());
	    @mkdir($this->getDataFolder() . "players/");
        $this->data = $this->getDataFolder();
        $this->config = $this->getConfig()->getAll();
}
public function getSymbol(){
  $this->config = new Config($this->data . "config.yml", Config::YAML);
    	return $this->config->get('symbol');
}

