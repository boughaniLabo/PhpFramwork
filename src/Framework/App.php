<?php

namespace Framework;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
class App
{
    /** @test */
    public function run(RequestInterface $request ): ResponseInterface
    {
        $uri =$request->getUri()->getPath();
        if (!empty($uri) && $uri[-1]==='/'){
            $response = (new Response())
           ->withStatus(301)
           ->withHeader('Location' , substr($uri , 0 , -1));
            return $response ;
        }
        $response = (new Response())
            ->getBody()->write('Hello');

        return $response ;
    }
}