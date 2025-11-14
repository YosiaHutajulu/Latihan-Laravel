<?php

namespace App\Http\Controllers;


use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
public function index()
{
    $todos = Todo::all();
    return view('welcome', compact('todos'));
}




    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
        ]);

        $data = $request->all();

        // Set tanggal_selesai jika ditandai selesai
        if ($request->selesai) {
            $data['tanggal_selesai'] = now();
        }

        Todo::create($data);

        return redirect('/');
    
    }

    public function selesai($id)
{
    $todo = Todo::findOrFail($id);

    $todo->selesai = true;
    $todo->tanggal_selesai = now();
    $todo->save();

    return redirect('/');
}

public function hapus($id)
{
    $todo = Todo::findOrFail($id);
    $todo->delete();

    return redirect('/');
}



}

