<?php

namespace Heisenburger69\BurgerMorphs\entity\types;

use Heisenburger69\BurgerMorphs\entity\MorphEntity;
use pocketmine\nbt\tag\{IntTag};

class Rabbit extends MorphEntity
{

    public const NETWORK_ID = self::RABBIT;

    /** @var int */
    public const DATA_RABBIT_TYPE = 18;

    public const TAG_RABBIT_TYPE = "RabbitType";
    public $width = 0.4;
    public $height = 0.5;

    public function initEntity(): void
    {
        $type = $this->getRandomRabbitType();
        if (!$this->namedtag->hasTag(self::TAG_RABBIT_TYPE, IntTag::class)) {
            $this->namedtag->setInt(self::TAG_RABBIT_TYPE, $type);
        }

        $this->getDataPropertyManager()->setByte(self::DATA_RABBIT_TYPE, $type);
    }

    public function getRandomRabbitType(): int
    {
        $arr = [0, 1, 2, 3, 4, 5, 99];

        return $arr[array_rand($arr)];
    }

    public function getName(): string
    {
        return "Rabbit";
    }
}