<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\type\AmmunitionEntry;
use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\Tag;

class Shooter implements IComponent{

    use WriteTagTrait;

    /** @var AmmunitionEntry[] */
    public array $ammunition;
    public bool $chargeOnDraw;
    public float $launchPowerScale;
    public float $maxDrawDuration;
    public float $maxLaunchPower;
    public bool $scalePowerByDrawDuration;

    /**
     * @param AmmunitionEntry[] $ammunition
     */
	public static function create(
		array $ammunition,
        bool $chargeOnDraw,
        float $launchPowerScale,
        float $maxDrawDuration,
        float $maxLaunchPower,
        bool $scalePowerByDrawDuration
	) : self{
        $result = new self;
		$result->ammunition = $ammunition;
		$result->chargeOnDraw = $chargeOnDraw;
        $result->launchPowerScale = $launchPowerScale;
        $result->maxDrawDuration = $maxDrawDuration;
        $result->maxLaunchPower = $maxLaunchPower;
        $result->scalePowerByDrawDuration = $scalePowerByDrawDuration;
        return $result;
	}

    public function getName(): string{
        return Tags::SHOOTER;
    }

	public function encode() : Tag{
		return CompoundTag::create()
			->setTag(Constants::AMMUNITION, new ListTag(array_map(fn(AmmunitionEntry $entry) : CompoundTag => $entry->encode(), $this->ammunition), NBT::TAG_Compound))
			->setByte(Constants::CHARNGE_ON_DRAW, (int) $this->chargeOnDraw)
            ->setFloat(Constants::LAUNCH_POWER_SCALE, $this->launchPowerScale)
            ->setFloat(Constants::MAX_DRAW_DURATION, $this->maxDrawDuration)
            ->setFloat(Constants::MAX_LAUNCH_POWER, $this->maxLaunchPower)
            ->setByte(Constants::SCALE_POWER_BY_DRAW_DURATION, (int) $this->scalePowerByDrawDuration);
	}
}