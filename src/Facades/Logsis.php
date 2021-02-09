<?php

namespace AndreyArtamonov\Logsis\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Logsis
 * @package AndreyArtamonov\Logsis\Facades
 * @method static getStatus(array $query)
 * @method static getStatusV3(string $from, string $to)
 * @method static getZStatus(string $inner_n, string $zorder_id)
 * @method static getAllStatusModel()
 * @method static createOrder(array $params, array $goods)
 * @method static updateOrder(array $params, array $goods)
 * @method static confirmOrder(array $params)
 * @method static changeDate(array $params)
 * @method static orderLabels(array $params)
 * @method static orderLabelsData(array $params)
 * @method static testKey(string $key)
 * @method static sendAct(array $orders)
 * @method static calculate(array $params)
 * @method static returnActs(array $params)
 * @method static newZOrder(array $params)
 */

class Logsis extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AndreyArtamonov\Logsis\Logsis::class;
    }
}
