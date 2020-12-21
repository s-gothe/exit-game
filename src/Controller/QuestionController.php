<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class QuestionController
 * @package App\Controller
 */
class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @return Response
     */
    public function homepage(): Response
    {
        return $this->render('question/homepage.html.twig');
    }

    /**
     * @Route("/question/{slug}", name="app_question_show")
     * @param $slug
     * @return Response
     */
    public function show(string $slug): Response
    {
        $anwsers = [
            'Make sure your cat is sitting purrfectly still ;)',
            'Honestly, I like furry shoes better then MY cat',
            'Maybe... tra saying the spell backwards?'
        ];

        return $this->render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $anwsers
        ]);
    }
}