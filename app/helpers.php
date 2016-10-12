<?php
$container = $app->getContainer();

function flash($key=null) {
    $flash = $container['flash'];
    $messages = $flash->getMessages();

    if (!is_null($key)) {
        $messages = $messages[$key];

        if (count($messages) == 1) {
            return $messages[0];
        }
    }

    return $messages;
}
