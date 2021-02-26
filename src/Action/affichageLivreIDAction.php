<?php


namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Domain\User\Repository\affichageLivreIDRepository;

final class affichageLivreIDAction
{
    private $affichageLivreID;

    public function __construct(affichageLivreIDRepository $affichageLivreID)
    {
        $this->affichageLivreID = $affichageLivreID;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        $id=$request->getAttribute('id');
        $titre = $this->affichageLivreID->affichageLivreID($id);
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