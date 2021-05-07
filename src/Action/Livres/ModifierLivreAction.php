<?php

namespace App\Action\Livres;
use App\Domain\User\Repository\Livres\ModifierLivreRepository;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ModifierLivreAction
{
    private $ModifierLivre;

    public function __construct(ModifierLivreRepository $ModifierLivre)
    {
        $this->ModifierLivre = $ModifierLivre;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $id = $this->ModifierLivre->ModificationLivre($data);

        // Transform the result into the JSON representation
        $result = [
            'id' => $id
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
