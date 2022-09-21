<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\type\Icon;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class ItemProperties implements IComponent{

	public bool $allowOffHand;
	public bool $animatesInToolbar;
	public bool $canDestroyInCreative;
	public int $creativeCategory;
	public string $creativeGroup;
	public int $damage;
	public string $enchantableSlot;
	public int $enchantableValue;
	public bool $explodable;
	public bool $foil;
	public int $frameCount;
	public bool $handEquipped;
	public bool $ignoresPermission;
	public bool $liquidClipped;
	public int $maxStackSize;
	public Icon $icon;
	public float $miningSpeed;
	public bool $mirroredArt;
	public bool $shouldDespawn;
	public bool $stackedByData;
	public int $useAnimation;
	public int $useDuration;

	public static function create(
		bool $allowOffHand,
		bool $animatesInToolbar,
		bool $canDestroyInCreative,
		int $creativeCategory,
		string $creativeGroup,
		int $damage,
		string $enchantableSlot,
		int $enchantableValue,
		bool $explodable,
		bool $foil,
		int $frameCount,
		bool $handEquipped,
		bool $ignoresPermission,
		bool $liquidClipped,
		int $maxStackSize,
		Icon $icon,
		float $miningSpeed,
		bool $mirroredArt,
		bool $shouldDespawn,
		bool $stackedByData,
		int $useAnimation,
		int $useDuration
	) : self{
		$result = new self;
		$result->allowOffHand = $allowOffHand;
		$result->animatesInToolbar = $animatesInToolbar;
		$result->canDestroyInCreative = $canDestroyInCreative;
		$result->creativeCategory = $creativeCategory;
		$result->creativeGroup = $creativeGroup;
		$result->damage = $damage;
		$result->enchantableSlot = $enchantableSlot;
		$result->enchantableValue = $enchantableValue;
		$result->explodable = $explodable;
		$result->foil = $foil;
		$result->frameCount = $frameCount;
		$result->handEquipped = $handEquipped;
		$result->ignoresPermission = $ignoresPermission;
		$result->liquidClipped = $liquidClipped;
		$result->maxStackSize = $maxStackSize;
		$result->icon = $icon;
		$result->miningSpeed = $miningSpeed;
		$result->mirroredArt = $mirroredArt;
		$result->shouldDespawn = $shouldDespawn;
		$result->stackedByData = $stackedByData;
		$result->useDuration = $useDuration;
		$result->useAnimation = $useAnimation;
		return $result;
	}

	public function encode() : Tag{
		return CompoundTag::create()
			->setByte(Constants::ALLOW_OFFHAND, (int) $this->allowOffHand)
			->setByte(Constants::ANIMATES_IN_TOOLBAR, (int) $this->animatesInToolbar)
			->setByte(Constants::CAN_DESTROY_IN_CREATIVE, (int) $this->canDestroyInCreative)
			->setInt(Constants::CREATIVE_CATEGORY, $this->creativeCategory)
			->setString(Constants::CREATIVE_GROUP, $this->creativeGroup)
			->setInt(Constants::DAMAGE, $this->damage)
			->setString(Constants::ENCHANTABLE_SLOT, $this->enchantableSlot)
			->setInt(Constants::ENCHANTABLE_VALUE, $this->enchantableValue)
			->setByte(Constants::EXPLODABLE, (int) $this->explodable)
			->setByte(Constants::FOIL, (int) $this->foil)
			->setInt(Constants::FRAME_COUNT, $this->frameCount)
			->setByte(Constants::HAND_EQUIPPED, (int) $this->handEquipped)
			->setInt(Constants::MAX_STACK_SIZE, $this->maxStackSize)
			->setTag(Constants::MINECRAFT_ICON, $this->icon->encode())
			->setFloat(Constants::MINING_SPEED, $this->miningSpeed)
			->setInt(Constants::USE_DURATION, $this->useDuration)
			->setInt(Constants::USE_ANIMATION, $this->useAnimation);
	}

	public function write(CompoundTag $tag): void{
        $tag->setTag(Constants::ITEM_PROPERTIES, $this->encode());
    }
}