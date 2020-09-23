<?php

namespace App\Http\Controllers;

use App\Contact;
use App\VisitsCustomer;
use App\SellersCordinate;
use Illuminate\Http\Request;
use App\Http\Resources\SellerCollection;
use App\Http\Resources\CordinateCollection;
use App\Http\Resources\SellerDateCollection;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    /**
     * Display a listing of the sellers.
     *
     * @return \Illuminate\Http\Response
     */
    public function listSellers(Request $request)
    {
        $query = DB::table('visits_customers')->select('seller_id')->distinct();
        $sellers = array_map(function ($value) {return $value->seller_id;}, $query->get()->toArray());      
        $contacts = Contact::whereIn('id', $sellers);
        if ($request->wantsJson()) {
            return new SellerCollection($contacts->get());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function listDatesSeller(Request $request, $id)
    {
        $query = DB::table('visits_customers')->selectRaw('DATE(checkin_date) as date')->distinct()->where('seller_id', $id);
        $dates = array_map(function ($value) {return $value->date;}, $query->get()->toArray());      
        if ($request->wantsJson()) {
            return new SellerDateCollection($dates);
        }
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function listCordinatesDateSeller(Request $request, $id, $date)
    {
        $contact = SellersCordinate::where('seller_id', $id)->whereDate('datetime', $date)->get();
        if ($request->wantsJson()) {
            return new CordinateCollection($contact);
        }
    }
}
