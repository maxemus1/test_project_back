<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 27.08.2018
 * Time: 13:51
 */

namespace App\Parser;

use App\Model\Clients;
use App\Model\ClientsUrl;


class ClientsManager

{
    /**
     * Метод читает массив строк и записывает в бд
     *
     * @param array $data массивстрок
     *
     * @return $this
     */
    public function clientManager($data)
    {
        foreach ($data as $row) {
            $clients = new Clients();
            $clients->client_ip = $row[0];
            $clients->browser_name = $row[1];
            $clients->os_name = $row[2];
            $clients->save();
        }
        return $this;
    }

    /**
     * Метод читает массив строк и записывает в бд
     *
     * @param array $data массивстрок
     *
     * @return $this
     */
    public function ManagerUrl($data)
    {
        foreach ($data as $row) {
            $url = new ClientsUrl();
            $url->client_ip = $row[2];
            $url->from_url = $row[3];
            $url->to_url = $row[4];
            $url->time_click = $row[0] . ' ' . $row[1];
            $url->save();
        }
        return $this;
    }
}