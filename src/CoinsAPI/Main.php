<?php

namespace EconomyAPI;

use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;
use pocketmine\event\Listener;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;
use pocketmine\Player;

class EconomyAPI extends PluginBase implements Listener {
	
	public function onEnable()
	{
        $this->getServer()->getPluginManager()->registerEvents($this ,$this);
		@mkdir($this->getDataFolder());
		$this->messages = new Config($this->getDataFolder() . "/messages.yml", Config::YAML);
		if($this->messages->get("main.prefix") == null)
		{
			$this->messages->set("main.prefix", "Â§7[Â§anoakAEconomyÂ§7]Â§f ");
		}
		if($this->messages->get("message.errorNotEnoughMoney") == null)
		{
			$this->messages->set("message.errorNotEnoughMoney", "Â§cYou don't have enough money to do this!");
		}
		if($this->messages->get("message.errorPlayerNotFound") == null)
		{
			$this->messages->set("message.errorPlayerNotFound", "Â§cPlayer not found!");
		}
		if($this->messages->get("message.errorNotAValue") == null)
		{
			$this->messages->set("message.errorNotAValue", "Â§cThis is not a value!");
		}
		if($this->messages->get("message.errorMissingParameter") == null)
		{
			$this->messages->set("message.errorMissingParameter", "Â§cMissing parameter!");
		}
		if($this->messages->get("message.errorCommandNotFound") == null)
		{
			$this->messages->set("message.errorCommandNotFound", "Â§cCommand not found!");
		}
		if($this->messages->get("message.errorNoPermissions") == null)
		{
			$this->messages->set("message.errorNoPermissions", "Â§cYou don't have the needed permissions!");
