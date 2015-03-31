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
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
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
                                               //controllernya     //function di controller , //nama viewnya misal index.ctp jadi index
	Router::connect('/', array('controller' => 'homes', 'action' => 'home', 'home')); // default nya ke halaman login
    
    Router::connect('/home', array('controller' => 'homes', 'action' => 'home'));
    Router::connect('/index.html', array('controller' => 'homes', 'action' => 'home'));
    Router::connect('/logout', array('controller' => 'homes', 'action' => 'logout'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
    $prefix_admin = "admin";
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));// lebih mengefisienkan alamt url, misal localhost/namaweb/pages maka larinya ke controller users 
    Router::connect('/'.$prefix_admin, array('controller' => 'users', 'action' => 'login', $prefix_admin => true, 'prefix' => $prefix_admin));
    Router::connect('/'.$prefix_admin.'/login', array('controller' => 'users', 'action' => 'login', $prefix_admin => true, 'prefix' => $prefix_admin));
    Router::connect('/'.$prefix_admin.'/logout', array('controller' => 'users', 'action' => 'logout', $prefix_admin => true, 'prefix' => $prefix_admin));
    Router::connect('/'.$prefix_admin.'/users', array('controller' => 'users', 'action' => 'index', $prefix_admin => true, 'prefix' => $prefix_admin));
    Router::connect('/'.$prefix_admin.'/categorys', array('controller' => 'categorys', 'action' => 'index', $prefix_admin => true, 'prefix' => $prefix_admin));
    Router::connect('/'.$prefix_admin.'/products', array('controller' => 'products', 'action' => 'index', $prefix_admin => true, 'prefix' => $prefix_admin));
    Router::connect('/'.$prefix_admin.'/purchases', array('controller' => 'purchases', 'action' => 'index', $prefix_admin => true, 'prefix' => $prefix_admin));
    
/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
