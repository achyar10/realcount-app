<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    
    public function __construct(Request $request)
    {
        $this->req = $request;
    }
    
    public function getAll()
    {
        return User::orderBy('name', 'asc')->paginate(10);
    }

    public function getById($id)
    {
        return User::find($id);
    }

    public function create()
    {
        $data =  User::create([
            'name' => $this->req->name,
            'username' => $this->req->username,
            'email' => $this->req->email,
            'password' => Hash::make($this->req->password, ['rounds' => 10]),
            'phone' => $this->req->phone,
            'role' => $this->req->role,
            'is_active' => $this->req->is_active,
            'tps_id' => $this->req->tps_id,
        ]);
        return $data;
    }

    public function update($id)
    {
        $data = User::find($id);
        $data->name = $this->req->name;
        $data->username = $this->req->username;
        $data->email = $this->req->email;
        $data->phone = $this->req->phone;
        $data->tps_id = $this->req->tps_id;
        $data->role = $this->req->role;
        $data->is_active = $this->req->is_active;
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return $data;
    }

    public function signIn()
    {
        $check = User::where('username', $this->req->username)
            ->orWhere('email', $this->req->username)->first();
        if ($check) {
            if (Hash::check($this->req->password, $check->password)) {
                return $check;
            }
            return false;
        }
        return false;
    }
}