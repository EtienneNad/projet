<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');

    $app->post('/users', \App\Action\UserCreateAction::class);

    $app->get('/livres', \App\Action\affichageLivreAction::class);
    $app->get('/livres/{id}', \App\Action\affichageLivreIDAction::class);
    $app->post('/Addlivres', \App\Action\livreCreateAction::class);
    $app->get('/livre/titre/{titre}', \App\Action\affichageLivreTitreAction::class);
    $app->delete('/DeleteLivres/{id}', \App\Action\livreDeleteAction::class);
    $app->get('/docs/v1', \App\Action\Docs\SwaggerUiAction::class);
    $app->put('/modifierLivre',\App\Action\ModifierLivreAction::class);
};

