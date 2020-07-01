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

