<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');
    $app->post('/users', \App\Action\UserCreateAction::class);

    // Livres
    $app->get('/livres', \App\Action\Livres\affichageLivreAction::class);
    $app->get('/livres/{id}', \App\Action\Livres\affichageLivreIDAction::class);
    $app->post('/Addlivres', \App\Action\Livres\livreCreateAction::class);
    $app->get('/livre/titre/{titre}', \App\Action\Livres\affichageLivreTitreAction::class);
    $app->delete('/DeleteLivres/{id}', \App\Action\Livres\livreDeleteAction::class);
    $app->put('/modifierLivre',\App\Action\Livres\ModifierLivreAction::class);

    // Auteurs
    $app->get('/Auteurs', \App\Action\Auteurs\affichageAuteursAction::class);
    $app->get('/Auteurs/{id}', \App\Action\Auteurs\affichageAuteursIDAction::class);
    $app->post('/AddAuteurs', \App\Action\Auteurs\auteursCreateAction::class);

    //Docs
    $app->get('/docs/v1', \App\Action\Docs\SwaggerUiAction::class);

};

