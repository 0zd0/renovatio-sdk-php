<?php

namespace Onepix\RenovatioSdk\Shared\Support;

use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\MapperBuilder;

final class APIMapper
{
    private static ?TreeMapper $mapper = null;

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
}
