<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Property;
use App\PropertiSG;
use Intervention\Image\Facades\Image;

class PropertyController extends Controller
{
    public function tambahPropertiSG(Request $request){

        $request->validate([
            'name' => 'required|max:50|min:3',
            'city' => 'required',
            'description' => 'required',
            'type' => 'required',
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',        
            'periode' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $property = new Property;
        $prop_dir=$property->type = request('type');

        if($request->hasfile('filename'))
         {
            $dir = public_path("uploads/property/" . strtolower($prop_dir)."/");

            if (!File::exists($dir)) {
                File::makeDirectory($dir);
            }

            foreach($request->file('filename') as $image)
            {
                $name= uniqid('real_') . '.' . $image->getClientOriginalExtension();
                Image::make(file_get_contents($image))->resize(1280,876)->save(($dir . $name));  
                $data[] = $name;
            }
         }

        $property->user_id = auth()->id();
        $property->name = request('name');
        $property->amount = request('amount');
        $property->periode = request('periode');
        $property->city = request('city');
        $property->wilayah = 'JABODETABEK';
        $property->description = request('description');
        $property->images = json_encode($data);
        $property->save();

        $propSG = new PropertiSG;
        $propSG->property()->associate($property);
        $propSG->stok = request('stok');
        $propSG->save();

        return back()->with('message', 'Properti Anda telah berhasil ditambahkan!');

    }
}
