<?php

namespace App\Action;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use App\Domain\User\Repository\livreCreatorRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class livreCreateAction
{
    private $livreCreator;

    public function __construct(livreCreatorRepository $livreCreator)
    {
        $this->livreCreator = $livreCreator;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $id = $this->livreCreator->insertLivre($data);

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
