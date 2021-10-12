<?php

namespace App\Game;

class Magicien extends Personnage
{
    public function afficher(): void
    {
        echo '<strong>Magicien !</strong><br/>';

        parent::afficher();
    }

    public function attaquer(Personnage $victim): void
    {
        parent::attaquer($victim);

        $victim->vie = $victim->vie - 20;
    }
}
