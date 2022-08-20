<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\UpdateItemReqeust;
use App\Models\Inventory;
use App\Models\QrCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.inventory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prefix = Str::upper(Str::substr(Carbon::now()->format('F'), 0, 3));
        $inventory_number = IdGenerator::generate(['table' => 'inventory', 'field' => 'inventory_number', 'length' => 6, 'prefix' => $prefix]);
        return view('admin.inventory.create', compact('inventory_number'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {

        $inventory =  Inventory::create($request->validated());
        $qr = [];
        for ($i = 0; $i < $request->quantity; $i++) {
            array_push($qr, [
                'inventory_id' => $inventory->id,
                'qr_code' => Str::random(10)
            ]);
        }
        QrCode::insert($qr);
        toast('Item added successfully', 'success');
        return redirect()->route('inventory.show', $inventory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Inventory $inventory)
    {
        $inventory->load(
            // 'requesistion_item.unit',
            // 'requesistion_item.requesition',
            // 'requesistion_item.qr_code'
            'qr.unit',
            'qr.requesition',
            'qr.requesition.requested',

        );
        // dd($inventory);
        $ip = $request->ip();
        return view('admin.inventory.show', compact('inventory', 'ip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('admin.inventory.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemReqeust $request, Inventory $inventory)
    {
        $inventory->update($request->validated());
        toast('Item updated successfully', 'success');
        return redirect()->route('inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        toast('Item Deleted successfully', 'success');
        return redirect()->route('inventory.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request, $type)
    {

        $image = FacadesQrCode::format('png')
            ->size(400)
            ->margin(10)
            ->errorCorrection('H')

            ->generate($request->qr_code);
        $output_file = '/images/qr-code/img.png';
        Storage::disk('public')->put($output_file, $image);
        $img = Image::make('storage/images/qr-code/img.png')
            ->text($request->qr_code, 150, 350, function ($font) {
                $font->file(5);
                $font->size(15);
                $font->color('#000000');
                $font->align('bottom');
            });
        $img->save('storage/images/qr-code/newqr.png');
        return response()->download('storage/images/qr-code/newqr.png');
    }
}
