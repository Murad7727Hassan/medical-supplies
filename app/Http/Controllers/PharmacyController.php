<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PharmacyRequest;
use App\Http\Requests\StorePharmacyRequest;
use App\Http\Requests\UpdatePharmacyRequest;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies = Pharmacy::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('Pharmacy.index', ['pharmacies' => $pharmacies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePharmacyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PharmacyRequest $request)
    {

        try {

            DB::beginTransaction();
            $pharmacy = Pharmacy::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'phone2' => $request['phone2'],
                'password' => Hash::make($request['password']),
                'description' => $request['description'],
            ]);

            $address = new Address();

            $address->pharmacy_id = $pharmacy->id;
            $address->city_id = $request->city_id;
            $address->governorate_id = $request->governorate_id;
            $address->streat = $request->streat;
            $address->details = $request->details;

            if ($request->has('lat')) {
                $address->lat = $request->lat;
                $address->long = $request->long;
            }
            $address->save();

            DB::commit();
            return redirect()->route('pharmacy.home');
        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function saveImageDB(Request $request)
    {

        try {
            $fileName = "" ;
            if ($request->has('photo')) {
                
                // save img in public/pharmacy/images
                $fileName = uploadImage('pharmacy', $request->photo);
            }

            return redirect()->route('admin.products')->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $ex) {
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        return view('pharmacy.profile')->withPharmacy($pharmacy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacy $pharmacy)
    {
        return view('pharmacy.edit')->withPharmacy($pharmacy);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePharmacyRequest  $request
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(PharmacyRequest $request, Pharmacy $pharmacy)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacy $pharmacy)
    {
        //
    }
}
