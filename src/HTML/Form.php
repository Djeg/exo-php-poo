<?php

declare(strict_types=1);

namespace App\HTML;

class Form extends Element
{
    private Element $separator;

    public function __construct(Element $separator)
    {
        $this->separator = $separator;

        parent::__construct('form', []);
    }


    public function label(string $label, string $for = ''): string
    {
        $labelElement = new Element('label', [
            'for' => $for,
        ]);

        $html = $labelElement->start();
        $html .= $label;
        $html .= $labelElement->end();

        return $html;
    }

    public function input(string $type, string $name = ''): string
    {
        $labelElement = new Element('input', [
            'type' => $type,
            'name' => $name,
            'id' => $name,
        ]);

        return $labelElement->start();
    }

    public function submitButton(string $label): string
    {
        $labelElement = new Element('button', [
            'type' => 'submit',
        ]);

        $html = $labelElement->start();
        $html .= $label;
        $html .= $labelElement->end();

        return $html;
    }

    public function separatorStart(): string
    {
        return $this->separator->start();
    }

    public function separatorEnd(): string
    {
        return $this->separator->end();
    }

    public function widget(string $label, string $for): string
    {
        $html = $this->separatorStart();

        $html .= $this->label($label, $for);
        $html .= $this->input('text', $for);

        $html .= $this->separatorEnd();

        return $html;
    }
}
