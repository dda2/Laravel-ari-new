<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|unique:user|email|max:50',
            'username' => 'required|unique:user|alpha_dash|max:20',
            'password' => 'required|min:6',
            ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),

           
            ]);
            $file = $request->file('gambar');
            $filename = $request->file('gambar')->getClientOriginalName();

            if($request->hasFile('gambar'))
            {
                Storage::put($filename,
                file_get_contents($request->file('gambar')->getRealPath()));
            }

        return redirect()
            ->route('home')
            ->with('info', 'selamat pendaftaran berhasil, anda bisa login sekarang');
    }

    public function getSign()
    {
        return view('auth.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);


        if(!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){
            return redirect()->back()->with('info', 'detail login salah');
        }

        return redirect()->route('home')->with('info', 'Selamat Anda Berhasil Login');
    }

    public function getSignout()
    {
        Auth::logout();

        return redirect()
            ->route('home')
            ->with('info', 'anda telah keluar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
