<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use oirancage\HolidayCreatorItemStructure\Constants;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;

class RepairItemEntry implements IType{

    /**
     * @var Item[]
     * @phpstan-var list<Item>
     */
    public array $items;
    public MolangValue $repairAmount;

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setTag(Constants::ITEMS, new ListTag(array_map(fn(Item $item) : CompoundTag => $item->encode(), $this->items)))
            ->setTag(Constants::REPAIR_AMOUNT, $this->repairAmount->encode());
    }
}