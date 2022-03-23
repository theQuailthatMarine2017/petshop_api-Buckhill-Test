<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\users;

class UserController extends Controller
{
    //
  public function index()
   {
    return users::all();
   }

  public function store(Request $request)
    {

        error_log($request->all());
        $bearer = $request->header('Authorization');

        if ($bearer) {
            # code...
            $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'password_confirmation' => 'required',
                'address' => 'required',
                'phone_number' => 'required|min:12|max:12',
                
            ]);
    
            $user = users::create($request->all());
            return response()->json($user, 201);
        } else {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        
        

        
    }
    
//   public function update(Request $request, $id)
//     {
//         $article = Article::findOrFail($id);
//         $article->update($request->all());

//         return $article;
//     }
}
