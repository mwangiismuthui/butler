<?php

namespace App\Http\Controllers;

use App\Models\Truck_make;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TruckMakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $truck_makes = $request->input('trucks');

        foreach ($truck_makes as $make) {
            Truck_make::create([
                'make'          =>  $make['make'],
                'description'   => $make['description']
            ]);
        }

        $notification = array(
            'message' => 'Truck Make(s) created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Truck_make  $truck_make
     * @return \Illuminate\Http\Response
     */
    public function show(Truck_make $truck_make)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Truck_make  $truck_make
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck_make $truck_make)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Truck_make  $truck_make
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck_make $truck_make)
    {
        //
        $data = $request->all();

        $make = Truck_make::find($data['id']);

        $make->fill($data);


        if ($make->save()) {

            $notification = array(
                'message' => 'Truck make Updated successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('truck.index')
            ->with($notification);
        }else {

            $notification = array(
                'message' => 'An Error Occured. Try again',
                'alert-type' => 'error'
            );

            return redirect()->back()
                ->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Truck_make  $truck_make
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck_make $truck_make, $id)
    {
        //
        $truck = $truck_make->find($id);

        if($truck->trucks->count()){

            $notification = array(
                'message' => 'Can not Delete Item. Item is in use',
                'alert-type' => 'warning'
            );

            return redirect()->back()
                ->with($notification);
        }

        $truck_make->destroy($id);

        $notification = array(
            'message' => 'Truck Make removed successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()
            ->with($notification);
    }
}
