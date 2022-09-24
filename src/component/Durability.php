<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\type\DamageChance;
use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;

class Durability implements IComponent{

	use WriteTagTrait;

	public DamageChance $damageChance;
	public int $maxDurability;

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

	public function getName(): string{
        return Constants::MINECRAFT_DURABILITY;
    }

	public function encode() : CompoundTag{
		return CompoundTag::create()
			->setTag(Constants::DAMAGE_CHANCE, $this->damageChance->encode())
			->setInt(Constants::MAX_DRAW_DURATION, $this->maxDurability);
	}

}