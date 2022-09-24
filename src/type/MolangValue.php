<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\utils\Encodable;
use pocketmine\nbt\tag\CompoundTag;

class MolangValue implements Encodable{

    public ?string $expression;
    
    public MolangVersion $version;

    public static function empty() : self {
        $result = new self;
        $result->expression = null;
        return $result;
    }

    public static function v1(string $expression) : self{
        $result = new self;
        $result->expression = $expression;
        $result->version = MolangVersion::V1;
        return $result;
    }

    public function encode(): CompoundTag{
        if($this->expression === null){
            return $this->encodeEmpty();
        }

        return match($this->version){
            MolangVersion::V1 => $this->encodeV1()
        };
    }

    protected function encodeEmpty() : CompoundTag{
        return CompoundTag::create()
            ->setString(Constants::EXPRESSION, "")
            ->setInt(Constants::VERSION, -1);
    }

    protected function encodeV1() : CompoundTag{
        return CompoundTag::create()
            ->setString(Constants::EXPRESSION, $this->expression)
            ->setInt(Constants::VERSION, 1);
    }
}