<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function home(Request $request){
        $user = auth()->user();

        $users = User::get();

        if($user->name == "admin"){
            return view('user.admin')->with('users', $users);
        }else{
            return view('user.home')->with('user', $user);
        }
    }

    public function product(Request $request){
        $user = auth()->user();

        if($user->name == "admin" || $user->permission_product == 0){
            if($user->name == "admin"){
                $message = "Usuario Admin nao tem permissao para acessar esta pagina!!";
            }

            if($user->permission_product == 0){
                $message = "Usuario sem permissão para acessar a pagina";
            }

            return view('user.error')->with('errorMessage', $message);
        }else{
            return view('user.product');
        }

    }

    public function category(Request $request){
        $user = auth()->user();

        if($user->name == "admin" || $user->permission_category == 0){
            if($user->name == "admin"){
                $message = "Usuario Admin nao tem permissao para acessar esta pagina!!";
            }
            if($user->permission_category == 0){
                $message = "Usuario sem permissão para acessar a pagina";
            }
            return view('user.error')->with('errorMessage', $message);
        }else{
            return view('user.category');
        }

    }

    public function brand(Request $request){
        $user = auth()->user();

        if($user->name == "admin" || $user->permission_brand == 0){
            if($user->name == "admin"){
                $message = "Usuario Admin nao tem permissao para acessar esta pagina!!";
            }
            if($user->permission_brand == 0){
                $message = "Usuario sem permissão para acessar a pagina";
            }
            return view('user.error')->with('errorMessage', $message);
        }else{
            return view('user.brand');
        }

    }

    public function admin(Request $request){
        $user = auth()->user();

        if($user->name != "admin"){
            return view('user.error')->with('errorMessage', "Usuario Admin nao tem permissao para acessar esta pagina!!");
        }else{
            return view('user.admin');
        }

    }

    public function permission(Request $request, $user_id){
        $user = auth()->user();

        $user_edit = User::where('id', $user_id)->first();

        if($user->name != "admin" || $user->id == $user_id){
            if($user->id == $user_id){
                $message = "Usuario nao permitido!!";
            }
            if($user->name != "admin"){
                $message = "Apenas admin pode acessar esta pagina";
            }

            return view('user.error')->with('errorMessage', $message);
        }else{
            return view('user.permission')->with('user_edit',$user_edit);
        }
    }

    public function update_permission(Request $request, $user_id){
        $user = User::find($user_id);

        if($user){
            $user->permission_product  = $request->has('permission_product') ? 1 : 0;
            $user->permission_category = $request->has('permission_category') ? 1 : 0;
            $user->permission_brand    = $request->has('permission_brand') ? 1 : 0;
            $user->save();

            return back()->with('success', "Permissão alterada com sucesso");
        } else {
            return back()->with('error', "Usuário não encontrado");
        }
    }
}
