<?php


namespace App\Action\Livres;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Domain\User\Repository\Livres\affichageLivreRepository;

final class affichageLivreAction
{
    private $affichageLivre;

    public function __construct(affichageLivreRepository $affichageLivre)
    {
        $this->affichageLivre = $affichageLivre;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        $titre = $this->affichageLivre->affichageLivre();
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