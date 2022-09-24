<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\type\RepairItemEntry;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\Tag;

class Repairable implements IComponent{

    use WriteTagTrait;

    /**
     * @var RepairItemEntry[]
     * @phpstan-var list<RepairItemEntry>
     */
    public array $repairItems;

    /**
     * @param RepairItemEntry[] $repairItems
     * @phpstan-param list<RepairItemEntry> $repairItems
     */
    public static function create(array $repairItems) : self{
        $result = new self;
        $result->repairItems = $repairItems;
        return $result;
    }

    public function getName(): string{
        return Tags::REPAIRABLE;
    }

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setTag(Constants::REPAIR_ITEMS, new ListTag(array_map(fn(RepairItemEntry $entry) : CompoundTag => $entry->encode(), $this->repairItems)));
    }
}