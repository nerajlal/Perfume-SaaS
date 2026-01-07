<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryPartner;
use Illuminate\Http\Request;

class DeliveryPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = DeliveryPartner::latest()->get();
        return view('admin.settings.delivery_partners.index', compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'site_url' => 'nullable|url',
            'tracking_url_template' => 'nullable|string'
        ]);

        DeliveryPartner::create($request->except('_token'));

        return redirect()->back()->with('success', 'Delivery Partner added successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $partner = DeliveryPartner::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'site_url' => 'nullable|url',
            'tracking_url_template' => 'nullable|string'
        ]);

        $partner->update($request->except('_token'));

        return redirect()->back()->with('success', 'Delivery Partner updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partner = DeliveryPartner::findOrFail($id);
        $partner->delete();

        return redirect()->back()->with('success', 'Delivery Partner deleted successfully!');
    }
}
