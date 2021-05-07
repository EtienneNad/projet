<?php


namespace App\Action\Livres;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Domain\User\Repository\Livres\affichageLivreTitreRepository;

final class affichageLivreTitreAction
{
    private $affichageLivreTitre;

    public function __construct(affichageLivreTitreRepository $affichageLivreTitre)
    {
        $this->affichageLivreTitre= $affichageLivreTitre;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        $titre=$request->getAttribute('titre');
        $book = $this->affichageLivreTitre->affichageLivreTitre($titre);
        $result = ([
             'titre' => $book
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