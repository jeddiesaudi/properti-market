<?php

namespace App\Http\Controllers;

use Alert;
use App\Admin;
use App\PropertiSG;
use App\MailNotification;
use App\Mail\EmailNotification;
use App\Message;
use App\Property;
use App\ReportProperty;
use App\User;
use App\UserEmail;
use Auth;
use function GuzzleHttp\json_encode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

        $properties = Property::limit(5)->orderBy('id', 'desc')->get();
        $users = User::limit(5)->orderBy('id', 'desc')->get();

        //Type Graph
        $graphData = Property::select('type', DB::raw('count(type) number'))->groupBy('type')->get();
        $array[] = ['Type', 'Number'];
        foreach ($graphData as $key => $value) {

            $array[++$key] = [$value->type, $value->number];
        }
        $data = json_encode($array);

        //Property Reports
        $graphReport = ReportProperty::select(DB::raw('monthname(created_at) as Month,count(date_format(created_at,"%m")) as Count'))->groupBy('Month')->get();
        $arrayReport[] = ['Month', 'Count'];
        foreach ($graphReport as $key => $value) {

            $arrayReport[++$key] = [$value->Month, $value->Count];
        }
        $graphReportData = json_encode($arrayReport);

        return view('admin.master', compact('properties', 'users', 'data', 'graphReportData'));
    }

    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $user = Auth::user();
            $dir=public_path('uploads/avatars/'.$user->avatar);
            File::delete($dir);
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make(file_get_contents($avatar))->resize(300, 300)->save(\public_path('/uploads/avatars/' . $filename));
            $user->avatar = $filename;
            $user->save();
        }
        return back();
    }

    public function tampilUser(User $user)
    {

        $id = $user->id;
        $properties = Property::where(function ($query) use ($id) {

            $query->where('user_id', '=', $id);

        })->get();

        return view('admin.master', compact('user', 'properties'));

    }

    public function tampilAdminEditPropertiSG(PropertiSG $house)
    {

        $id = Auth::user()->id;

        $messages = UserEmail::where(function($query) use ($id) 
        {
            $query->where('receiver_id','=', $id);

        })->where(function ($query){

            $query->where('status', 'LIKE', 'unread');

        });

        return view('admin.master', compact('house','messages'));

    }


    public function tampilSemuaProperti()
    {

        $properties = Property::paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function tampilSemuaPropertiSG()
    {

        $properties = PropertiSG::whereHas('property', function ($query) {

            $query->where('type', '=', 'rumah');

        })->paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function tampilSemuaUser()
    {

        $users = User::paginate(20);
        return view('admin.master', compact('users'));
    }

    public function tampilAdminEditUser(User $user)
    {

        return view('admin.master', compact('user'));
    }

    public function adminEditUser(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string', 'email|max:255|unique:users',
            'descrption' => 'required|string|max:100',
            'nic' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'gender' => 'required',
            'phoneno' => 'required|numeric',
        ]);

        $user = User::find(request('id'));
        if (strcmp($user->email, request('email')) != 0) {
            $user->email_verified_at = null;
        }
        $user->name = request('name');
        $user->email = request('email');
        $user->description = request('descrption');
        $user->NIC = request('nic');
        $user->address = request('address');
        $user->city = request('city');
        $user->gender = request('gender');
        $user->phoneNo = request('phoneno');
        $user->save();

        Alert::success('User telah berhasil diedit!', 'Berhasil Tersimpan')->autoclose(3000);
        return back()->with('message', 'Akun User Berhasil Terupdate!');
    }

    public function adminHapusUser(User $user)
    {

        //delete all properties
        $properties = $user->properties;

        foreach ($properties as $property) {

            // $propertyType = checkPropertyTypeById($property->id);
            $propertyType = $property->id;

            if (strcmp($propertyType, 'house')) {

                DB::table('rumahs')->where('property_id', '=', $property->id)->delete();

            } else {
                Alert::error('Permintaan Anda telah ditolak oleh sistem', 'System Error')->autoclose(3000);
                return redirect('/profil');
            }

            //delete main property
            DB::table('properties')->where('id', '=', $property->id)->delete();
        }

        DB::table('users')->where('id', '=', $user->id)->delete();

        Alert::success('Akun User telah berhasil dihapus!', 'Sukses Dihapus!')->autoclose(3000);
        return back();

    }

    public function tampilAdminTambahUser()
    {

        return view('admin.master');
    }

    public function adminTambahUser(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string', 'email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();

        Alert::success('Akun pengguna telah berhasil ditambahkan!', 'Berhasil Ditambahkan!')->autoclose(3000);
        return back();
    }

    public function tampilSemuaAdmin()
    {

        $admins = Admin::paginate(15);

        return view('admin.master', compact('admins'));
    }

    public function tampilTambahAdmin()
    {

        $isSupper = Auth::guard('admin')->user()->issuper;
        if ($isSupper) {
            return view('admin.master');
        } else {
            Alert::warning('Anda tidak memiliki izin untuk menambahkan admin baru!', 'Aakses Ditolak!')->autoclose(3000);
            return back();
        }

    }

    public function tambahAdmin(Request $request)
    {

        $isSupper = Auth::guard('admin')->user()->issuper;
        if ($isSupper) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string', 'email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
            
            $user = new Admin();
            $user->name = request('name');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            if( $request->has('issuper')){
                $user->issuper = 1;
            }
            $user->save();

            Alert::success('Akun admin telah berhasil ditambahkan!', 'Berhasil Ditambahkan!')->autoclose(3000);
            return back();
        } else {
            Alert::warning('Anda tidak memiliki izin untuk menambahkan admin baru!', 'Aakses Ditolak!')->autoclose(3000);
            return back();
        }

    }

    public function tampilEditAdmin(Admin $admin)
    {

        $isSupper = Auth::guard('admin')->user()->issuper;
        if ($isSupper || Auth::guard('admin')->user()->id == $admin->id) {
            return view('admin.master', compact('admin'));
        } else {
            Alert::warning('Anda tidak memiliki izin untuk mengedit admin!', 'Aakses Ditolak!')->autoclose(3000);
            return back();
        }

    }

    public function editAdmin(Request $request)
    {

        $isSupper = Auth::guard('admin')->user()->issuper;

        if ($isSupper || Auth::guard('admin')->user()->id == request('id')) {
            if (request('password')) {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string', 'email|max:255|unique:users',
                    'password' => 'string|min:8',
                ]);
            } else {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string', 'email|max:255|unique:users',
                ]);
            }

            $admin = Admin::find(request('id'));
            $admin->name = request('name');
            $admin->email = request('email');
            if (request('password')) {
                $admin->password = Hash::make(request('password'));
            } else {
                $admin->password = $admin->password;
            }
            $admin->update();

            Alert::success('Akun admin telah berhasil diedit!', 'Successfully Saved!')->autoclose(3000);
            return back();
        } else {
            Alert::warning('Anda tidak memiliki izin untuk mengedit admin!', 'Aakses Ditolak!')->autoclose(3000);
            return back();
        }

    }

    public function hapusAdmin(Admin $admin)
    {
        $user=Auth::guard('admin')->user();
        $isSupper = $user->issuper;
        if ($isSupper) {
            $dir=public_path('uploads/avatars/'.$user->avatar);
            File::delete($dir);
            DB::table('admins')->where('id', '=', $admin->id)->delete();
            Alert::success('Akun admin telah berhasil dihapus!', 'Deleted Successfully!')->autoclose(3000);
            return back();
        } else {
            Alert::warning('Anda tidak memiliki izin untuk menghapus admin!', 'Aakses Ditolak!')->autoclose(3000);
            return back();
        }

    }

    public function tampilReport()
    {

        $reports = ReportProperty::paginate(20);

        return view('admin.master', compact('reports'));

    }

    public function lockProperti(Property $property)
    {

        $property = Property::find($property->id);
        $property->availability = 'LOCKED';
        $property->save();

        $message = new MailNotification;
        $message->receiver_email = $property->user->email;
        $message->receiver_name = $property->user->name;
        $message->property_name = $property->name;
        $message->property_location = $property->city;
        $message->property_createdOn = $property->created_at;
        $message->status = 'locked';
        $message->subject = "Properti telah dikunci!";

        \Mail::to($message->receiver_email)->send(new EmailNotification($message));

        Alert::success('Properti telah dikunci!', 'LOCKED!')->autoclose(3000);
        return back();

    }

    public function unlockProperti(Property $property)
    {

        $property = Property::find($property->id);
        $property->availability = 'YES';
        $property->save();

        $message = new MailNotification;
        $message->receiver_email = $property->user->email;
        $message->receiver_name = $property->user->name;
        $message->property_name = $property->name;
        $message->property_location = $property->city;
        $message->property_createdOn = $property->created_at;
        $message->status = 'unlocked';
        $message->subject = "Properti telah ter-Unlock!";

        \Mail::to($message->receiver_email)->send(new EmailNotification($message));

        Alert::success('Properti telah ter-Unlock!', 'UNLOCKED!')->autoclose(3000);
        return back();

    }

}
