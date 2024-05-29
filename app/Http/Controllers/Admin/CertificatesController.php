<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Certificates;
use Auth;
use Validator;
use Hash;
use Image;
use Session;


class CertificatesController extends Controller
{
    public function index(){
        $users = Admin::get()->toArray();
        $certificates = Certificates::orderBy('order')->get()->toArray();
        return view('admin.certificates.index', compact('users','certificates'));
    }

    public function edit(Request $request,$id=null)
    {
        $userId = Auth::guard('admin')->user()->id;
        if($id==""){
            $pageTitle="Sertifika Ekleme";
            $certificates = new Certificates;
            $message = "Bilgiler Kayıt Edildi.";
            $certificates->created_at = now();
            $certificates->createUserId = $userId;
        }else{
            $pageTitle="Sertifika Düzeleme";
            $certificates = Certificates::find($id);
            $message = "Bilgiler Güncellendi.";
            $certificates->updated_at = now();
            $certificates->updateUserId = $userId;
        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $rules=[
                'name'=>'required',
            ];
            $customMessages=[
                'name.require' => 'Modül adını lütfen boş bırakmayın.',
            ];

            $this->validate($request, $rules, $customMessages);

            if(isset($data['status']) && $data['status'] == 'on'){
                $certificates->status = 1;
            } else {
                $certificates->status = 0;
            }

            $urlParts = parse_url($data['image']);
            $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
            $certificates->image = $onlyPath;

            $certificates->name     =  $data['name'];
            $certificates->order     =  $data['order'];
            $certificates->save();

            return redirect('/NPanel/certificates')->with('success_message',$message);
        }
        return view('admin.certificates.crud')->with(compact('pageTitle','certificates'));
    }

    public function destroy($id)
    {
        // Delete
        Certificates::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Sertifika Silindi.');
    }
}
?>
