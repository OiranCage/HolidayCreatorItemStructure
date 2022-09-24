<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use pocketmine\nbt\tag\CompoundTag;

class Throwable implements IComponent{

    use WriteTagTrait;

    public bool $doSwingAnimation;
    public float $launchPowerScale;
    public float $maxDrawDuration;
    public float $maxLaunchPower;
    public float $minDrawDuration;
    public bool $scalePowerByDrawDuration;

    public static function create() : self{
        return new self;
    }

    public function getName(): string{
        return Constants::MINECRAFT_THROWABLE;
    }

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setByte(Constants::DO_SWING_ANIMATION, (int) $this->doSwingAnimation)
            ->setFloat(Constants::LAUNCH_POWER_SCALE, $this->launchPowerScale)
            ->setFloat(Constants::MAX_DRAW_DURATION, $this->maxDrawDuration)
            ->setFloat(Constants::MAX_LAUNCH_POWER, $this->maxLaunchPower)
            ->setFloat(Constants::MIN_DRAW_DURATION, $this->minDrawDuration)
            ->setByte(Constants::SCALE_POWER_BY_DRAW_DURATION, (int) $this->scalePowerByDrawDuration);
    }

}