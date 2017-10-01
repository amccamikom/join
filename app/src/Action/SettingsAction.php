<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class SettingsAction extends BaseAction
{
    public function getSettings(Request $request, Response $response)
    {
        $settings = $this->getAllSettings();

        $this->view->render($response, 'admin.settings', compact('settings'));

        return $response;
    }

    public function postSettings(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $this->saveAllSettings($data);

        return $response->withStatus(200)->withHeader('Location', $this->router->pathFor('admin.settings'));
    }

    public function getAllSettings()
    {
        $settings = $this->db->select('settings', '*');
        $mappedSettings = [];

        foreach ($settings as $setting) {
            $mappedSettings[$setting['name']] = $setting['value'];
        }

        return $mappedSettings;
    }

    public function saveAllSettings($settings)
    {
        foreach ($settings as $key => $value) {
            $updated = $this->db->update('settings', ['value' => $value], ['name' => $key]);

            if (!$updated) {
                $this->db->insert('settings', ['name' => $key, 'value' => $value]);
            }
        }
    }
}
