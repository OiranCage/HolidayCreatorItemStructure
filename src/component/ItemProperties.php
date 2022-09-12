<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\type\Icon;
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

	public static function create(
		int $useDuration,
		int $useAnimation,
		bool $allowOffHand,
		bool $canDestroyInCreative,
		bool $handEquipped,
		int $maxStackSize,
		float $miningSpeed,
		int $maxDamage,
		Icon $icon
	) : self{
		$result = new self;
		$result->useDuration = $useDuration;
		$result->useAnimation = $useAnimation;
		$result->allowOffHand = $allowOffHand;
		$result->canDestroyInCreative = $canDestroyInCreative;
		$result->handEquipped = $handEquipped;
		$result->maxStackSize = $maxStackSize;
		$result->miningSpeed = $miningSpeed;
		$result->maxDamage = $maxDamage;
		$result->icon = $icon;
		return $result;
	}

	public function getName() : string{
		return "item_properties";
	}

	private const ALLOW_OFFHAND = "allow_offhand";
	private const CAN_DESTROY_IN_CREATIVE = "can_destroy_in_creative";
	private const HAND_EQUIPPED = "hand_equipped";
	private const MAX_DAMAGE = "max_damage";
	private const MAX_STACK_SIZE = "max_stack_size";
	private const MINECRAFT_ICON = "minecraft:icon";
	private const MINING_SPEED = "mining_speed";
	private const USE_ANIMATION = "use_animation";
	private const USE_DURATION = "use_duration";

	public function encode() : Tag{
		return CompoundTag::create()
			->setByte(self::ALLOW_OFFHAND, (int) $this->allowOffHand)
			->setByte(self::CAN_DESTROY_IN_CREATIVE, (int) $this->canDestroyInCreative)
			->setByte(self::HAND_EQUIPPED, $this->handEquipped)
			->setInt(self::MAX_DAMAGE, $this->maxDamage)
			->setInt(self::MAX_STACK_SIZE, $this->maxStackSize)
			->setTag(self::MINECRAFT_ICON, $this->icon->encode())
			->setFloat(self::MINING_SPEED, $this->miningSpeed)
			->setInt(self::USE_DURATION, $this->useDuration)
			->setInt(self::USE_ANIMATION, $this->useAnimation);
	}
}