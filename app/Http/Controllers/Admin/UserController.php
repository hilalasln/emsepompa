<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Validator;
use Hash;
use Image;
use Session;


class UserController extends Controller
{
    public function index(){
        $users = Admin::get()->toArray();
        return view('admin.users.index', compact('users'));
    }

    public function edit(Request $request,$id=null)
    {
        $userId = Auth::guard('admin')->user()->id;
        if($id==""){
            $pageTitle="Kullanıcı Ekleme";
            $users = new Admin;
            $message = "Bilgiler Kayıt Edildi.";
            $users->created_at = now();
            $users->createUserId = $userId;

            $rules=[
                'password' => 'required|min:6',
                'password2' => 'required|same:password',
            ];
            $customMessages=[
                'password.required' => 'Şifre alanı boş bırakılamaz',
                'password.min' => 'Şifre en az 6 karakter olmalıdır',
                'password2.required' => 'Şifre tekrar alanı boş bırakılamaz',
                'password2.same' => 'Şifreler eşleşmiyor',
            ];


        }else{
            $pageTitle="Kullanıcı Düzeleme";
            $users = Admin::find($id);
            $message = "Bilgiler Güncellendi.";
            $users->updated_at = now();
            $users->updateUserId = $userId;

        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $rules=[
                'name'=>'required',
            ];
            $customMessages=[
                'name.require' => 'Adınızı yazınız.',
            ];
            $this->validate($request, $rules, $customMessages);

            if(isset($data['status']) && $data['status'] == 'on'){
                $users->status = 1;
            } else {
                $users->status = 0;
            }

            $urlParts = parse_url($data['image']);
            $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
            $users->image = $onlyPath;

            $users->name = $data['name'];
            $users->surname = $data['surname'];
            $users->type = $data['typeId']; // 0= Süper Admin, 1 = admin, 2 =editor, 3 = içerik yöneticisi
            $users->mobile = $data['mobile'];
            $users->email = $data['email'];
            $users->password = Hash::make($data['password']);
            $users->save();
            return redirect('/NPanel/users')->with('success_message',$message);
        }
        return view('admin.users.crud')->with(compact('pageTitle','users'));
    }

    public function destroy($id)
    {
        // Delete
        Admin::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Kullanıcı Silindi.');
    }
}
?>
