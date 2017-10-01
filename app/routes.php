<?php
// Routes

$app->group('/admin', function () {
	$this->get('/login', 'App\Action\AdminAction:getLogin')->setName('admin.login')->add(App\Middlewares\RedirectIfAuthed::class);
    $this->post('/login', 'App\Action\AdminAction:postLogin');
	$this->post('/logout', 'App\Action\AdminAction:postLogout')->setName('admin.logout');

    $this->post('/members', 'App\Action\MemberAction:getData')->setName('member.data');
    $this->post('/members/edit', 'App\Action\MemberAction:editData')->setName('member.edit');
    $this->post('/members/delete', 'App\Action\MemberAction:deleteData')->setName('member.delete');

    $this->get('/settings', 'App\Action\SettingsAction:getSettings')->setName('admin.settings')->add(App\Middlewares\AuthMiddleware::class);
    $this->post('/settings', 'App\Action\SettingsAction:postSettings')->add(App\Middlewares\AuthMiddleware::class);

    $this->get('/stats', 'App\Action\AdminAction:stats')->setName('admin.stats')->add(App\Middlewares\AuthMiddleware::class);
    $this->get('/export', 'App\Action\ExportAction:export')->setName('admin.export')->add(App\Middlewares\AuthMiddleware::class);
	$this->get('/', 'App\Action\AdminAction:home')->setName('admin')->add(App\Middlewares\AuthMiddleware::class);
});

$app->get('/', 'App\Action\HomeAction:home')->setName('home')->add($app->getContainer()->get('csrf'));
$app->post('/', 'App\Action\HomeAction:register')->add($app->getContainer()->get('csrf'))->add('App\Middlewares\CheckRegisteredMiddleware:run');
