<?php

/**
 * Intersect CMS Unleashed
 * 2.3 Update
 * Last modify : 04/04/2022 at 11:28
 * Author : XFallSeane
 * Website : https://intersect.thomasfds.fr
 */

namespace App\Controller;

use App\Settings\Api;
use App\Settings\Settings as CmsSettings;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GuildController extends AbstractController
{

    

    public function __construct(
        protected CmsSettings $settings, 
        protected Api $api, 
        protected CacheInterface $cache, 
        protected PaginatorInterface $paginator)
    {
    }

    #[Route(path: '/guilds', name: 'guilds')]
    public function index(Request $request): Response
    {
        $guildsRequest = $this->cache->get('guilds', function (ItemInterface $item)  {
            return $this->api->getAllGuilds()["Values"];
        });

        $guilds = $this->paginator->paginate(
            $guildsRequest,
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );


        return $this->render($this->settings->get('theme') . '/guild/index.html.twig', [
            'guilds' => $guilds,
        ]);
    }
}
