<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $query = Letter::with('user');

        // if ($request->has('tanggal_filter')) {
        //     $tanggalFilter = $request->tanggal_filter;
        //     $query->whereDate('created_at', $tanggalFilter);
        // }

        // $letters = $query->simplePaginate(10);

        // return view("order.staff.index", compact("letters"));

        $letters = Letter::all();
        return view('letter.index', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $letters = Letter::all();
        return view("letter.create", compact('letters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_type_id' => 'required',
            'letter_perihal' => 'required',
            'recipients' => 'required',
            'content' => 'required',
            'attachment' => 'required',
            'notulis' => 'required',
        ]);

        Letter::create([
            'letter_type_id' => $request->letter_type_id,
            'letter_perihal' => $request->letter_perihal,
            'recipients' => $request->recipients,
            'content' => $request->content,
            'attachment' => $request->attachment,
            'notulis' => $request->notulis,
        ]);

        return redirect()->route('letter.index')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Letter $letter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Letter $letter, $id)
    {
        $letters = Letter::find($id);
        return view('letter.edit', compact('letters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Letter $letter, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $ubahData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,  
        ];

        Order::where('id', $id)->update($ubahData);

        return redirect()->route('letter.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Letter $letter)
    {
        //
    }
}
