<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\ApiJsonResponse;
use Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ApiJsonResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        return response()->json($this->successResponse([$request->all()],'Created successfuly'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // return response()->json($this->successResponse([$category],'Created successfuly'));
        $category = Category::where('slug', $slug)->first();
        return Response::json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // dump($slug);
        $category = Category::where('slug', $slug)->first();
        $category->update($request->all());
        return response()->json($this->successResponse([$request->all()],'updated successfuly'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return response()->json($this->successResponse([], 204));
    }

    public function register(Request $request) {
        $email = $request->get('email');
        
        $password = $request->get('password');

        if ($this->checkIfUserExist($email)) {
            return response()->json([
                'message' => 'User already exist'
            ], 500);
        } else {
            $password = bcrypt($password);
            $name = explode("@", $email);
            
            User::create([
                'email' => $email,
                'password' => $password,
                'name' => $name[0]
            ]);
            return response()->json(true);
        }
    }

    public function login(Request $request) {
        $email = $request->get('email');
        $password = $request->get('password');

        $user = $this->checkIfUserExist($email);

        if ($user) {
            $confirmPassword = Hash::check($password, $user->password);
            return response()->json([
                'status' => $confirmPassword,
                'token' => $user->authToken
            ]);
        } else {
            return response()->json([
                'message' => "Invalid credentials"
            ], 500);
        }
    }

    public function updateToken(Request $request) {
        $email = $request->get('uid');
        $token = $request->get('token');

        User::where('email', $email)->update([
            'authToken' => $token
        ]);
    }

    private function checkIfUserExist($email) {
        $user = User::where('email', $email)->first();

        if ($user) {
            return $user;
        } else {
            return false;
        }
    }    
}
