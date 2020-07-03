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
Router::connect('/sanctions', ['controller' => 'litebans', 'action' => 'index', 'plugin' => 'litebans']);
Router::connect('/sanctions/bans', ['controller' => 'litebans', 'action' => 'index', 'plugin' => 'litebans']);
Router::connect('/sanctions/profile', ['controller' => 'profile', 'action' => 'index', 'plugin' => 'litebans']);
Router::connect('/sanctions/warnings', ['controller' => 'warnings', 'action' => 'index', 'plugin' => 'litebans']);
Router::connect('/sanctions/kicks', ['controller' => 'kicks', 'action' => 'index', 'plugin' => 'litebans']);
Router::connect('/sanctions/mutes', ['controller' => 'mutes', 'action' => 'index', 'plugin' => 'litebans']);

