<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages=Pages::get()->toArray();
        //dd($pages);
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id=null)
    {
        $allPages=Pages::get()->toArray();
        if($id==""){
            $pageTitle="Sayfa Ekleme";
            $pages = new Pages;
            $message = "Bilgiler Kayıt Edildi.";
            $pages->created_at = now();

        }else{
            $pageTitle="Sayfa Düzeleme";
            $pages = Pages::find($id);
            $message = "Bilgiler Güncellendi.";
            $pages->updated_at = now();

        }
        if($request->isMethod('post')){
            $data = $request->all();


            if(isset($data['status']) && $data['status'] == 'on'){
                $pages->status = 1;
            } else {
                $pages->status = 0;
            }
            if(isset($data['home_page']) && $data['home_page'] == 'on'){
                $pages->home_page = 1;
            } else {
                $pages->home_page = 0;
            }

            if(isset($data['menu_status']) && $data['menu_status'] == 'on'){
                $pages->menu_status = 1;
            } else {
                $pages->menu_status = 0;
            }

            if(isset($data['footer_status']) && $data['footer_status'] == 'on'){
                $pages->footer_status = 1;
            } else {
                $pages->footer_status = 0;
            }
            if (isset($data['image'])) {
            $urlParts = parse_url($data['image']);
            $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
            $pages->image = $onlyPath;
            }
            if (isset($data['title'])) {
                $pages->title = $data['title'];
            }

            if (isset($data['content'])) {
                $pages->content = $data['content'];
            }

            if (isset($data['metaUrl'])) {
                $pages->url = $data['metaUrl'];
            }

            if (isset($data['metaTitle'])) {
                $pages->meta_title = $data['metaTitle'];
            }

            if (isset($data['metaContent'])) {
                $pages->meta_description = $data['metaContent'];
            }

            if (isset($data['metaKey'])) {
                $pages->meta_keywords = $data['metaKey'];
            }

            $pages->parent_id = $data['subPage'];

            if (isset($data['imageEn'])) {
                $urlPartsEn = parse_url($data['imageEn']);
                $onlyPathEn = isset($urlPartsEn['path']) ? $urlPartsEn['path'] : '';
                $pages->imageEn = $onlyPathEn;
            }
            if (isset($data['titleEn'])) {
                $pages->titleEn = $data['titleEn'];
            }
            if (isset($data['contentEn'])) {
                $pages->contentEn = $data['contentEn'];
            }

            if (isset($data['metaUrlEn'])) {
                $pages->urlEn = $data['metaUrlEn'];
            }

            if (isset($data['metaTitleEn'])) {
                $pages->meta_titleEn = $data['metaTitleEn'];
            }

            if (isset($data['metaContentEn'])) {
                $pages->meta_descriptionEn = $data['metaContentEn'];
            }

            if (isset($data['metaKeyEn'])) {
                $pages->meta_keywordsEn = $data['metaKeyEn'];
            }
            if (isset($data['imageAr'])) {
                $urlPartsAr = parse_url($data['imageAr']);
                $onlyPathAr = isset($urlPartsAr['path']) ? $urlPartsAr['path'] : '';
                $pages->imageAr = $onlyPathAr;
            }

            if (isset($data['titleAr'])) {
                $pages->titleAr = $data['titleAr'];
            }

            if (isset($data['contentAr'])) {
                $pages->contentAr = $data['contentAr'];
            }

            if (isset($data['metaUrlAr'])) {
                $pages->urlAr = $data['metaUrlAr'];
            }

            if (isset($data['metaTitleAr'])) {
                $pages->meta_titleAr = $data['metaTitleAr'];
            }

            if (isset($data['metaContentAr'])) {
                $pages->meta_descriptionAr = $data['metaContentAr'];
            }

            if (isset($data['metaKeyAr'])) {
                $pages->meta_keywordsAr = $data['metaKeyAr'];
            }
            if (isset($data['imageRu'])) {
                $urlPartsRu = parse_url($data['imageRu']);
                $onlyPathRu = isset($urlPartsRu['path']) ? $urlPartsRu['path'] : '';
                $pages->imageRu = $onlyPathRu;
            }

            if (isset($data['titleRu'])) {
                $pages->titleRu = $data['titleRu'];
            }

            if (isset($data['contentRu'])) {
                $pages->contentRu = $data['contentRu'];
            }

            if (isset($data['metaUrlRu'])) {
                $pages->urlRu = $data['metaUrlRu'];
            }

            if (isset($data['metaTitleRu'])) {
                $pages->meta_titleRu = $data['metaTitleRu'];
            }

            if (isset($data['metaContentRu'])) {
                $pages->meta_descriptionRu = $data['metaContentRu'];
            }

            if (isset($data['metaKeyRu'])) {
                $pages->meta_keywordsRu = $data['metaKeyRu'];
            }

            $pages->save();
            return redirect('/NPanel/pages')->with('success_message',$message);
        }
        return view('admin.pages.addEditPage')->with(compact('pageTitle','pages','allPages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pages $pages)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status'] == "Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Pages::where('id',$data['page_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'page_id'=>$data['page_id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete
        Pages::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Sayfa Silindi.');
    }
}
