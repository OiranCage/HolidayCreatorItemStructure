<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\type\RepairItemEntry;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\Tag;

class Repairable implements IComponent{

    use WriteTagTrait;

    public array $repairItems;

    /**
     * @var RepairItemEntry[]
     * @phpstan-var list<RepairItemEntry>
     */
    public static function create(array $repairItems) : self{
        $result = new self;
        $result->repairItems = $repairItems;
        return $result;
    }

    public function getName(): string{
        return Constants::MINECRAFT_REPAIRABLE;
    }

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setTag(Constants::REPAIR_ITEMS, new ListTag(array_map(fn(RepairItemEntry $entry) : CompoundTag => $entry->encode(), $this->repairItems)));
    }
}