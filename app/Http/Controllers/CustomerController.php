<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Contact::where('type', 'customer')->get();
        return view('customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Contact::$storeRules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = $request->file('image');
        $image->storeAs('public/contact', $image->hashName());

        Contact::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telpon' => $request->telpon,
            'image' => $image->hashName(),
            'type' => 'customer'
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Contact::findOrFail($id);
        return view('customer.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Contact::findOrFail($id);
        return view('customer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), Contact::$updateRules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Contact::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            Storage::delete('public/contact/'. $data->image);

            $image->storeAs('public/contact', $image->hashName());
            $data->image = $image->hashName();
        }

        $data->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telpon' => $request->telpon,
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Contact::findOrFail($id);

        Storage::delete('public/contact/'. $data->image);

        $data->delete();
        return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus');
    }
}
