<?php

namespace Onepix\RenovatioSdk\Shared\Support;

use CuyZ\Valinor\Mapper\Configurator\ConvertKeysToCamelCase;
use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\MapperBuilder;
use CuyZ\Valinor\Normalizer\Format;
use CuyZ\Valinor\Normalizer\Normalizer;
use CuyZ\Valinor\NormalizerBuilder;

final class APIMapper
{
    private static ?TreeMapper $mapper = null;

    private static ?Normalizer $normalizer = null;

    public static function get(): TreeMapper
    {
        if (self::$mapper === null) {
            self::$mapper = new MapperBuilder()
                ->configureWith(new ConvertKeysToCamelCase())
                ->allowScalarValueCasting()
                ->allowSuperfluousKeys()
                ->mapper();
        }

        return self::$mapper;
    }

    public static function getNormalizer(): Normalizer
    {
        if (self::$normalizer === null) {
            self::$normalizer = new NormalizerBuilder()->normalizer(Format::array());
        }

        return self::$normalizer;
    }
}
