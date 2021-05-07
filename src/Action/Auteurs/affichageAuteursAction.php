<?php


namespace App\Action\Auteurs;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Domain\User\Repository\Auteurs\affichageAuteursRepository;

final class affichageAuteursAction
{
    private $affichageAuteurs;

    public function __construct(affichageAuteursRepository $affichageAuteurs)
    {
        $this->affichageAuteurs = $affichageAuteurs;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        $titre = $this->affichageAuteurs->affichageAuteurs();
        $result = ([
             'titre' => $titre
        ]);

        $response->getBody()->write((string)json_encode($result));
        return $response->withHeader('Content-Type', 'application/json');

        /**
         * Changer le code de statut de la réponse
         *
         * return $response
         *          ->withHeader('Content-Type', 'application/json')
         *          ->withStatus(422);
         *
         */



    }
}