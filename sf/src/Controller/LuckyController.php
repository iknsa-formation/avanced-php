<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @return Response
     * @throws \Exception
     * @Route("lucky/number/{id}")
     */
    public function number($id) {
        $number = random_int(1, 100);
        $tab = [1,2,5,58,6,99,8];
        return $this->render("lucky/index.html.twig", [
            'number' => $number,
            'tab' => $tab,
            'text' => 'un texte à mettre en majuscule ' . $id
        ]);
    }
}
