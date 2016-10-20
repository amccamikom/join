<?php
// Routes

$app->group('/admin', function () {
	$this->get('/login', 'App\Action\AdminAction:getLogin')->setName('admin.login')->add(App\Middlewares\RedirectIfAuthed::class);
    $this->post('/login', 'App\Action\AdminAction:postLogin');
	$this->post('/logout', 'App\Action\AdminAction:postLogout')->setName('admin.logout');

    $this->post('/members', 'App\Action\MemberAction:getData')->setName('member.data');
    $this->post('/members/edit', 'App\Action\MemberAction:editData')->setName('member.edit');

	$this->get('/', 'App\Action\AdminAction:home')->setName('admin')->add(App\Middlewares\AuthMiddleware::class);
});

$app->get('/', 'App\Action\HomeAction:home')->setName('home')->add($app->getContainer()->get('csrf'));
$app->post('/', 'App\Action\HomeAction:register')->add($app->getContainer()->get('csrf'))->add('App\Middlewares\CheckRegisteredMiddleware:run');
