<?php
/**
 * Created by PhpStorm.
 * User: Reza
 * Date: 8/1/2019
 * Time: 7:19 PM
 */

namespace App\Traits;


use App\Volunteer;
use Illuminate\Support\Facades\Lang;
use Morilog\Jalali\Jalalian;

trait StatisticsTrait
{

    public function ownerVolunteer($volunteersId){
        foreach ($volunteersId as $vol){
            $volunteer = Volunteer::find($vol['id']);
            if (($volunteer->user->id ?? 0) != auth()->user()->id)
                return false;
        }
        return true;
    }


    public function deleteResponse(){
        return response()->json([
            'message' => Lang::get('responses.delete.success.company'),
            'status' => 'success',
        ],200);
    }

    public function notFoundElementResponse(){
        return response()->json([
            'message' => Lang::get('responses.error.null'),
            'status' => 'error',
        ],422);
    }

    public function permissionDenied(){
        return response()->json([
            'message' => Lang::get('responses.error.denied'),
            'status' => 'error',
        ],403);
    }


    public function gToJ($date){
        return Jalalian::forge($date)->format("Y/m/d");
    }

    public function jToG($date){
        $date = explode('/',$date);
        return (new Jalalian($date[0],$date[1],$date[2]))->toCarbon()->toDateTimeString();
    }
}