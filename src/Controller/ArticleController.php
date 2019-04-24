<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * ArticleController Class
 */
class ArticleController
{	

	function homepage() {
		return new Response('OMG! My first page already! Woo!');
	}

	function show ($slug) {
		return new Response(sprintf('Feature page to show article: %s', $slug));	
	}
}