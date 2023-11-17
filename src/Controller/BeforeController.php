<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Algo26\IdnaConvert\ToUnicode;
use Pinboard\Utils\Utils;

class BeforeController extends AbstractController
{
    // Не в том месте
    #[Route('/before', name: 'before')]
    public function actionBefore(): Response
    {
        $result = [
            'servers' => []
        ];

        $params = [
            'created_at' => date('Y-m-d H:00:00', strtotime('-1 day'))
        ];

        $hostsRegexp = Utils::getUserAccessHostsRegexp($app);
        $hostsWhere = '';

        if ($hostsRegexp !== '.*') {
            $hostsRegexp = is_array($hostsRegexp) ? $hostsRegexp : [$hostsRegexp];
            $hostsWhere = " AND (server_name REGEXP '" . implode("' OR server_name REGEXP '", $hostsRegexp) . "')";
        }

        $sql = "
            SELECT
                server_name, count(created_at) cnt
            FROM
                ipm_report_by_server_name
            WHERE
                created_at >= :created_at AND
                server_name IS NOT NULL AND server_name != ''
                $hostsWhere
            GROUP BY
                server_name
            HAVING
                cnt > 10
            ORDER BY
                server_name
        ";

        $stmt = $app['db']->executeCacheQuery($sql, $params, [], new QueryCacheProfile(60 * 60));
        $list = $stmt->fetchAll();
        $stmt->closeCursor();


        $idn = new ToUnicode();

        $ips = [];
        foreach ($list as $data) {
            if (stripos($data['server_name'], 'xn--') !== false) {
                $data['server_name'] = $idn->convertUrl($data['server_name']);
            }

            if (preg_match('/\d+\.\d+\.\d+\.\d+/', $data['server_name'])) {
                $ips[$data['server_name']] = $data;
            } else {
                $domainParts = explode('.', $data['server_name']);
                if (count($domainParts) > 1) {
                    $baseDomain = $domainParts[count($domainParts) - 2] . '.' . $domainParts[count($domainParts) - 1];
                } else {
                    $baseDomain = $data['server_name'];
                }
                $result['servers'][$baseDomain][$data['server_name']] = $data;
            }
        }

        ksort($result['servers']);
        if (count($ips)) {
            $result['servers']['IPs'] = $ips;
        }

        $app['menu'] = $result;
    }
}