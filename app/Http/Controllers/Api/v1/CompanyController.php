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
        $company= auth()->user()->company()->create($companyValidation->validated());
        return new CompanyResource($company);
    }

    public function edit(){
        return new CompanyResource(auth()->user()->company);
    }

    public function update(CompanyUpdateValidation $validation){
        auth()->user()->company()->update($validation->validated());
        return new CompanyResource(auth()->user()->company);
    }


    public function showSingle(Company $company){
        return new CompanyResource($company);
    }

    public function show(){
        $companies =Company::where('public_show','!=',0)->get();
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
        auth()->user()->company->delete();

        return $this->deleteResponse();
    }

    public function test(){
        return 'test';
    }
}
