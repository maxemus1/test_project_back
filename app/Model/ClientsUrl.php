<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property string $client_ip
 * @property string $from_url
 * @property string $to_url
 * @property string $time_click
 * Class ClientsUrl
 * @package App
 */
class ClientsUrl extends Model
{
    public $timestamps = false;
    protected $table = 'clients_url';

    /**
     * @return array
     */
    public function toApi()
    {
        $result = [
            'id' => $this->id,
            'client_ip' => $this->client_ip,
            'from_url' => $this->from_url,
            'to_url' => $this->to_url,
            'time_click' => $this->time_click,
        ];
        return $result;
    }
}
