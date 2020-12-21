<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CommentController
 * @package App\Controller
 */
class CommentController extends AbstractController
{
    /**
     * @Route("/comments/{id}/vote/{direction<up|down>}", methods="POST")
     * @param int $id
     * @param string $direction
     * @param LoggerInterface $logger
     * @return JsonResponse
     * @throws Exception
     */
    public function commentVote(int $id, string $direction, LoggerInterface $logger): JsonResponse
    {
        if ($direction === 'up') {
            $logger->info('vote up');
            $currentVoteCount = random_int(7, 100);
        } else {
            $logger->info('vote down');
            $currentVoteCount = random_int(0, 5);
        }

        return $this->json(['votes' => $currentVoteCount]);
    }
}