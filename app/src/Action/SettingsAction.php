<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class SettingsAction extends BaseAction
{
    public function getSettings(Request $request, Response $response)
    {
        $csrf = [
            'name'  => $request->getAttribute('csrf_name'),
            'value' => $request->getAttribute('csrf_value')
        ];

        $this->view->render($response, 'admin.settings', compact('csrf'));

        return $response;
    }

    public function postSettings(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        return $response->withStatus(200)->withHeader('Location', $this->router->pathFor('admin.settings'));
    }
}
