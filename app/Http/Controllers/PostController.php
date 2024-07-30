<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index() {
        $post = Post::orderBy('created_at', 'desc')->get();
        $user = User::all();

        return view('post.index', compact('post', 'user'));
    }

    public function store(Request $request) {
        $request->validate([
            'caption' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $path = null;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('post', 'public');
        }

        Post::create([
            'caption' => $request->caption,
            'tanggal' => Carbon::now(),
            'user_id' => Auth::id(),
            'image' => $path ?? null
        ]);

        return redirect()->route('post.index');
    }

    public function delete($id) {
        $post = Post::findOrFail($id);

        if (auth()->id() !== $post->user_id) {
            return redirect()->back()->with('error', 'You do not have permission to delete this post.');
        }

        $post->delete();

        return redirect()->route('post.index');
    }
}
