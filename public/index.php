<?php


require './vendor/autoload.php';

use App\HTML\Element;
use App\HTML\Form;

$separator = new Element('div', ['class' => 'form-control']);
$form = new Form($separator);

echo $form->start();
echo $form->widget('Email :', 'email');
echo $form->widget('Mot de passe :', 'password');

echo $form->separatorStart();
echo $form->submitButton('Envoyer');
echo $form->separatorEnd();
echo $form->end();
