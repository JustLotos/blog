<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController
{
    #[Route('/')]
    public function mainPage(): Response
    {
        return new Response(
            '<html><body>Lucky number: 1234</body></html>'
        );
    }

    #[Route('/bd')]
    public function bdConnect(): Response
    {
        $connect_data = "host=postgres port=5432 dbname=app user=pguser password=pguser";
        $db_connect = pg_connect($connect_data);
        if (!$db_connect) {
            die("Ошибка подключения: " . pg_result_error());
        }
        $result = '<html>
        <head>
            <meta charset="utf-8">
            <title>PostgreSQL query example</title>
        </head>
        <body>';

        $query = pg_query($db_connect, "SELECT * FROM users");
        if (!$query) {
            die ("Ошибка выполнения запроса");
        }
        while ($user = pg_fetch_array($query)) {
            $result .= '<p>'.implode(',', $user).'</p>';
        }
        $result .= '</body></html>';

        return new Response($result);
    }
}