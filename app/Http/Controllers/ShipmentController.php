<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shipment;
use App\Models\Truck;
use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipments = Shipment::with('customer', 'truck', 'location' )->get();

        return view('backend.shipment.index', compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    $ORDER_PAYMENT_STATUS = [
        "0" => "Partially Paid (25%)- Balance Invoiced",
        "1" => "Partially Paid (30%)- Balance Invoiced",
        "2" => "Partially Paid (50%)- Balance Invoiced",
        "3" => "Partially Paid (75%)- Balance Invoiced",
        "4" => "Invoiced and fully paid",
        "5" => "Invoiced awaiting payment",
        "6" => "Awaiting consolidation for invoice",
    ];

    $TRIP_CHALLENGES = [
        "0" => "Delay- Police Arrest ",
        "1" => "Delay- Await Loading",
        "2" => "Delay- Await Off Loading",
        "3" => "Delay- Security/Unrest",
        "4" => "Delay- Awaiting Truck Repair",
        "5" => "Delay- Accident",
        "6" => "Delay- Slow Speed(Bumpy Road)",
        "7" => "Delay- Slow Speed(Muddy Road)",
        "8" => "Delay- Slow Speed(Traffic)",
        "7" => "Delay- Lost Direction",
        "8" => "None",
    ];

    $ORDER_DELIVERY_STATUS = [
        "0" => "On Time, in-Full, No Damage ",
        "1" => "On Time, in-Transit-Damages",
        "2" => "On Time, in-Transit-Losses",
        "3" => "Late,in-Full, No Damage",
        "4" => "Late, in-Full, on-Transit-Damages",
        "5" => "Late, in-Transit-Losses",
    ];




        $customers = Customer::with('user')->get();
        $trucks = Truck::with('truck_type', 'truck_make')->get();
        $locations = Location::all();

        return view('backend.shipment.create', compact('customers', 'trucks', 'locations','ORDER_DELIVERY_STATUS', 'ORDER_PAYMENT_STATUS', 'TRIP_CHALLENGES'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'truck_id' => 'required',
            'loading_point' => 'required',
            'cargo_description' => 'required',
            'shipment_dispatch_date' => 'required',
            'shipment_dispatch_time' => 'required',
            'delivery_points' => 'required',
            'invoice_date' => 'required',
            'order_payment_status' => 'required',
            'transporter_rate_per_trip' => 'required',
            'trip_challenges' => 'required',

        ]);



        $DIR_DELIVERY_NOTES_IMAGES = "delivery_notes";

        $data = $request->all();

        for ($i = 0; $i < count($data['delivery_points']); $i++) {


            $thumb = $data['delivery_points'][$i]['delivery_note_image'];
            $thumb_file = $this->uploadImage($thumb, $DIR_DELIVERY_NOTES_IMAGES);

            $data['delivery_points'][$i]['delivery_note_image']= $thumb_file;




        }


        $shipment = new Shipment();

        $shipment->fill($data);

        if ($shipment->save()) {

            $notification = array(
                'message' => 'Shipment Created Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('shipment.index')
                ->with($notification);
        } else {

            $notification = array(
                'message' => 'An Error Occured. Try again',
                'alert-type' => 'error'
            );

            return redirect()->back()
                ->withInput()
                ->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment, $id)
    {
        //
        $ORDER_PAYMENT_STATUS = [
            "0" => "Partially Paid (25%)- Balance Invoiced",
            "1" => "Partially Paid (30%)- Balance Invoiced",
            "2" => "Partially Paid (50%)- Balance Invoiced",
            "3" => "Partially Paid (75%)- Balance Invoiced",
            "4" => "Invoiced and fully paid",
            "5" => "Invoiced awaiting payment",
            "6" => "Awaiting consolidation for invoice",
        ];

        $TRIP_CHALLENGES = [
            "0" => "Delay- Police Arrest ",
            "1" => "Delay- Await Loading",
            "2" => "Delay- Await Off Loading",
            "3" => "Delay- Security/Unrest",
            "4" => "Delay- Awaiting Truck Repair",
            "5" => "Delay- Accident",
            "6" => "Delay- Slow Speed(Bumpy Road)",
            "7" => "Delay- Slow Speed(Muddy Road)",
            "8" => "Delay- Slow Speed(Traffic)",
            "7" => "Delay- Lost Direction",
            "8" => "None",
        ];

        $ORDER_DELIVERY_STATUS = [
            "0" => "On Time, in-Full, No Damage ",
            "1" => "On Time, in-Transit-Damages",
            "2" => "On Time, in-Transit-Losses",
            "3" => "Late,in-Full, No Damage",
            "4" => "Late, in-Full, on-Transit-Damages",
            "5" => "Late, in-Transit-Losses",
        ];


        $shipment = Shipment::find($id);
        $customers = Customer::with('user')->get();
        $trucks =Truck::with('truck_type', 'truck_make')->get();
        $locations = Location::all();


        return view('backend.shipment.edit', compact('customers', 'trucks', 'shipment', 'locations', 'ORDER_DELIVERY_STATUS', 'ORDER_PAYMENT_STATUS', 'TRIP_CHALLENGES'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipment $shipment)
    {
        //
        $DIR_DELIVERY_NOTES_IMAGES = "delivery_notes";

        $data = $request->all();

        // dd(count($data['delivery_points']));

        for ($i = 0; $i < count($data['delivery_points']); $i++) {

            if( ($data['delivery_points'][$i]['delivery_note_image_prev'] == null ) ) {

                $thumb = $data['delivery_points'][$i]['delivery_note_image'];
                $thumb_file = $this->uploadImage($thumb, $DIR_DELIVERY_NOTES_IMAGES);

                $data['delivery_points'][$i]['delivery_note_image']= $thumb_file;
                $data['delivery_points'][$i]['delivery_note_image_prev']= $thumb_file;

            } elseif( ($data['delivery_points'][$i]['delivery_note_image_prev'] != null )) {
                $data['delivery_points'][$i]['delivery_note_image'] = $data['delivery_points'][$i]['delivery_note_image_prev'];
            }

        }

        $shipment = Shipment::find($data['id']);

        $shipment->fill($data);

        if ($shipment->update()) {

            $notification = array(
                'message' => 'Shipment Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('shipment.index')
                ->with($notification);
        } else {

            $notification = array(
                'message' => 'An Error Occured. Try again',
                'alert-type' => 'error'
            );

            return redirect()->back()
                ->withInput()
                ->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment, $id)
    {
        //
        $shipment->destroy($id);

        // Storage::delete(['file.jpg', 'file2.jpg']);

        $notification = array(
            'message' => 'Deleted succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()
            ->with($notification);
    }
}
