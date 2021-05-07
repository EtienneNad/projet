<?php


namespace App\Action\Auteurs;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Domain\User\Repository\Auteurs\affichageAuteursIDRepository;

final class affichageAuteursIDAction
{
    private $affichageAuteursID;

    public function __construct(affichageAuteursIDRepository $affichageAuteursID)
    {
        $this->affichageAuteursID = $affichageAuteursID;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        $id=$request->getAttribute('id');
        $titre = $this->affichageAuteursID->affichageAuteursID($id);
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