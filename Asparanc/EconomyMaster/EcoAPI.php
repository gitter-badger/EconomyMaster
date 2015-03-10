<?php

namespace Asparanc\EconomyMaster;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginManager;
use pocketmine\command\CommandExecutor;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use Asparanc\EconomyMaster\Register;
use Asparanc\EconomyMaster\Commands\Mymoney;

class EcoAPI extends PluginBase{
  
public $config;
public $data;
private static $object = null;
    
public static function getInstance(){
    	return self::$object;
    }
    
public function onLoad(){
    	if(!self::$object instanceof EcoAPI){
    		self::$object = $this;
    	}
       	$this->data = $this->getDataFolder();
}
    public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents(new Register($this), $this);
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
        $this->playerfolder = $this->getDataFolder() . "players/";
$this->getCommand("mymoney")->setExecutor(new Commands\MyMoney($this));
$this->getCommand("pay")->setExecutor(new Commands\Pay($this));
}
public function getSymbol(){
  $this->config = new Config($this->data . "config.yml", Config::YAML);
    	return $this->config->get('symbol');
}

public function isRegistered($player){
	return file_exists($this->data . "players/".strtolower($player.".yml"));
}
public function newRegister($player){
 $data = new Config($this->data . "players/" . strtolower($player . ".yml"), Config::YAML);
    	$data->set("money", 0);
    	$data->set("bank", 0);
    	$data->save();
}
public function getPlayerMoney($player){
$data = new Config($this->data . "players/". strtolower($player->getName().".yml"), Config::YAML);
return $data->get("money");
}
public function PayPlayerMoney($player,$pay){
$data = new Config($this->data . "players/". strtolower($player->getName().".yml"), Config::YAML);
$money = $data->get("money");
$newmoney = $money + $pay;
$data->set("money" => $newmoney);
$data->save();
}
public function PayToPlayerMoney($player, $target, $amount){
$data1 = new Config($this->data . "players/". strtolower($player.".yml"), Config::YAML);
$data2 = new Config($this->data . "players/". strtolower($target.".yml"), Config::YAML);
$moneyplayer = $data1->get("money") - $amount;
$moneytarget = $data2->get("money") + $amount;
$data1->set("money", $moneyplayer);
$data1->save();
$data2->set("money", $moneytarget);
$data2->save();
}
}
