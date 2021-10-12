<?php

declare(strict_types=1);

namespace App\HTML;

class Element
{
    private string $tag;

    private array $attributes;

    public function __construct(string $tag, array $attributes)
    {
        $this->tag = $tag;
        $this->attributes = $attributes;
    }

    public function start(): string
    {
        $html = '<' . $this->tag;

        foreach ($this->attributes as $name => $value) {
            $html .= ' ' . $name . '="' . $value . '"';
        }

        return $html . '>';
    }

    public function end(): string
    {
        return '</' . $this->tag . '>';
    }
}
