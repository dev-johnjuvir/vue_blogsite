<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use App\Models\Users;
use App\Models\Roles;


class Authentication extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $User = new Users;
        $Roles = new Roles;
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $User->asObject()->where('email', $email)->first();
        if(!$data) return $this->failUnauthorized('email or password is invalid!');
        if(!password_verify($password, $data->password)) return $this->failUnauthorized('email or password is invalid!');
        $iat = time();
        $payload = [
            'iss' => $data->id,
            'aud' => $data->email,
            'sub' => 'jwt-token',
            'iat' => $iat,
            'exp' => $iat + 3600
        ];
        $secretKey = getenv('JWT_SECRET');
        $jwt = JWT::encode($payload, $secretKey, 'HS256');
        $role = $Roles->asObject()->where('id', $data->roleId)->first();

        return $this->respond([
            'data' => [
                'id' => $data->id,
                'firstname' => $data->firstname,
                'middlename' => $data->middlename,
                'email' => $data->email,
                'role' => [
                    'id' => $role->id,
                    'name' => $role->name,
                ],
                'token' => $jwt
            ]
        ]);
    }
}
