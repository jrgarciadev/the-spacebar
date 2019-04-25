<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * ArticleController Class
 */
class ArticleController extends AbstractController
{	

	/**
	 * Home Page for the web
	 * @return [html]
	 */
	public function homepage(EntityManagerInterface $em){
		$repository = $em->getRepository(Article::class);
        $articles = $repository->findAllPublishedOrderedByNewest();
		return $this->render('article/homepage.html.twig', [
			'articles'	=> $articles
		]);
	}

	/**
	 * Show a article
	 * @param  [String] $slug 
	 * @return [html]
	 */
	public function show($slug, EntityManagerInterface $em) {
		$comments = [
			'Contrary to popular belief, Lorem Ipsum is not simply random text. ',
			'It has roots in a piece of classical Latin literature from 45 BC',
			'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 "',
		];
		
		$repository = $em->getRepository(Article::class);
        /** @var Article $article */
        $article = $repository->findOneBy(['slug' => $slug]);

        if (!$article) {
            return new Response("No article for slug $slug");
        }
		// dump($slug, $this);
		// ucwords(str_replace('-', ' ', $slug))
		return $this->render('article/show.html.twig', [
			'article'	=> $article,
			'comments'	=> $comments,
		]);
	}

	/**
	 * Return Json Response for new heart it
	 * @param  [String] $slug
	 * @return [JsonResponse]
	 */
	public function toggleArticleHeart(Article $article, LoggerInterface $logger,EntityManagerInterface $em) {
		// $article->setHeartCount($article->getHeartCount() + 1);
		$article->incrementHeartCount();
		$em->flush();
        $logger->info('Article is being hearted!');
		return new JsonResponse(['hearts' => $article->getHeartCount()]);
	}
}