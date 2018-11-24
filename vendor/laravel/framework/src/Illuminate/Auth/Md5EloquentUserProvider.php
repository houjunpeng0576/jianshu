<?php
namespace Illuminate\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

class Md5EloquentUserProvider extends EloquentUserProvider
{

    /**
     * Validate a user against the given credentials.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @param array $credentials
     */
    public function validateCredentials(Authenticatable $user, array $credentials) {
        $plain = $credentials['password'];
        $authPassword = $user->getAuthPassword();

        return md5($plain) == $authPassword;
    }
}