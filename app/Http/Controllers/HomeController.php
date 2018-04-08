<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use App\Friend;
use App\SendRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = auth()->user()->groups;

        // $users = User::where('id', '<>', auth()->user()->id)->get();
        $users = auth()->user()->friend()->get();
        // dd($users);
        $user = auth()->user();

        return view('home', ['groups' => $groups, 'users' => $users, 'user' => $user]);
    }

    public function addFriend(){
        $request_list = rtrim(auth()->user()->request_list, ',');

        if(strlen($request_list) > 0){
            $users = User::where('id', '<>', auth()->user()->id)
                        ->whereRaw('id NOT IN (' . $request_list . ')')->get();
        }else{
            $users = User::where('id', '<>', auth()->user()->id)->get();
        }
        return view('addFriend', ['users' => $users]);
    }

    public function sendRequest(Request $request){
        if(isset($request['user']['id'])){
            $sendRequest = SendRequest::create(['user_id' => auth()->user()->id, 'friend_id' => $request['user']['id']]);
            $request_list = auth()->user()->request_list . $request['user']['id'] . ',';
            auth()->user()->update(['request_list' => $request_list]);
            return $sendRequest;
        }
    }

    public function acceptFriend(){
        $users = auth()->user()->request()->get();
        return view('acceptFriend', ['users' => $users]);
    }

    public function acceptRequest(Request $request){
        if(isset($request['user']['id'])){
            $friend = Friend::create([
                                'user_id' => auth()->user()->id, 
                                'friend_id' => $request['user']['id']
                            ]);

            $sendRequest = SendRequest::where('user_id', auth()->user()->id)
                                        ->where('friend_id', $request['user']['id'])
                                        ->delete();
            return $friend;
        }

    }
}
