<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOuthProvider extends Model
{
    protected $table = 'users_oauth_providers';

    protected $fillable = ['user_id', 'provider', 'provider_user_id', 'username', 'name', 'email', 'avatar', 'provider_response_json'];
}
