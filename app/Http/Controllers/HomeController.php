<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\SalesOrder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $salesCount = SalesOrder::count();
        $purchaseCount = PurchaseOrder::count();
        $productCount = Product::count();
        $contactCount = Contact::count();
        
        return view('home', compact('salesCount', 'purchaseCount', 'productCount', 'contactCount'));
    }
}
