<?php

namespace App\Controller;

use App\Entity\IpmReportByServerName;
use App\Repository\IpmReportByServerNameRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pinboard\Utils\Utils;
use Algo26\IdnaConvert\ToUnicode;

class MainController extends AbstractController
{
    #[Route('/', methods: ['GET'])]
    public function indexAction(): Response
    {
        $result = [];

//        if (!$this->isUserLogged()) {
//            return $this->redirectToRoute('login');
//        }

//        $servers = $this->getDoctrine()
//            ->getRepository('IpmReportByServerNameRepository')
//            ->findAllServers();

//        $result['servers'] = (new IpmReportByServerNameRepository())->findAllServers();

        $idn = new ToUnicode();

        $total = [
            'req_count' => 0,
            'error_count' => 0
        ];

        foreach ($result['servers'] as &$item) {
            if (stripos($item['server_name'], 'xn--') !== false) {
                $item['server_name'] = $idn->convertUrl($item['server_name']);
            }

            $item['req_per_sec'] = number_format($item['req_per_sec'], 3, ',', '');

            $total['req_count'] += $item['req_count'];
            $total['error_count'] += $item['error_count'];
        }

        $result['total'] = $total;

//        return $this->render('index.html.twig', $result);
        return $this->render('index.html.twig', []);
    }
}