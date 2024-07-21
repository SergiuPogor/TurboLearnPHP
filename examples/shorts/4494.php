<?php

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Post;
use App\Entity\Comment;

class PostService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPostsWithCommentsLazyLoading(): array
    {
        $posts = $this->entityManager->getRepository(Post::class)->findAll();

        foreach ($posts as $post) {
            // Lazy loading of comments for each post
            $comments = $post->getComments(); // Fetches comments when accessed
        }

        return $posts;
    }

    public function getPostsWithCommentsEagerLoading(): array
    {
        $query = $this->entityManager->createQuery(
            'SELECT p, c FROM App\Entity\Post p LEFT JOIN p.comments c'
        );

        // Eager loading of comments for all posts in one query
        $posts = $query->getResult();

        return $posts;
    }
}

// Example usage
$entityManager = $container->get(EntityManagerInterface::class);
$postService = new PostService($entityManager);

// Lazy loading example
$postsLazy = $postService->getPostsWithCommentsLazyLoading();

// Eager loading example
$postsEager = $postService->getPostsWithCommentsEagerLoading();