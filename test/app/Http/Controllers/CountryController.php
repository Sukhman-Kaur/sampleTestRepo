<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::latest()->get();
        return view('countries.index', compact('countries'));
        // return view('countries');
    }
    // public function getCountries(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Country::latest()->get();
    //         return DataTables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {
    //                 $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
    //                 return $actionBtn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'region' => 'required',
            'capital' => 'required',
            'native_name' => 'required'
        ]);
        Country::create([
            'name' => $request->name,
            'region' => $request->region,
            'capital' => $request->capital,
            'native_name' => $request->nativeName,
            'languages' => json_encode($request->languages),
            'currencies' => json_encode($request->currencies),
            'image' => $request->flag
        ]);
        return redirect('/countries')->with('success', 'Country created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Country::find($id)->update([
            'name' => $request->name,
            'region' => $request->region,
            'capital' => $request->capital,
            'native_name' => $request->nativeName,
            'languages' => json_encode($request->languages),
            'currencies' => json_encode($request->currencies),
            'image' => $request->flag
        ]);
        return redirect('/countries')->with('success', 'Country updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect('/countries')->with('success', 'Country deleted!');
    }

    public function add()
    {
        $countries = Http::get('http://restcountries.eu/rest/v2/all')->json();
        foreach ($countries as $country) {
            Country::create([
                'name' => $country['name'],
                'region' => $country['region'],
                'capital' => $country['capital'],
                'native_name' => $country['nativeName'],
                'languages' => json_encode($country['languages']),
                'currencies' => json_encode($country['currencies']),
                'image' => $country['flag']
            ]);
        }
        return $countries->json();
    }
}
