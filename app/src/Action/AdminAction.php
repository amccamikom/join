<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AdminAction extends BaseAction
{

    public function home(Request $request, Response $response)
    {
        $this->view->render($response, 'admin.home');

        return $response;
    }

    public function stats(Request $request, Response $response)
    {
        $stats['member'] = $this->db->select('member', '*');
        $stats['registered'] = $this->db->count('member');
        $stats['paid']       = $this->db->count('member', ['status' => 1]);
        $stats['unpaid']     = $this->db->count('member', ['status' => 0]);

        foreach (['web', 'desktop', 'hardware', 'network'] as $divisi) {
            $stats['divisions'][$divisi] = $this->db->count('member', ['divisi' => $divisi]);
        }

        $this->view->render($response, 'admin.stats', compact('stats'));

        return $response;
    }

    public function getLogin(Request $request, Response $response)
    {
        $csrf = [
            'name'  => $request->getAttribute('csrf_name'),
            'value' => $request->getAttribute('csrf_value')
        ];

        $this->view->render($response, 'admin.login', compact('csrf'));

        return $response;
    }

    public function postLogin(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $admin = $this->db->get('admin', '*', ['email' => $data['email']]);

        if (!$admin || !password_verify($data['password'], $admin['password'])) {
            $this->flash->addMessage('error', 'Email/password salah.');
            return $response->withStatus(401)->withHeader('Location', $this->router->pathFor('admin.login'));
        }

        $_SESSION['authenticated'] = true;
        $_SESSION['admin_id'] = $admin['id'];

        return $response->withStatus(200)->withHeader('Location', $this->router->pathFor('admin'));
    }

    public function postLogout(Request $request, Response $response)
    {
        unset($_SESSION['authenticated']);
        unset($_SESSION['admin_id']);
        session_destroy();

        return $response->withHeader('Location', $this->router->pathFor('admin'));
    }
}
