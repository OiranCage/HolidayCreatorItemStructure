<?php

namespace oirancage\HolidayCreatorItemStructure;

use oirancage\HolidayCreatorItemStructure\component\Cooldown;
use oirancage\HolidayCreatorItemStructure\component\Fuel;
use oirancage\HolidayCreatorItemStructure\component\ItemProperties;
use oirancage\HolidayCreatorItemStructure\component\RenderOffsets;
use oirancage\HolidayCreatorItemStructure\component\Shooter;
use oirancage\HolidayCreatorItemStructure\component\Wearable;
use oirancage\HolidayCreatorItemStructure\utils\Encodable;
use pocketmine\nbt\tag\CompoundTag;

class Root implements Encodable{

    private ?Cooldown $cooldown = null;
    private ?Fuel $fuel = null;
    private ?RenderOffsets $renderOffsets = null;
    private ?Shooter $shooter = null;
    private ?Wearable $wearable = null;

    public function __construct(
        private ItemProperties $itemProperties
    ){
    }

    public static function create(ItemProperties $itemProperties) : self{
        return new self($itemProperties);
    }

    /**
     * @return $this
     */
    public function setRenderOffsets(RenderOffsets $renderOffsets) : self{
        $this->renderOffsets = $renderOffsets;
        return $this;
    }

    /**
     * @return $this
     */
    public function setShooter(Shooter $shooter) : self{
        $this->shooter = $shooter;
        return $this;
    }

    public function encode() : CompoundTag{
        $components = CompoundTag::create();

        $this->itemProperties->write($components);
        $this->cooldown?->write($components);
        $this->fuel?->write($components);
        $this->renderOffsets?->write($components);
        $this->shooter?->write($components);
        $this->wearable?->write($components);

        return $components;
    }
}