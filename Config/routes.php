<?php

/*
 * Comment créer des routes ?
 * Router::connect('[1]', ['controller' => '[2]', 'action' => '[3]', 'plugin' => '[4]']);
 *
 * [1] Url ex : /galerievideo
 * [2] Contrôleur : Tutorial si le nom de votre contrôleur est TutorialController.php
 * [3] Fonction à l'intérieur du contrôleur
 * [4] Nom du plugin
 */
Router::connect('/sanction', ['controller' => 'litebans', 'action' => 'index', 'plugin' => 'litebans']);
Router::connect('/sanction/search', ['controller' => 'litebans', 'action' => 'search', 'plugin' => 'litebans']);
Router::connect('/sanction/bans', ['controller' => 'litebans', 'action' => 'index', 'plugin' => 'litebans']);
Router::connect('/sanction/bans?search=:slug', ['controller' => 'litebans', 'action' => 'searchBans', 'plugin' => 'litebans']);

Router::connect('/sanction/profile', ['controller' => 'profile', 'action' => 'index', 'plugin' => 'litebans']);
Router::connect('/sanction/warnings', ['controller' => 'warnings', 'action' => 'index', 'plugin' => 'litebans']);
Router::connect('/sanction/kicks', ['controller' => 'kicks', 'action' => 'index', 'plugin' => 'litebans']);
Router::connect('/sanction/mutes', ['controller' => 'mutes', 'action' => 'index', 'plugin' => 'litebans']);

