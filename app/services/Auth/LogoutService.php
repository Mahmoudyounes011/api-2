<?php

namespace app\services\Auth;

use App\services\User\GetUserService;

class LogoutService
{
    public function logout()
    {
        GetUserService::get_user()->token()->revoke();
    }
}
