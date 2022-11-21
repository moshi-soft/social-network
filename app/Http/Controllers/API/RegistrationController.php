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
    public $registration, $authentication;

    public function __construct(RegistrationInterface $registration, AuthenticationInterface $authentication,)
    {
        $this->registration = $registration;
        $this->authentication = $authentication;
    }

    public function register(RegistrationRequest $request)
    {
        //$new_user = $this->registration->register($request->validated());
        //dd($new_user);
        DB::beginTransaction();
        try {
            $this->registration->register($request->validated());
            $response = new RegistrationResource(['token'=>$this->authentication->attemptToLogin($request->validated())]);
            DB::commit();
            return $response;
        } catch (\Exception $exception) {
            DB::rollBack();
            return [
                $exception->getMessage()
            ];
        }


//        return new RegistrationResource(
//            $this->authentication->attemptToLogin(collect($this->registration->register($request->validated()))->toArray())
//        );
    }
}
