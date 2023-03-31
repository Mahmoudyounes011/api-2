<?php

namespace app\services\User;

class GetUserService
{

    public static function get_user()
    {
        return auth()->user();
    }
}
