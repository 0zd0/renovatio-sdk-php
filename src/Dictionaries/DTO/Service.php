<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\DTO;

readonly class Service
{
    public function __construct(
        public string $serviceId,
        public string $title,
        public bool $isDeleted,
        public ?string $code = null,
        public ?string $subCode = null,
        public ?string $categoryId = null,
        public ?string $categoryTitle = null,
        public ?string $categoryPath = null,
        public ?string $professionId = null,
        public ?string $professionTitle = null,
        public string|int|float|null $price = null,
        public string|int|float|null $originalPrice = null,
        public string|int|null $duration = null,
        public string|int|null $durationDeferred = null,
        public ?string $lab = null,
        public string|int|null $tax = null,
        public ?string $shortDesc = null,
        public ?string $fullDesc = null,
        public ?string $preparation = null,
        public ?string $reasons = null,
        public ?string $restrictions = null,
        public ?string $alias = null,
        public ?array $types = null,
        public ?string $typeTitles = null,
        public ?array $relatedServices = null,
        public ?array $relatedServicesDefault = null,
        public ?array $priceTypes = null,
        public ?string $agentId = null,
        public ?bool $isTelemedicine = null,
        public ?bool $isOutside = null,
        public ?bool $isHidden = null,
    ) {}
}
