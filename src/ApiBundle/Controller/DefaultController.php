<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
	/**
	 * @Route("/")
	 */
	public function indexAction()
	{
		return $this->render('ApiBundle:Default:index.html.twig');
	}

	// Added from FOSOAuthServerBundle tutorial
	/**
	 * @Route("/api/articles")
	 */
	public function articlesAction()
	{
		$articles = array('article1', 'article2', 'article3');
		return new JsonResponse($articles);
	}

	/**
	 * @Route("/api/user")
	 */
	public function userAction()
	{
		$user = $this->container->get('security.context')->getToken()->getUser();
		if($user) {
			return new JsonResponse(array(
				'id' => $user->getId(),
				'username' => $user->getUsername()
			));
		}

		return new JsonResponse(array(
			'message' => 'User is not identified'
		));
	}
	// End Added from FOSOAuthServerBundle tutorial
}
