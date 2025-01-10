<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wishlist;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query();

        if (auth()->check()) {
            $users->where('id', '!=', auth()->id());
        }

        $users->where('status', '!=', '1');

        $users->when(request('search'), function ($query) {
            $search = request('search');

            $query->where('name', 'like', '%' . $search . '%');
        });

        $users->when(request('gender'), function ($query) {
            $gender = request('gender');
            
            $query->where('gender', $gender);
        });

        $users->when(request('fields'), function ($query) {
            $fields = request('fields');
            foreach ($fields as $field) {
                $query->where('field_of_work', 'like', '%' . $field . '%');
            }
        });

        return view('home', ['users' => $users->get()]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return view('user.show', compact('user'));
    }

    public function likeUser($id)
    {
        $loggedInUserId = auth()->id();

        $wishlist = Wishlist::where('user_id', $loggedInUserId)
                            ->where('liked_id', $id)
                            ->first();

        if (!$wishlist) {
            Wishlist::create([
                'user_id' => $loggedInUserId,
                'liked_id' => $id,
                'state' => true,
            ]);
        } else {
            $wishlist->state = !$wishlist->state;
            $wishlist->save();
        }

        return redirect()->back();
    }

    public function likedBack()
    {
        $loggedInUserId = auth()->id();
        $usersLikedBack = Wishlist::where('liked_id', $loggedInUserId)
                                    ->where('state', 1)
                                    ->get()
                                    ->map(function($wishlist) use ($loggedInUserId) {
                                        $likedBack = Wishlist::where('liked_id', $wishlist->user_id)
                                                             ->where('user_id', $loggedInUserId)
                                                             ->where('state', 1)
                                                             ->exists();

                                        if ($likedBack) {
                                            return User::find($wishlist->user_id);
                                        }
                                    })
                                    ->filter();

        return view('user.liked-back', compact('usersLikedBack'));
    }

    public function settings()
    {
        $user = auth()->user();
        return view('settings', compact('user'));
    }

    public function hideProfile(Request $request)
    {
        $user = auth()->user();

        if ($user->wallet_balance < 50) {
            return back()->with('error', 'Insufficient coins.');
        }

        $user->wallet_balance -= 50;
        $user->status = 1;

        $number = random_int(1, 3);

        $user->profile_picture = 'img/bear' . $number .'-profile-picture.jpg';

        $user->save();

        return back()->with('success', 'Profile hidden successfully!');
    }

    public function unhideProfile(Request $request)
    {
        $user = auth()->user();

        $user->status = 0;

        $user->profile_picture = 'img/default-profile-picture.png';

        $user->save();

        return back()->with('success', 'Profile unhidden successfully!');
    }
}
