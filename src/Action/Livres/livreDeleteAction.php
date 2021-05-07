<?php

namespace App\Action\Livres;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use App\Domain\User\Repository\Livres\livreDeleteRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class livreDeleteAction
{
    private $livreDelete;

    public function __construct(livreDeleteRepository $livreDelete)
    {
        $this->livreDelete = $livreDelete;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = $request->getAttribute('id');
        $int = (int)$data;
        // Invoke the Domain with inputs and retain the result
       $id = $this->livreDelete->DeleteLivre($int);

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($id));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
