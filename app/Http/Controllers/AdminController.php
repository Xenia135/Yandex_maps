<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin', compact('users'));
    }
    public function getLocations(int $userId)
    {
        $user = User::find($userId); // Получаем пользователя по его ID
        $marks = $user->marks; // Получаем все отметки данного пользователя

        return view('locations', compact('marks'));
    }
}
