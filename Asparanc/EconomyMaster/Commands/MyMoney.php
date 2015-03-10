<?php
namespace Asparanc\EconomyMaster\Commands;

use pocketmine\plugin\PluginBase;

use pocketmine\permission\Permission;

use pocketmine\command\Command;

use pocketmine\command\CommandExecutor;

use pocketmine\command\CommandSender;

use pocketmine\Player;

use pocketmine\Server;

use pocketmine\utils\Config;

use pocketmine\utils\TextFormat;

use Asparanc\EconomyMaster\EcoAPI;

class MyMoney extends PluginBase implements CommandExecutor{

	public function __construct(EcoAPI $plugin){

$this->plugin = $plugin;

}

public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {

	$cmd = strtolower($cmd->getName());

	switch($cmd){

		case "mymoney":

$money =EcoAPI::getInstance()->getPlayerMoney($sender);

$player->sendMessage("********************************");
$player->sendMessage("You have ".$money."©");
$player->sendMessage("********************************");
return true;
break;


}

}
}
