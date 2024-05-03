<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Intervention\Image\Facades\Image;
use App\User;
use App\Transaksi;
use App\UserEmail;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Favorit;
use App\Property;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    public function updateAvatar(Request $request){
        if($request->hasFile('avatar')){
            $user = Auth::user();
            $dir=public_path('uploads/avatars/'.$user->avatar);
            File::delete($dir);
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make(file_get_contents($avatar))->resize(300,300)->save(\public_path('/uploads/avatars/' . $filename));
            $user->avatar = $filename;
            $user->save();
        }

        //return view('profile.dashboard', array('user'=> Auth::user()));
        return back();
    }

    public function loadUserDashboard()
    {
        return view('profil.home',array('user' => Auth::user()));
    }

    public function updateAkun(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string', 'email|max:255|unique:users',
            'descrption'=> 'required|string|max:100',
            // 'nic' => 'required|string|regex:/^[0-9]{9}[Vv]$/',
            'nic' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'birthday' => 'required|date_format:Y-m-d|before:today',
            'gender' => 'required',
            'phoneno' => 'required|string',
        ]);

        $user = User::find($id);
        if(strcmp($user->email,request('email')) != 0 ){
            $user->email_verified_at = NULL;
        }
        $user->name = request('name');
        $user->email = request('email');
        $user->description = request('descrption');
        $user->NIC = request('nic');
        $user->address = request('address');
        $user->city = request('city');
        $user->gender = request('gender');
        $user->birthday = request('birthday');
        $user->phoneNo = request('phoneno');
        $user->save();

        return back()->with('message', 'Akun Anda telah berhasil diperbarui!');
    }

    public function gantiPassword(Request $request){

        $request->validate([

            'password' => 'required|string|min:8|confirmed',
            'current_password' => 'required',
        ]);

        if(!(Hash::check(request('current_password'),Auth::user()->password))){

            return back()->with("errormsg","Kata sandi Anda saat ini tidak cocok dengan kata sandi yang Anda berikan. Silahkan coba lagi.");

        }

        if(strcmp(request('current_password'),request('password')) == 0){

            return back()->with("warningmsg","Kata Sandi Baru tidak boleh sama dengan kata sandi Anda saat ini. Silahkan pilih kata sandi yang berbeda.");

        }

        $user = Auth::user();
        $user->password = Hash::make(request('password'));
        $user->save();

        return back()->with("success","Kata sandi berhasil diubah!");

    }

    public function hapusAkunUser(User $user){

        if ($user->id == auth()->id()) {

            //delete all properties
            $properties = $user->properties;

            foreach($properties as $property){

                $propertyType = checkPropertyTypeById($property->id);

                $dir=public_path('uploads/avatars/'.$user->avatar);
                File::delete($dir);

                if(strcmp($propertyType,'rumah')){

                    DB::table('rumahs')->where('property_id', '=', $property->id)->delete();

                }else{
                    Alert::error('Permintaan Anda telah ditolak oleh sistem', 'System Error')->autoclose(3000);
                    return redirect('/profil');
                }

                //delete main property
                DB::table('properties')->where('id', '=', $property->id)->delete();
            }

            DB::table('users')->where('id', '=', $user->id)->delete();

            Alert::success('Akun Anda telah berhasil dihapus!', 'Sukses Dihapus!')->autoclose(3000);
            return back();
        }
        else {

            Alert::error('Permintaan Anda telah ditolak oleh sistem', 'Upaya Tidak Diizinkan')->autoclose(3000);
            return redirect('/profil');

        }
    }

}
