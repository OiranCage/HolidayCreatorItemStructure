<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\type\DestroySpeedEntry;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\Tag;

class Digger implements IComponent{
    /**
     * @var array<int, DestroySpeed>
     * @phpstan-var list<DestroySpeedEntry>
     */
    public array $destroySpeeds = [];
    public bool $useEfficiency;

    /**
     * @param array<int, DestroySpeed> $destroySpeeds
     * @phpstan-param list<DestroySpeedEntry> $destroySpeeds
     */
    public static function create(array $destroySpeeds, bool $useEfficiency) : self{
        $result = new self;
        $result->destroySpeeds = $destroySpeeds;
        $result->useEfficiency = $useEfficiency;
        return $result;
    }

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setTag(Constants::DESTORY_SPEEDS, new ListTag(array_map(fn(DestroySpeedEntry $entry) : CompoundTag => $entry->encode(), $this->destroySpeeds)))
            ->setByte(Constants::USE_EFFICIENCY, (int) $this->useEfficiency);
    }

    public function write(CompoundTag $tag): void{
        $tag->setTag(Constants::MINECRAFT_DIGGER, $this->encode());
    }

}