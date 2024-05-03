<?php

namespace App\Http\Controllers;

use Alert;
use App\Property;
use App\UserEmail;
use App\MailNotification;
use App\Mail\EmailNotification;
use App\PropertiSG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class PropertiSGController extends Controller
{
    public function tampilPropertiSG(PropertiSG $house)
    {
        return view('hasil.tampilpropertiSG', compact('house'));
    }

    public function cariPropertiSG(Request $request)
    {
        $keyword = $request->input('searchquery');
        $periode = $request->input('periode');
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');

        // Check if 'periode' is selected, then include it in the query
        $houses = PropertiSG::whereHas('property', function ($query) use ($periode, $keyword, $minPrice, $maxPrice) {
            if ($periode != '0') {
                $query->where('periode', $periode);
            }
            $query->where(function ($query) use ($keyword) {
                $query->where('type', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('city', 'LIKE', '%' . $keyword . '%');
            })
            ->whereBetween('amount', [$minPrice, $maxPrice]);
        })->get();
        
        // dd(count($houses));
        

        return view('hasil.hasilpropertisg', compact('houses'));
    }

    public function tampilEditPropertiSG(PropertiSG $house)
    {
        if ($house->property->user_id == auth()->id()) {

        $id = Auth::user()->id;

        return view('profil.home', compact('house'), array('user' => Auth::user()));

        } else {

            Alert::error('Permintaan Anda telah ditolak oleh sistem', 'Upaya Tidak Diizinkan')->autoclose(3000);
            return redirect('/profil');
        }
    }

    public function editPropertiSG(Request $request)
    {

        $property = Property::find(request('propertyid'));
        $house = PropertiSG::find(request('houseid'));

        if ($property->user_id == auth()->id() || Auth::guard('admin')->check()) {

            $request->validate([
                'name' => 'required|max:50|min:3',
                'city' => 'required',
                'description' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
                'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',        
                'periode' => 'required|integer',
                'stok' => 'required|integer',
            ]);

            if ($request->hasfile('filename')) {
                $dir_rumah=$property->type;
                $arr_img=array($property->images);
                $dir=public_path('uploads/property/'.strtolower($dir_rumah).'/');
                foreach($arr_img as $img) {
                    $j=explode(",",$property->images);
                    for($i=0;$i< count($j); $i++){
                        File::delete($dir.json_decode($img)[$i]);
                    }
                }
                foreach ($request->file('filename') as $image) {
                    $name = uniqid('real_') . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(1280, 876)->save(\public_path('/uploads/property/rumah/' . $name));
                    $data[] = $name;
                }
            }

            $property->name = request('name');
            $property->amount = request('amount');
            $property->periode = request('periode');
            $property->city = request('city');
            $property->wilayah = 'JABODETABEK';
            $property->description = request('description');

            if ($request->hasfile('filename')) {

                $property->images = json_encode($data);
            }

            $property->save();

            $house->stok = request('stok');
            $house->save();

            Alert::success('Properti Anda telah berhasil diedit!', 'Berhasil Diperbarui')->autoclose(3000);
            return back()->with('message', 'Your property has been Berhasil Diperbarui!');
        } else {

            Alert::error('Permintaan Anda telah ditolak oleh sistem', 'Upaya Tidak Diizinkan')->autoclose(3000);
            return redirect('/profil');

        }
    }

    public function hapusPropertiSG(PropertiSG $house)
    {

        if ($house->property->user_id == auth()->id() || Auth::guard('admin')->check()) {

            $dir_prop=$house->property->type;
            $arr_img=array($house->property->images);
            $dir=public_path('uploads/property/'.strtolower($dir_prop).'/');
                foreach($arr_img as $img) {
                    $j=explode(",",$house->property->images);
                    for($i=0;$i< count($j); $i++){
                        File::delete($dir.json_decode($img)[$i]);
                        DB::table('rumahs')->where('id', '=', $house->id)->delete();
                        DB::table('properties')->where('id', '=', $house->property->id)->delete();
                    }
                }

            Alert::success('Properti Anda telah berhasil dihapus!', 'Sukses Dihapus!')->autoclose(3000);
            return back();
        } else {

            Alert::error('Permintaan Anda telah ditolak oleh sistem', 'Upaya Tidak Diizinkan')->autoclose(3000);
            return redirect('/profil');

        }
    }

    public function hapusPropertiSGAdmin(Property $house)
    {

        if ($house->user_id == auth()->id() || Auth::guard('admin')->check()) {

            $dir_prop=$house->type;
            $arr_img=array($house->images);
            $dir=public_path('uploads/property/'.strtolower($dir_prop).'/');
                foreach($arr_img as $img) {
                    $j=explode(",",$house->images);
                    for($i=0;$i< count($j); $i++){
                        File::delete($dir.json_decode($img)[$i]);
                        DB::table('rumahs')->where('id', '=', $house->id)->delete();
                        DB::table('properties')->where('id', '=', $house->id)->delete();
                    }
                }

            Alert::success('Properti Anda telah berhasil dihapus!', 'Sukses Dihapus!')->autoclose(3000);
            return back();
        } else {

            Alert::error('Permintaan Anda telah ditolak oleh sistem', 'Upaya Tidak Diizinkan')->autoclose(3000);
            return redirect('/admin/login');

        }
    }
}
