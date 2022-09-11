<?php

namespace oirancage\HolidayCreatorItemStructure;

use oirancage\HolidayCreatorItemStructure\component\ItemProperties;
use oirancage\HolidayCreatorItemStructure\component\RenderOffsets;
use oirancage\HolidayCreatorItemStructure\utils\Encodable;
use pocketmine\nbt\tag\CompoundTag;

class Root implements Encodable{

    private ?RenderOffsets $renderOffsets = null;

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

    public function encode() : CompoundTag{
        $components = CompoundTag::create();

        $components->setTag($this->itemProperties->getName(), $this->itemProperties->encode());

        if($this->renderOffsets !== null){
            $components->setTag($this->renderOffsets->getName(), $this->renderOffsets->encode());
        }

        return $components;
    }
}