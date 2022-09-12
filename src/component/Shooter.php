<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\type\AmmunitionEntry;
use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\Tag;

class Shooter implements IComponent{

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

    private const AMMUNITION = "ammunition";
    private const CHARNGE_ON_DRAW = "charnge_on_draw";
    private const LAUNCH_POWER_SCALE = "launch_power_scale";
    private const MAX_DRAW_DURATION = "max_draw_duration";
    private const MAX_LAUNCH_POWER = "max_launch_power";
    private const SCALE_POWER_BY_DRAW_DURATION = "scale_power_by_draw_duration";

	public function encode() : Tag{
		return CompoundTag::create()
			->setTag(self::AMMUNITION, new ListTag(array_map(fn(AmmunitionEntry $entry) : CompoundTag => $entry->encode(), $this->ammunition), NBT::TAG_Compound))
			->setByte(self::CHARNGE_ON_DRAW, (int) $this->chargeOnDraw)
            ->setFloat(self::LAUNCH_POWER_SCALE, $this->launchPowerScale)
            ->setFloat(self::MAX_DRAW_DURATION, $this->maxDrawDuration)
            ->setFloat(self::MAX_LAUNCH_POWER, $this->maxLaunchPower)
            ->setByte(self::SCALE_POWER_BY_DRAW_DURATION, (int) $this->scalePowerByDrawDuration);
	}
}