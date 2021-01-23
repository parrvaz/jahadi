<?php

namespace App\Http\Controllers\Api\v1;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Company\CompanyUpdateValidation;
use App\Http\Requests\Api\v1\Company\CompanyValidation;
use App\Http\Resources\v1\Company\CompanyCollection;
use App\Http\Resources\v1\Company\CompanyResource;
use App\Http\Resources\v1\Volunteer\VolunteerCollection;
use App\Traits\StatisticsTrait;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use StatisticsTrait;



    public function store(CompanyValidation $companyValidation){

        $fields = $companyValidation['fields'];
        $validated = $companyValidation->validated();
        unset($validated['fields']);


        $company= auth()->user()->company()->create($validated);

        //fields
        $this->increaseFieldCount($fields,$company);

        return new CompanyResource($company);
    }

    public function edit(){
        return new CompanyResource(auth()->user()->company);
    }

    public function update(CompanyUpdateValidation $validation){
        $fields = $validation['fields'];
        $validated = $validation->validated();
        unset($validated['fields']);


        $company =auth()->user()->company;

        $this->decreaseFieldCount($company);
        $company->update($validated);

        $this->increaseFieldCount($fields,$company);

        return new CompanyResource(auth()->user()->company);
    }


    public function showSingle(Company $company){
        if ($company->public_show)
            return new CompanyResource($company);
        else
            return $this->permissionDenied();
    }

    public function showSelf(){

        return new CompanyResource(auth()->user()->company);
    }

    public function show(){
        $companies =Company::where('public_show','!=',0)->get();
        return new CompanyCollection($companies);
    }

    public function showNotSelf(){
        $companies =Company::where('public_show','!=',0)->where('id','!=',auth()->user()->company->id)->get();


        return new CompanyCollection($companies);
    }

    public function confirm(Company $company){
        $company->update([
            'confirmed'=>true
        ]);

        return $this->successResponse();
    }
    public function unconfirmed(Company $company){
        $company->update([
            'confirmed'=>false
        ]);
        return $this->successResponse();

    }



    public function destroy(){
        $company = auth()->user()->company;
            $this->decreaseFieldCount($company);
            $company->delete();

        return $this->deleteResponse();
    }

    public function test(){
        return 'test';
    }
}
