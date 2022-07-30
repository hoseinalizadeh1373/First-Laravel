<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user = auth()->user();

        $allow = $this->authorize('update', $user);

        $list_user = User::latest()->paginate(3);

        $useridd = 0;

        // dd($list_user->pluck('email')[0]);
        // dd($list_user->filter(function ($use){return $use-> id>3;}));
        // $arr =  collect(['boo','far','ss']);
        // $arr = ['ss','boo'];
        // dd(array_map(function ($item){return strtoupper($item);},$arr));
        // dd(collect(['ss','sv'])->map(function ($item){return strtoupper($item);}));

        // $song1 = (object)['name' => 'never bye', 'lenght' => '300'];
        // $song2 = (object)['name' => ' bye bye we going', 'lenght' => '400'];
        // $song3 = (object)['name' => 'say bye', 'lenght' => '150'];
        // $list_song = collect([$song1, $song2, $song3]);
        // dd($list_song->pluck('name'));
        // $lenght = 0;
        // foreach($list_song as $song){
        //     $lenght+=$song->lenght;
        // }
        // dd($list_song->sum('lenght'));

        // dd($list_user->filter(function ($item){ return !$item->email_verified_at;}));
        
        // dd($list_user->map(function ($item){return strtoupper($item->name);}));

        // dd($list_user->filter->email_verified_at);
        // dd($list_user->first()->is_verif());
        // dd($list_user->filter(function ($item){return $item->is_Verif();}));
        return view('user.userlist', compact('list_user', 'useridd'));
    }
    function gete($item)
    {
        return !$item->email_verified_at;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $user = User::find($id)->get();
        // dd($user);
        return view('user.edit', compact($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (auth()->user()->type == 'admin' and auth()->user() != $user) {

            $user->update([
                'type' => $request->value,
            ]);

            return response()->json([
                "success" => true,
                "data" => $request->value
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {

        if (auth()->user()->type == 'admin') {

            $user->delete();

            $user2 = auth()->user();

            $allow = $this->authorize('update', $user2);

            $list_user = User::latest()->paginate(3)
                ->setPath(route('users.index'));

            $useridd = 0;

            return response()->json([
                "success" => true,
                'html' => view('user.userlist', compact('list_user', 'useridd'))->render(),
            ]);
        }
    }
}
