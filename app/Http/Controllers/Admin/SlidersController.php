<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use App\Models\Pages;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders=Sliders::get()->toArray();
        $users=Admin::get()->toArray();
        return view('admin.sliders.index',compact('sliders','users'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id=null)
    {
        $userId = Auth::guard('admin')->user()->id;
        $sliders = $id ? Sliders::findOrFail($id) : new Sliders;
        if($id==""){
            $pageTitle="Slider Ekleme";
            $message = "Bilgiler Kayıt Edildi.";
            $sliders->created_at = now();
            $sliders->createUserId = $userId;
        }else{
            $pageTitle="Slider Düzeleme";
            $message = "Bilgiler Güncellendi.";
            $sliders->updated_at = now();
            $sliders->updateUserId = $userId;
        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $rules=[
                'name'=>'required',
                'image'=>'required',
                'description'=>'required'
            ];
            $customMessages=[
                'name.require' => 'Başlık giriniz.',
                'image.require' => 'Resim ekleyiniz.',
                'description.require' => 'Açıklama giriniz.',
            ];
            $this->validate($request, $rules, $customMessages);

            $sliders->status = $request->has('status') ? 1 : 0;

            foreach (['image', 'imageEn', 'imageRu', 'imageAr'] as $lang) {
                $urlParts = parse_url($data[$lang]);
                $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
                $sliders->$lang = $onlyPath;
            }

            foreach (['name', 'nameEn', 'nameRu', 'nameAr', 'description', 'descriptionEn', 'descriptionRu', 'descriptionAr',
            'buttonLink', 'buttonLinkEn', 'buttonLinkRu', 'buttonLinkAr', 'buttonName', 'buttonNameEn', 'buttonNameRu', 'buttonNameAr', 'orderNo'] as $field) {
                $sliders->$field = $data[$field];
            }
            $sliders->save();
            return redirect('/NPanel/sliders')->with('success_message',$message);
        }
        return view('admin.sliders.crud')->with(compact('pageTitle','sliders'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete
        Sliders::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Slider Silindi.');
    }
}
