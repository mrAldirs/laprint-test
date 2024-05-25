<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use App\Models\SalesOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SalesOrder::orderBy('created_at', 'desc')->get();
        return view('sales.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact = Contact::where('type', 'customer')->pluck('nama', 'id');
        $product = Product::where('status', 'active')->pluck('nama', 'id');
        $user = User::pluck('name', 'id');
        $productHarga = Product::where('status', 'active')->pluck('harga', 'id');
        return view('sales.create', compact('contact', 'product', 'user', 'productHarga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), SalesOrder::$rules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sales = SalesOrder::latest()->first();
        $no = $sales ? ((int) substr($sales->no_so, -4)) + 1 : 1;
        $no_urut = sprintf('%04d', $no);
        $year = date('Y');
        $no_so = 'SO/' . $year . '/' . $no_urut;

        $date = date('Y-m-d');

        SalesOrder::create([
            'contact_id' => $request->contact_id,
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'no_so' => $no_so,
            'date' => $date,
            'qty' => $request->qty,
            'total' => $request->total,
            'status' => 'draft',
        ]);

        return redirect()->route('sales.index')->with('success', 'Sales Order berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SalesOrder::findOrFail($id);
        return view('sales.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = SalesOrder::findOrFail($id);
        $contact = Contact::where('type', 'customer')->pluck('nama', 'id');
        $product = Product::where('status', 'active')->pluck('nama', 'id');
        $user = User::pluck('name', 'id');
        $productHarga = Product::where('status', 'active')->pluck('harga', 'id');
        return view('sales.edit', compact('data', 'contact', 'product', 'user', 'productHarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), SalesOrder::$rules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sales = SalesOrder::findOrFail($id);
        $sales->update([
            'contact_id' => $request->contact_id,
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'qty' => $request->qty,
            'total' => $request->total,
        ]);

        return redirect()->route('sales.index')->with('success', 'Sales Order berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sales = SalesOrder::findOrFail($id);
        $sales->delete();

        return redirect()->route('sales.index')->with('success', 'Sales Order berhasil dihapus');
    }

    /**
     * Change status to approve.
     */
    public function approve(string $id)
    {
        $sales = SalesOrder::findOrFail($id);
        $sales->update([
            'status' => 'approve',
        ]);

        return redirect()->route('sales.show', [$id])->with('success', 'Sales Order berhasil diapprove');
    }
}
