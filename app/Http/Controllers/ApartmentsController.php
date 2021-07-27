<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Apartment;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::orderBy('created_at', 'desc')->paginate(20);
        return view('apartments.index')->with('apartments', $apartments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate required inputs

        $this->validate($request, [
            'title' => 'required',
            'sq_mt' => 'required',
            'photo_main' => 'required',
            'photo_1' => 'required',
            'master_bedroom' => 'required',
            'bathroom' => 'required',
        ]);

        // Check file upload

        if($request->hasFile(['photo_main'])) {
            $photoMainWithExtension = $request->file('photo_main')->getClientOriginalName();
            $filename = pathinfo($photoMainWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('photo_main')->getclientOriginalExtension();
            $MainPhotoToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo_main')->storeAs('public/photos', $MainPhotoToStore);
        }

        if($request->hasFile(['photo_1'])) {
            $photo1WithExtension = $request->file('photo_1')->getClientOriginalName();
            $filename = pathinfo($photo1WithExtension, PATHINFO_FILENAME);
            $extension = $request->file('photo_1')->getclientOriginalExtension();
            $Photo1ToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo_1')->storeAs('public/photos', $Photo1ToStore);
        }

        if($request->hasFile(['photo_2'])) {
            $photo2WithExtension = $request->file('photo_2')->getClientOriginalName();
            $filename = pathinfo($photo2WithExtension, PATHINFO_FILENAME);
            $extension = $request->file('photo_2')->getclientOriginalExtension();
            $Photo2ToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo_2')->storeAs('public/photos', $Photo2ToStore);
        }

        if($request->hasFile(['photo_3'])) {
            $photo3WithExtension = $request->file('photo_3')->getClientOriginalName();
            $filename = pathinfo($photo3WithExtension, PATHINFO_FILENAME);
            $extension = $request->file('photo_3')->getclientOriginalExtension();
            $Photo3ToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo_3')->storeAs('public/photos', $Photo3ToStore);
        }

        if($request->hasFile(['photo_4'])) {
            $photo4WithExtension = $request->file('photo_4')->getClientOriginalName();
            $filename = pathinfo($photo4WithExtension, PATHINFO_FILENAME);
            $extension = $request->file('photo_4')->getclientOriginalExtension();
            $Photo4ToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo_4')->storeAs('public/photos', $Photo4ToStore);
        }

        if($request->hasFile(['photo_5'])) {
            $photo5WithExtension = $request->file('photo_5')->getClientOriginalName();
            $filename = pathinfo($photo5WithExtension, PATHINFO_FILENAME);
            $extension = $request->file('photo_5')->getclientOriginalExtension();
            $Photo5ToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo_5')->storeAs('public/photos', $Photo5ToStore);
        }

        // Validate checkboxs

        $kitchen = $request->input('kitchen');
        if($kitchen) {
            $kitchen_value = 1;
        } else if ($kitchen == null) {
            $kitchen_value = 0;
        }

        $guest_toilet = $request->input('guest_toilet');
        if($guest_toilet) {
            $guest_toilet_value = 1;
        } else if ($guest_toilet == null) {
            $guest_toilet_value = 0;
        }

        $corridor = $request->input('corridor');
        if($corridor) {
            $corridor_value = 1;
        } else if ($corridor == null) {
            $corridor_value = 0;
        }

        $store = $request->input('store');
        if($store) {
            $store_value = 1;
        } else if ($store == null) {
            $store_value = 0;
        }

        $balcony = $request->input('balcony');
        if($balcony) {
            $balcony_value = 1;
        } else if ($balcony == null) {
            $balcony_value = 0;
        }

        $parking = $request->input('parking');
        if($parking) {
            $parking_value = 1;
        } else if ($parking == null) {
            $parking_value = 0;
        }

        $elevator = $request->input('elevetor');
        if($elevator) {
            $elevator_value = 1;
        } else if ($elevator == null) {
            $elevator_value = 0;
        }

        $cctv = $request->input('cctv');
        if($cctv) {
            $cctv_value = 1;
        } else if ($cctv == null) {
            $cctv_value = 0;
        }

        $garbage_shooter = $request->input('garbage_shooter');
        if($garbage_shooter) {
            $garbage_shooter_value = 1;
        } else if ($garbage_shooter == null) {
            $garbage_shooter_value = 0;
        }

        $generators = $request->input('generators');
        if($generators) {
            $generators_value = 1;
        } else if ($generators == null) {
            $generators_value = 0;
        }

        $wifi = $request->input('wifi');
        if($wifi) {
            $wifi_value = 1;
        } else if ($wifi == null) {
            $wifi_value = 0;
        }

        $publish = $request->input('publish');
        if($publish) {
            $publish_value = 1;
        } else if ($publish == null) {
            $publish_value = 0;
        }

        $apartment = new Apartment;
        $apartment->title = $request->input('title');
        $apartment->user_id = auth()->user()->id;
        $apartment->sq_mt = $request->input('sq_mt');
        $apartment->main_photo = $MainPhotoToStore;
        $apartment->photo_1 = $Photo1ToStore;
        $apartment->photo_2 = $Photo2ToStore;
        $apartment->photo_3 = $Photo3ToStore;
        $apartment->photo_4 = $Photo4ToStore;
        $apartment->photo_5 = $Photo5ToStore;
        $apartment->master_bedroom = $request->input('master_bedroom');
        $apartment->bathroom = $request->input('bathroom');
        $apartment->kitchen = $kitchen_value;
        $apartment->guest_toilet = $guest_toilet_value;
        $apartment->corridor = $corridor_value;
        $apartment->store = $store_value;
        $apartment->balcony = $balcony_value;
        $apartment->elevator = $elevator_value;
        $apartment->cctv = $cctv_value;
        $apartment->garbage_shooter = $garbage_shooter_value;
        $apartment->generator = $generators_value;
        $apartment->wifi = $wifi_value;
        $apartment->published = $publish_value;

        $apartment->save();

        return redirect('/apartments');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
