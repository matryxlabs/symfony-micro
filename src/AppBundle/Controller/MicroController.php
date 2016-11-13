<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 1/26/16
 * Time: 8:50 AM
 */

namespace AppBundle\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class MicroController
 * @package AppBundle\Controllers
 */
class MicroController extends Controller {

  /**
   * @Route("/{limit}")
   *
   * @param int $limit
   * @return \Symfony\Component\HttpFoundation\Response
   */

  public function randomAction($limit = 20) {
    if ($limit < 2) {
      $limit = 20;
    }
    $number = rand(0, $limit);

    return $this->render('AppBundle:Default:random.html.twig', [
      'number' => $number,
    ]);

  }
}