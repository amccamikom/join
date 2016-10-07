<?php
// Routes

$app->group('/admin', function () {
	$this->get('/login', 'App\Action\AdminAction:getLogin')->setName('admin.home');
	$this->post('/login', 'App\Action\AdminAction:postLogin');

	$this->get('/', 'App\Action\AdminAction:home')->setName('admin.home');
});

$app->get('/', 'App\Action\HomeAction:home')->setName('home');
$app->post('/', 'App\Action\HomeAction:register');
