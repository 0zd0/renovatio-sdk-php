<?php

namespace Onepix\RenovatioSdk\Shared\Requests\Traits;

trait HasVisibilityFilters
{
    private bool $showAll = false;
    private bool $showDeleted = false;
    private ?string $source = null;

    public function setShowAll(bool $showAll = true): static
    {
        $this->showAll = $showAll;
        return $this;
    }

    public function setShowDeleted(bool $showDeleted = true): static
    {
        $this->showDeleted = $showDeleted;
        return $this;
    }

    public function setSource(?string $source): static
    {
        $this->source = $source;
        return $this;
    }

    protected function getVisibilityPayload(): array
    {
        $payload = [
            'show_all' => $this->showAll ? 1 : 0,
            'show_deleted' => $this->showDeleted ? 1 : 0,
        ];

        if ($this->source !== null) {
            $payload['source'] = $this->source;
        }

        return $payload;
    }
}