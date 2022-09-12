<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\type\DamageChance;
use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;

class Durability implements IComponent{

	private DamageChance $damageChance;
	private int $maxDurability;

	public static function create(
		DamageChance $damageChance,
		int $maxDurability
	) : self{
		Validator::validateRange($maxDurability, min: 0);
		$result = new self;
		$result->damageChance = $damageChance;
		$result->maxDurability = $maxDurability;
		return $result;
	}

	public function getName() : string{
		return "minecraft:durability";
	}

	private const DAMAGE_CHANCE = "damage_chance";
	private const MAX_DURABILITY = "max_durability";

	public function encode() : CompoundTag{
		return CompoundTag::create()
			->setTag(self::DAMAGE_CHANCE, $this->damageChance->encode())
			->setInt(self::MAX_DURABILITY, $this->maxDurability);
	}
}