<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property string $client_ip
 * @property string $browser_name
 * @property string $os_name
 * Class ClientsUrl
 * @package App
 */
class Clients extends Model
{
    public $timestamps = false;
    protected $table = 'clients';
    protected $primaryKey = 'client_ip';

    /**
     * @return array
     */
    public function toApi()
    {
        $result = [
            'client_ip' => $this->client_ip,
            'browser_name' => $this->browser_name,
            'os_name' => $this->os_name,
        ];
        return $result;
    }
}
