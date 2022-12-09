<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::get();
    }

    public function detail($id)
    {
        return User::find($id);
    }

    public function create(Request $request)
    {
        return User::create($request->all());
    }

    public function update($id, Request $request)
    {
        return User::find($id)->update($request);
    }

    public function destroy($id)
    {
        return User::find($id)->delete();
    }
}
