<?php

namespace oirancage\HolidayCreatorItemStructure;

use oirancage\HolidayCreatorItemStructure\component\ItemProperties;
use oirancage\HolidayCreatorItemStructure\component\RenderOffsets;
use oirancage\HolidayCreatorItemStructure\component\Shooter;
use oirancage\HolidayCreatorItemStructure\utils\Encodable;
use pocketmine\nbt\tag\CompoundTag;

class Root implements Encodable{

    private ?RenderOffsets $renderOffsets = null;
    private ?Shooter $shooter = null;

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

    private const ITEM_PROPERTIES = "item_properties";
    private const MINECRAFT_RENDER_OFFSETS = "minecraft:render_offsets";
    private const MINECRAFT_SHOOTER = "minecraft:shooter";

    public function encode() : CompoundTag{
        $components = CompoundTag::create();

        $components->setTag(self::ITEM_PROPERTIES, $this->itemProperties->encode());

        if($this->renderOffsets !== null){
            $components->setTag(self::MINECRAFT_RENDER_OFFSETS, $this->renderOffsets->encode());
        }
        
        if($this->shooter !== null){
            $components->setTag(self::MINECRAFT_SHOOTER, $this->shooter->encode());
        }

        return $components;
    }
}