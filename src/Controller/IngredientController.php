<?php

namespace App\Controller;

use App\Repository\IngredientRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IngredientController extends AbstractController
{


    /**
     *  This function display all ingredients
     * 
     * @param IngredientRepository $repossitory
     * @param PaginatorIterface $paginator
     * @param Request $request
     * @return Response
     */

    #[Route('/ingredient', name: 'app_ingredient', methods:['GET'])]
    // On importe le repository dans la fonction index();
    public function index(IngredientRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $ingredient = $paginator->paginate(
            $ingredient = $repository->findAll(),
            $request->query->getInt('page', 1),
            10 
        );
        return $this->render('pages/ingredient/index.html.twig',[
            'ingredients' => $ingredient
        ]);
    }
}
