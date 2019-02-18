<?php
/**
 * @file
 * Contains \Drupal\featuredservices\featuredservicesController.
 */

namespace Drupal\featuredservices\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class featuredservicesController extends ControllerBase {
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
