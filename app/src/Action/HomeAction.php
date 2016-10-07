<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeAction extends BaseAction
{

    public function home(Request $request, Response $response)
    {
        //$this->logger->info("Home page action dispatched");

        $this->view->render($response, 'home');
        return $response;
    }

    public function register(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $id = $this->db->insert('member', [
            'nim'          => $data['nim'],
            'alamat'       => $data['address'],
            'asal_sekolah' => $data['school'],
            'divisi'       => $data['division'],
            'email'        => $data['email'],
            'nama'         => $data['fullname'],
            'noHp'         => $data['phone'],
            'noReg'        => 0,
            'status'       => 0
        ]);

        if (!$id) {

        }
    }
}
