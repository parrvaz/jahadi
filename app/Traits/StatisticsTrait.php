<?php
/**
 * Created by PhpStorm.
 * User: Reza
 * Date: 8/1/2019
 * Time: 7:19 PM
 */

namespace App\Traits;


use Illuminate\Support\Facades\Lang;

trait StatisticsTrait
{

    public function deleteResponse(){
        return response()->json([
            'message' => Lang::get('responses.delete.success.company'),
            'status' => 'success',
        ],200);

    }

}