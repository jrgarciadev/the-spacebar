<?php

namespace App\Controller;

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
	public function homepage() {
		return $this->render('article/homepage.html.twig');
	}

	/**
	 * Show a artivle
	 * @param  [String] $slug ]
	 * @return [html]
	 */
	public function show($slug) {
		$comments = [
			'Contrary to popular belief, Lorem Ipsum is not simply random text. ',
			'It has roots in a piece of classical Latin literature from 45 BC',
			'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 "',
		];

		// dump($slug, $this);
		return $this->render('article/show.html.twig', [
			'title'	=> ucwords(str_replace('-', ' ', $slug)),
			'comments'	=> $comments,
			'slug'	=> $slug
		]);
	}

	/**
	 * Return Json Response for new heart it
	 * @param  [String] $slug
	 * @return [JsonResponse]
	 */
	public function toggleArticleHeart($slug) {
		return new JsonResponse(['hearts' => rand(5,100)]);
	}
}