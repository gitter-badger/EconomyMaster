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
	    @mkdir($this->getDataFolder() . "areas/");
	    @mkdir($this->getDataFolder() . "casinos/");
	    @mkdir($this->getDataFolder() . "clouds/");
	    @mkdir($this->getDataFolder() . "lands/");
	    @mkdir($this->getDataFolder() . "npcs/");
	    @mkdir($this->getDataFolder() . "pjobs/");
	    @mkdir($this->getDataFolder() . "pshops/");
	    @mkdir($this->getDataFolder() . "signs/"); 
	$this->data = $this->getDataFolder();
        $this->config = $this->getConfig()->getAll();
$this->getCommand("mymoney")->setExecutor(new Commands\MyMoney($this));
}
public function getSymbol(){
  $this->config = new Config($this->data . "config.yml", Config::YAML);
    	return $this->config->get('symbol');
}

