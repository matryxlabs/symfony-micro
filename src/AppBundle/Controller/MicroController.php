<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class MicroController
 * @package AppBundle\Controllers
 */
class MicroController extends Controller {

  /**
   * @Route("/test/{limit}")
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