<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeAction extends BaseAction
{

    public function home(Request $request, Response $response)
    {
        $csrf = [
            'name'  => $request->getAttribute('csrf_name'),
            'value' => $request->getAttribute('csrf_value')
        ];

        $this->view->render($response, 'home', compact('csrf'));

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

        $inserted = $this->db->get('member', 'nim', ['nim' => $data['nim']]);

        if (empty($inserted)) {
            $this->flash->addMessage('error', 'Terjadi kesalahan saat menyimpan data.');

            return $response->withStatus(500)->withHeader('Location', $this->router->pathFor('home'));
        }

        $this->flash->addMessage('success', 'Terima kasih telah mendaftar. Pembayaran dapat dilakukan di Aula BSC. :)');

        return $response->withStatus(200)->withHeader('Location', $this->router->pathFor('home'));
    }
}
