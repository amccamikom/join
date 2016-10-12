<?php
namespace App\Middlewares;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
*
*/
class CheckRegisteredMiddleware
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    function run(Request $request, Response $response, $next)
    {
        $member = $this->container->db->count('member', [
            'nim' => $request->getParsedBody()['nim']
        ]);

        if ($member > 0) {
            $this->container->flash->addMessage('success', 'Kamu sudah mendaftar sebagai member. :)');

            return $response->withStatus(200)->withHeader('Location', $this->container->router->pathFor('home'));
        }

        return $next($request, $response);
    }
}
