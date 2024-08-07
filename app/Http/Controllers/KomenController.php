<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Komen;
use Carbon\Carbon;

class KomenController extends Controller
{
    public function index($id)
    {
        $post = Post::findOrFail($id);
        $user = User::all();
        $komen = Komen::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();
        return view('post.komen', compact('post', 'user', 'komen'));
    }

    public function create(Request $request, $id)
    {
        Komen::create([
            'komen' => $request->komen,
            'tanggal' => Carbon::now(),
            'user_id' => Auth::id(),
            'post_id' => $id
        ]);

        return redirect()->route('komen.index', $id)->with('success', 'Komentar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $komen = Komen::findOrFail($id);

        if (auth()->user()->id !== $komen->user_id) {
            return redirect()->back()->with('error', 'Anda tidak mimiliki izin untuk mengedit komentar ini');
        }

        $user = User::all();
        $post = $komen->post;

        return view('post.edit', compact('komen', 'user', 'post'));
    }

    public function update(Request $request, $id)
    {
        $komen = Komen::findOrFail($id);

        $komen->update([
            'komen' => $request->komen,
            'tanggal' => Carbon::now(),
            'user_id' => Auth::id()
        ]);

        return redirect()->route('komen.index', $komen->post_id)->with('success', 'Komen berhasil diedit');
    }

    public function delete($id)
    {
        $komen = Komen::findOrFail($id);

        if (auth()->user()->id !== $komen->user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mendelete ini.');
        }

        $komen->delete();

        return redirect()->route('komen.index', $komen->post_id)->with('succsess', 'Komen berhasil dihapus');
    }
}
