<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.index',[
            'users' => User::where('role', '!=', 'admin')->get()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'role' => $request->role
        ]);

        return redirect('/dashboard/user')->with('success', 'Hak akses berhasil dirubah');
    }

}
