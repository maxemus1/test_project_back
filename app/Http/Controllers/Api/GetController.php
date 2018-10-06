<?php
/**
 * @category App
 * @package  Contorller
 * @author   Семенов Максим
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Parser\DbModel;

/**
 * Главный контроллер
 *
 * Class GetController
 * @package App\Http\Controllers\Api
 *
 * @author   Семенов Максим
 */
class GetController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData()
    {
        $dbModel = new DbModel();
        return response()->json($dbModel->getData());
    }
}