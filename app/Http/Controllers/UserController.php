<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view("user.user", ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->validateEmail($request->email)) {
            return redirect(url('/user'))->with('error', 'El Email ya esta en uso!');
        }
        if ($this->validatePassword($request->password,$request->password_confirm)) {
            User::create([
                "name" => $request->name,
                "lastname" => $request->lastname,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]);
            return redirect(url('/user'))->with('success', 'El usuario se guardo correctamente!');
        }else {
            return redirect(url('/user'))->with('error', 'El Password no coincide! intenta de nuevo');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = [
            "name" => $request->name,
            "lastname" => $request->lastname,
            "email" => $request->email,
        ];

        if ($this->validatePassword($request->password,$request->password_confirm)) {
            ($request->password) ? $user = $user + ['password' => Hash::make($request->password)] : 0;
            User::find($id)->update(
                $user
            );
            return redirect(url('/user'))->with('success', 'El usuario se guardo correctamente!');
        }else {
            return redirect(url('/user'))->with('error', 'El Password no coincide! intenta de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect(url('/user'))->with('success', 'El usero se elimino correctamente!');
    }

    private static function validatePassword($password, $password_confirm)
    {
        return ($password === $password_confirm) ?  true : false;
    }
    private static function validateEmail($email)
    {
        return (User::where("email", $email)->count() == 0 ) ? true : false ;
    }
    public function getUserById($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
}
