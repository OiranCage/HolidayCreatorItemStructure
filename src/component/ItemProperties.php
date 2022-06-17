<?php

namespace oirancage\HolidayCreatorItemLoader\component;

use oirancage\HolidayCreatorItemLoader\type\Icon;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class ItemProperties implements IComponent{

	public int $useDuration;
	public int $useAnimation;
	public bool $allowOffHand;
	public bool $canDestroyInCreative;
	public bool $handEquipped;
	public int $maxStackSize;
	public float $miningSpeed;
	public int $maxDamage;
	public Icon $icon;

	public function getName() : string{
		return "item_properties";
	}

	public function encode() : Tag{
		return CompoundTag::create()
			->setInt("use_duration", $this->useDuration)
			->setInt("use_animation", $this->useAnimation)
			->setByte("allowOffHand", (int) $this->allowOffHand)
			->setByte("can_destroy_in_creative", (int) $this->canDestroyInCreative)
			->setByte("hand_equipped", $this->handEquipped)
			->setInt("max_stack_size", $this->maxStackSize)
			->setFloat("mining_speed", $this->miningSpeed)
			->setInt("max_damage", $this->maxDamage)
			->setTag($this->icon->getName(), $this->icon->encode());
	}
}