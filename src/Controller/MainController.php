<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pinboard\Utils\Utils;
use Pinboard\Utils\IDNaConvert;

class MainController extends AbstractController
{
    #[Route('/', methods: ['GET'])]
    public function indexAction(): Response
    {
        $result = [];
        $params = [
            'created_at' => date('Y-m-d H:00:00', strtotime('-1 day')),
        ];

//        if (!$this->isUserLogged()) {
            return $this->redirectToRoute('login');
//        }

//        $hostsRegexp = Utils::getUserAccessHostsRegexp($app);
        $hostsRegexp = '';
        $hostsWhere = '';

        if ($hostsRegexp !== '.*') {
            $hostsRegexp = is_array($hostsRegexp) ? $hostsRegexp : [$hostsRegexp];
            $hostsWhere = " AND (a.server_name REGEXP '" . implode("' OR a.server_name REGEXP '", $hostsRegexp) . "')";
        }

        $sql = "
            SELECT
                a.server_name,
                sum(a.req_count) as req_count,
                avg(a.req_per_sec) as req_per_sec,
                (
                    SELECT
                        count(*)
                    FROM
                        ipm_status_details b
                    WHERE
                        a.server_name = b.server_name AND b.created_at > :created_at
                )
                as error_count
            FROM
                ipm_report_by_hostname_and_server a
            WHERE
                a.created_at > :created_at
                $hostsWhere
            GROUP BY
                a.server_name
        ";

//        $stmt = $app['db']->executeCacheQuery($sql, $params, [], new QueryCacheProfile(60 * 60));
//        $result['servers'] = $stmt->fetchAll();
        $result['servers'] = [];
//        $stmt->closeCursor();

        $idn = new IDNaConvert(['idn_version' => 2008]);

        $total = [
            'req_count' => 0,
            'error_count' => 0
        ];

        foreach ($result['servers'] as &$item) {
            if (stripos($item['server_name'], 'xn--') !== false) {
                $item['server_name'] = $idn->decode($item['server_name']);
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