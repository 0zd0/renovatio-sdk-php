<?php

namespace Onepix\RenovatioSdk\Shared\Support;

use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\MapperBuilder;

final class APIMapper
{
    private static ?TreeMapper $mapper = null;

    private static ?\CuyZ\Valinor\Normalizer\Normalizer $normalizer = null;

    public static function get(): TreeMapper
    {
        if (self::$mapper === null) {
            self::$mapper = new MapperBuilder()
                ->allowScalarValueCasting()
                ->allowSuperfluousKeys()
                ->mapper();
        }

        return self::$mapper;
    }

    public static function getNormalizer(): \CuyZ\Valinor\Normalizer\Normalizer
    {
        if (self::$normalizer === null) {
            self::$normalizer = (new \CuyZ\Valinor\NormalizerBuilder())->normalizer(\CuyZ\Valinor\Normalizer\Format::array());
        }

        return self::$normalizer;
    }
}
