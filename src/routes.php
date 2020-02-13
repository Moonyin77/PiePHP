<?php

use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/registera', ['controller' => 'user', 'action' => 'add']);
Router::connect('/register', ['controller' => 'user', 'action' => 'register']);
Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/profil', ['controller' => 'user', 'action' => 'profil']);
Router::connect('/edit', ['controller' => 'user', 'action' => 'edit']);
Router::connect('/delete', ['controller' => 'user', 'action' => 'delete']);
Router::connect('/deco', ['controller' => 'user', 'action' => 'deco']);
Router::connect('/pangolin', ['controller' => 'pangolin', 'action' => 'pango']);

