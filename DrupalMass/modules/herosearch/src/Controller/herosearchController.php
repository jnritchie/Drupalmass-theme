<?php
/**
 * @file
 * Contains \Drupal\herosearch\herosearchController.
 */

namespace Drupal\herosearch\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

//Use if this Block will use Quad Services
//use Drupal\quadservices\Controller\QuadservicesController;

class herosearchController extends ControllerBase {
    public function api_handler(Request $request) {
        $quadServices = new QuadservicesController;

        $request_array = $this->make_param_array($request);
        $return_array['ok'] = 1;
        return new JsonResponse($return_array);
    }

    public function make_param_array(Request $request) {
        $request_array = $_GET;
        return $request_array;
    }


}
