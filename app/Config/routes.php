<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	//Router::connect('/admin/usuarios/login', array('controller' => 'Users', 'action' => 'login'));

	Router::connect('/', array('controller' => 'Users', 'action' => 'login'));

	

	#Ruta para el dashboard
	Router::connect('/dashboard', array('controller' => 'Users','action'=>'dashboard'));
	#Router::connect('/dashboard/:action/*', array('controller' => 'users'));

	Router::connect("/admin/dashboard", array('controller' => 'Users','action'=>'dashboard','prefix' => 'admin', 'admin' => true));

    #ruta para el admin logout
	//Router::connect("/admin/logout", array('controller' => 'Users','action'=>'logout','admin' => false));
	Router::connect("/logout", array('controller' => 'Users','action'=>'logout','admin' => false));

	//Router::connect("/admin/users/login", array('controller' => 'Users','action'=>'logout','admin' => false));

	#ruta para las partes

	//1. landing page

	Router::connect('/punto_de_partida', array('controller' => 'Users','action'=>'landing'));

	//2. Parte 1

	Router::connect('/primera_parte', array('controller' => 'Users','action'=>'first'));

	//3. Parte 2

	Router::connect('/segunda_parte', array('controller' => 'Users','action'=>'second'));

	//4. Parte 3

	Router::connect('/tercera_parte', array('controller' => 'Users','action'=>'third'));

	//5. Parte 4

	Router::connect('/cuarta_parte', array('controller' => 'Users','action'=>'fourth'));

	//6. Parte 5

	Router::connect('/quinta_parte', array('controller' => 'Users','action'=>'fifth'));

	//7. Enviar

	//Router::connect('/punto_de_partida', array('controller' => 'Users','action'=>'landing'));

	//aplicacion

	Router::connect('/aplicacion/*', array('controller' => 'Aplicaciones','action'=>'aplicacion'));

	Router::connect('/registro', array('controller' => 'Users','action'=>'registro2'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
