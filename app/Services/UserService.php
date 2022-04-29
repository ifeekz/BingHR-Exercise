<?php

namespace App\Services;
use App\Models\User;

class UserService {
    public function fetchAll()
    {
        $user = User::orderBy('id', 'desc')->get();
        return $user;
    }
    public function store($data): User
    {
        $user = User::create($data);
        return $user;
    }

    public function update($user, $data): User
    {
        $data = (Object) $data;
        $user = User::find($user->id);
        $user->employee_id = $data->employee_id;
        $user->first_name = $data->first_name;
        $user->last_name = $data->last_name;
        $user->email = $data->email;
        $user->mobile_no = $data->mobile_no;
        $user->username = $data->username;
        $user->role_type = $data->role_type;
        if($data->password !== null && $data->password !== '') {
            $user->password = $data->password;
        }
        $user->save();

        return $user;
    }

    public function delete($user): void
    {
        User::destroy($user->id);
    }
}