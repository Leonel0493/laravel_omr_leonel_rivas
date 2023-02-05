<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// * Add Facades
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

// * Add Models
use App\Models\User;
use App\Models\Alumnos;
use App\Models\Profesores;
use App\Models\Personas;
use App\Models\Roles;
use App\Models\Roles_Usuarios;

class LoginController extends Controller
{
    // * Function register
    public function RegisterUser(Request $request)
    {
        DB::beginTransaction();

        try{
            Log::info('Access to method');
            $user = new User();
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->created_by = "system";
            $user->modified_by = "system";
            $user->created_at = now();
            $user->enabled = true;
            $user->save();

            //Log::info($request->email);

            $alumno = Alumnos::where('email', $user->email)->first();
            //Log::info($alumno->toArray());
            $profesor = Profesores::where('email', $user->email)->first();
            //Log::info($profesor->toArray());

            if($alumno != null && $profesor != null)
                return esponse()->json(['message' => 'Su email esta registrado como alumno y como docente por favor contacte con los administradores para cambiar uno de los emails']);
            
            $roles = new Roles();
            
            if($alumno != null)
                $roles = Roles::where('roles', 'Alumno')->first();
            else if($profesor != null)
                $roles = Roles::where('roles', 'Profesor')->first();
            else
            {
                Log::info('Error de data null');
                return response()->json(['message' => 'Su email no esta registrado, no podemos darlo de alta en el sistema']);
            }

            $rol = new Roles_Usuarios();
            $rol->id_usuario = $user->id;
            $rol->id_rol = $roles->id;
            $rol->created_by = "system";
            $rol->modified_by = "system";
            $rol->created_at = now();
            $rol->enabled = true;
            $rol->save();

            Auth::login($user);
            DB::commit();

            return response()->json(['message' => 'Success']);

        } // *end TRY
        catch(\Exception $e){
            DB::rollback();
            Log::info($e);
        }
    }

    // * inicio de sesion con credenciales
    public function Login(Request $request)
    {
        try
        {
            $credentials = [
                "email" => $request->email,
                "password" => $request->password,
                "enabled" => true,
            ];

            if(Auth::attempt($credentials))
            {
                return response()->json(['message' => 'Success']);
            }
            else
            {
                return response()->json(['message' => 'Lo sentimos el correo o la contrseña son incorrectos']);
            }
        }
        catch(\Exception $e)
        {
            Log::info($e);
        }
    }

    // * cerrando la sesion
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
