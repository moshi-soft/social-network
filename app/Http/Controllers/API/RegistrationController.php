<?php

namespace App\Http\Controllers\API;

use App\Contracts\AuthenticationInterface;
use App\Contracts\RegistrationInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\RegistrationResource;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public $registration;

    //$authentication;

    public function __construct(RegistrationInterface $registration, AuthenticationInterface $authentication,)
    {
        $this->registration = $registration;
        //$this->authentication = $authentication;
    }

    public function register(RegistrationRequest $request)
    {
        DB::beginTransaction();
        try {
            $response = new RegistrationResource($this->registration->register($request->validated()));
            // if auto login after registration
            // $response = new RegistrationResource(['token'=>$this->authentication->attemptToLogin($request->validated())]);
            DB::commit();
            return $response;
        } catch (\Exception $exception) {
            DB::rollBack();
            return [
                $exception->getMessage()
            ];
        }
    }
}
