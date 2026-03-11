<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ExampleDto;
use App\Form\ExampleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'homepage')]
final class HomeController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        $data = new ExampleDto();
        $form = $this
            ->createForm(ExampleType::class, $data)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($data);
        }

        return $this->render('home.html.twig', [
            'form' => $form,
        ]);
    }
}
