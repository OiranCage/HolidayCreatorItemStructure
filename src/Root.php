<?php

namespace oirancage\HolidayCreatorItemStructure;

use oirancage\HolidayCreatorItemStructure\component\Armor;
use oirancage\HolidayCreatorItemStructure\component\Chargeable;
use oirancage\HolidayCreatorItemStructure\component\Cooldown;
use oirancage\HolidayCreatorItemStructure\component\Digger;
use oirancage\HolidayCreatorItemStructure\component\DisplayName;
use oirancage\HolidayCreatorItemStructure\component\Durability;
use oirancage\HolidayCreatorItemStructure\component\DyePowder;
use oirancage\HolidayCreatorItemStructure\component\Food;
use oirancage\HolidayCreatorItemStructure\component\Fuel;
use oirancage\HolidayCreatorItemStructure\component\ItemProperties;
use oirancage\HolidayCreatorItemStructure\component\RenderOffsets;
use oirancage\HolidayCreatorItemStructure\component\Shooter;
use oirancage\HolidayCreatorItemStructure\component\Wearable;
use oirancage\HolidayCreatorItemStructure\utils\Encodable;
use pocketmine\nbt\tag\CompoundTag;

class Root implements Encodable{

    private ?Armor $armor = null;
    private ?Chargeable $chargeable = null;
    private ?Cooldown $cooldown = null;
    private ?Digger $digger = null;
    private ?DisplayName $displayName = null;
    private ?Durability $durability = null;
    private ?DyePowder $dyePowder = null;
    private ?Food $food = null;
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
    public function setArmor(Armor $armor) : self{
        $this->armor = $armor;
        return $this;
    }

    /**
     * @return $this
     */
    public function setChargeable(Chargeable $chargeable) : self{
        $this->chargeable = $chargeable;
        return $this;
    }

    /**
     * @return $this
     */
    public function setDisplayName(DisplayName $displayName) : self{
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @return $this
     */
    public function setDurability(Durability $durability) : self{
        $this->durability = $durability;
        return $this;
    }

    /**
     * @return $this
     */
    public function setDyePowder(DyePowder $dyePowder) : self{
        $this->dyePowder = $dyePowder;
        return $this;
    }

    /**
     * @return $this
     */
    public function setFood(Food $food) : self{
        $this->food = $food;
        return $this;
    }

    /**
     * @return $this
     */
    public function setFuel(Fuel $fuel) : self{
        $this->fuel = $fuel;
        return $this;
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

    /**
     * @return $this
     */
    public function setWearable(Wearable $wearable) : self{
        $this->wearable = $wearable;
        return $this;
    } 

    public function encode() : CompoundTag{
        $components = CompoundTag::create();

        $this->itemProperties->write($components);
        $this->armor?->write($components);
        $this->chargeable?->write($components);
        $this->cooldown?->write($components);
        $this->digger?->write($components);
        $this->displayName?->write($components);
        $this->durability?->write($components);
        $this->dyePowder?->write($components);
        $this->food?->write($components);
        $this->fuel?->write($components);
        $this->renderOffsets?->write($components);
        $this->shooter?->write($components);
        $this->wearable?->write($components);

        return $components;
    }
}