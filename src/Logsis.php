<?php

namespace AndreyArtamonov\Logsis;

use Carbon\Traits\Date;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Carbon;

/**
 * Class Logsis
 * @package AndreyArtamonov\Logsis
 * @property string $apikey
 * @property Client $client
 *
 */
class Logsis
{

    protected $apikey;
    protected $client;

    public function __construct()
    {
        $this->apikey = config('services.logsis.api_key');
        $this->client = new Client(['base_uri' => 'api.logsis.ru/apiv2/']);
    }


    /**
     * @param array $query
     * @return array
     * @throws GuzzleException
     */

    public function getStatus(array $query): array
    {
        $params = [
            'key' => $this->apikey,
            'inner_n' => (array_key_exists('inner_n', $query)) ? $query['inner_n'] : null,
            'order_id' => (array_key_exists('order_id', $query)) ? $query['order_id'] : null
        ];

        $response = $this->client->get('getstatus', ['query' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param string $from
     * @param string $to
     * @return array
     * @throws GuzzleException
     */

    public function getStatusV3(string $from, string $to): array
    {
        $params = [
            'key' => $this->apikey,
            'from' => $from,
            'to' => $to
        ];

        $response = $this->client->post('getstatusv3', ['query' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $query
     * @return array
     * @throws GuzzleException
     */

    public function getZStatus(string $inner_id, string $zorder_id) : array {
        $params = [
            'key' => $this->apikey,
            'inner_n' => $inner_id,
            'zorder_id' => $zorder_id
        ];

        $response = $this->client->get('getzstatus', ['query' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @return array
     * @throws GuzzleException
     */

    public function getAllStatusModel(): array
    {
        $params = [
            'key' => $this->apikey
        ];

        $response = $this->client->post('getallstatusmodel', ['query' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $params
     * @param array $goods
     * @return mixed
     */

    public function createOrder(array $params, array $goods) : array {
        $params = array_merge($params, [
            'key' => $this->apikey,
            'goods' => $goods
        ]);

        $response = $this->client->post('createorder', ['form_params' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $params
     * @param array $goods
     * @return mixed
     * @throws GuzzleException
     */
    public function updateOrder(array $params, array $goods) : array {
        $params = array_merge($params, [
            'key' => $this->apikey,
            'goods' => $goods
        ]);

        $response = $this->client->post('updateOrder', ['form_params' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */
    public function confirmOrder(array $params) : array {
        $params = array_merge($params, [
            'key' => $this->apikey
        ]);

        $response = $this->client->post('confirmorder', ['form_params' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */
    public function changeDate(array $params) : array {
        $params = array_merge($params, [
            'key' => $this->apikey
        ]);

        $response = $this->client->post('changeDate', ['form_params' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */
    public function newZOrder(array $params) : array {
        $params = array_merge($params, [
            'key' => $this->apikey
        ]);

        $response = $this->client->post('newzorder', ['form_params' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */
    public function orderLabels(array $params) : array {
        $params = array_merge($params, [
            'key' => $this->apikey,
        ]);

        $response = $this->client->post('order-labels', ['form_params' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */
    public function orderLabelsData(array $params) : array {
        $params = array_merge($params, [
            'key' => $this->apikey,
        ]);

        $response = $this->client->post('order-labels-data', ['form_params' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param string $key
     * @return mixed
     * @throws GuzzleException
     */
    public function testKey(string $key) : array {
        $response = $this->client->get('testkey', ['query' => [
            'key' => $key
        ]]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $orders
     * @return mixed
     * @throws GuzzleException
     */
    public function sendAct(array $orders) : array {
        $params = [
            'key' => $this->apikey,
            'orders' => $orders
        ];

        $response = $this->client->post('sendact', ['form_params' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */
    public function calculate(array $params) : array {
        $params = array_merge($params, [
            'key' => $this->apikey,
        ]);

        $client = new Client();

        $response = $client->post('http://api.logsis.ru/api/v1/public/calculate', ['form_params' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */

    public function returnActs(array $params) : array {
        $params = array_merge($params, [
            'key' => $this->apikey,
        ]);

        $response = $this->client->get('return-acts', ['query' => $params]);

        return json_decode($response->getBody(), true);
    }
}
