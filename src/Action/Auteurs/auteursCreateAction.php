<?php

namespace App\Action\Auteurs;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use App\Domain\User\Repository\Auteurs\auteursCreatorRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class auteursCreateAction
{
    private $auteursCreator;

    public function __construct(auteursCreatorRepository $auteursCreator)
    {
        $this->auteursCreator = $auteursCreator;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = $request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $id = $this->auteursCreator->insertAuteurs($data);

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
