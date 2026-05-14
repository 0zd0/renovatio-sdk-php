<?php

namespace Onepix\RenovatioSdk\Shared\Support;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

final class APIMapper
{
    private static ?SerializerInterface $serializer = null;

    public static function setSerializer(SerializerInterface $serializer): void
    {
        self::$serializer = $serializer;
    }

    public static function getSerializer(): SerializerInterface
    {
        if (self::$serializer === null) {
            self::$serializer = self::buildSerializer();
        }

        return self::$serializer;
    }

    private static function buildSerializer(): SerializerInterface
    {
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $nameConverter = new CamelCaseToSnakeCaseNameConverter();
        $reflectionExtractor = new ReflectionExtractor();
        $phpDocExtractor = new PhpDocExtractor();

        $propertyInfoExtractor = new PropertyInfoExtractor(
            [$reflectionExtractor],
            [$phpDocExtractor, $reflectionExtractor],
            [$phpDocExtractor],
        );

        $normalizers = [
            new BackedEnumNormalizer(),
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(
                $classMetadataFactory,
                $nameConverter,
                null,
                $propertyInfoExtractor,
            ),
        ];

        return new Serializer($normalizers, [new JsonEncoder()]);
    }
}
