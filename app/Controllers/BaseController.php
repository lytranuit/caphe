<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];
    protected $data = [];
    /**
     * Constructor.
     */

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        // $this->session = \Config\Services::session();
        $session = \Config\Services::session();
        $language = \Config\Services::language();
        $language->setLocale($session->lang);
        //$module = $this->router->fetch_module();
        //$class = $this->router->fetch_class(); // class = controller
        //$method = $this->router->fetch_method();
        $router = service('router');
        $controller  = $router->controllerName();
        $method = $router->methodName();
        $explode = explode("\\", $controller);
        $content = "frontend" . "/" . strtolower($explode[count($explode) - 1]) . "/" . $method;


        //echo $content;
        //die();
        $this->data['content'] = $content;
        $this->data['template'] = "main";
        $this->data['title'] = " | Huy t??ng Coffee";
    }
}
