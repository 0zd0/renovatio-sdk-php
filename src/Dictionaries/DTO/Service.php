<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\DTO;

readonly class Service
{
    /**
     * @param int $serviceId
     * @param string $title
     * @param bool $isDeleted
     * @param string $code
     * @param string $subCode
     * @param int $categoryId
     * @param string $categoryTitle
     * @param string $categoryPath
     * @param int $professionId
     * @param string $professionTitle
     * @param float|null $price
     * @param float|null $originalPrice
     * @param int|null $duration
     * @param int|null $durationDeferred
     * @param string $lab
     * @param string|int|null $tax
     * @param string $shortDesc
     * @param string $fullDesc
     * @param string $preparation
     * @param string $reasons
     * @param string $restrictions
     * @param string|null $alias
     * @param string[] $types
     * @param string $typeTitles
     * @param string[] $relatedServices
     * @param string[] $relatedServicesDefault
     * @param array<int, float|null> $priceTypes
     * @param string|null $agentId
     * @param bool $isTelemedicine
     * @param bool $isOutside
     * @param bool $isHidden
     */
    public function __construct(
        public int $serviceId,
        public string $title,
        public bool $isDeleted,
        public string $code,
        public string $subCode,
        public int $categoryId,
        public string $categoryTitle,
        public string $categoryPath,
        public int $professionId,
        public string $professionTitle,
        public int|float|null $price,
        public int|float|null $originalPrice,
        public ?int $duration,
        public ?int $durationDeferred,
        public string $lab,
        public string|int|null $tax,
        public string $shortDesc,
        public string $fullDesc,
        public string $preparation,
        public string $reasons,
        public string $restrictions,
        public ?string $alias,
        public array $types,
        public string $typeTitles,
        public array $relatedServices,
        public array $relatedServicesDefault,
        public array $priceTypes,
        public ?string $agentId,
        public bool $isTelemedicine,
        public bool $isOutside,
        public bool $isHidden,
    ) {}
}
