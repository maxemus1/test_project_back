<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 28.08.2018
 * Time: 16:56
 */

namespace App\Parser;

use Illuminate\Support\Facades\DB;

class DbModel
{
    /**
     * Метод возвращет данные из БД( ip , Бразуер, os, url с которого заходил клиент первый раз, url на который клиент
     * заходил последний раз число уникальных url)
     *
     * @return array
     */
    public function getData()
    {
        $objects = DB::select("SELECT clients.browser_name as browser , clients.os_name as os, clients.client_ip as ip, 
             COALESCE(c.to_url, '') as to_url, COALESCE(e.from_url, '') as from_url, COALESCE(b.count_url, 0) as count_url 
             FROM clients
             LEFT JOIN (
                  SELECT max(time_click) as end_time, COUNT(DISTINCT to_url) as count_url,  min(time_click) as start_time, client_ip  
                  FROM clients_url 
                  GROUP BY client_ip) as b 
                  ON b.client_ip = clients.client_ip 
             LEFT JOIN clients_url as c ON b.client_ip = c.client_ip AND c.time_click = b.end_time
             LEFT JOIN clients_url as e ON b.client_ip = e.client_ip AND e.time_click = b.start_time
             ORDER BY b.end_time");

        return $objects;
    }
}