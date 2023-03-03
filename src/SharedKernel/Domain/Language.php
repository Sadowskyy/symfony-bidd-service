<?php

declare(strict_types=1);

namespace SharedKernel\Domain;

use InvalidArgumentException;

final class Language
{
    private const SUPPORTED_LANGUAGES = [
        'en'
    ];

    private string $language;

    public function __construct(string $value)
    {
        if (!in_array($value, self::SUPPORTED_LANGUAGES)) {
            throw new InvalidArgumentException('That langauge does not exists!');
        }

        $this->language = $value;
    }

    public function __toString(): string
    {
        return $this->language;
    }

    public function jsonSerialize(): string
    {
        return $this->language;
    }
}
