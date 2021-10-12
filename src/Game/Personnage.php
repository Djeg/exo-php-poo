<?php

namespace App\Game;

/**
 * Ceci est un personnage
 */
class Personnage
{
    private int $vie = 100;

    private int $attaque = 40;

    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Permet d'afficher un personnage en utilisant
     * echo.
     */
    public function afficher(): void
    {
        echo 'Perso : ' . $this->name . '</br />';
        echo 'Vie : ' . $this->vie . '<br />';
        echo 'Attaque : ' . $this->attaque . '<br />';
    }

    public function attaquer(Personnage $victime): void
    {
        $victime->vie -= $this->attaque;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAttaque(): int
    {
        return $this->attaque;
    }

    public function setAttaque(int $attaque): void
    {
        $this->attaque = $attaque;
    }
}
