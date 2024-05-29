<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\RoomFeature;
use App\Models\RoomCategories;
use App\Models\RoomsAndCategories;
use App\Models\Images;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;


class ProductsController extends Controller
{

    public function index()
    {
        $rooms = Rooms::get()->toArray();
        $users = Admin::get()->toArray();
        return view('admin.products.index', compact('rooms', 'users'));
    }

    public function edit(Request $request, $id = null)
    {
        $userId = Auth::guard('admin')->user()->id;
        $allCategories = RoomCategories::get()->toArray();
        $roomImages = Images::get()->toArray();

        if ($id === null) {
            $pageTitle = "Ürün Ekleme";
            $message = "Bilgiler Kayıt Edildi.";
            $rooms = new Rooms;
            $rooms->created_at = now();
            $rooms->createUserId = $userId;
            $selectedImage = null;
            $selectedCategory = [];
        } else {
            $pageTitle = "Ürün Düzenleme";
            $rooms = Rooms::find($id);
            if (!$rooms) {
                return redirect('/NPanel/products')->with('error_message', 'Ürün bulunamadı.');
            }
            $message = "Bilgiler Güncellendi.";
            $rooms->updated_at = now();
            $rooms->updateUserId = $userId;
            $selectedCategory = RoomsAndCategories::where('room_id', $id)->pluck('categories_id')->toArray();
            $selectedImage = Images::where('room_id', $id)->pluck('image_path')->toArray();
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'title' => 'required',
            ];
            $customMessages = [
                'title.required' => 'Başlık giriniz.',
            ];
            $this->validate($request, $rules, $customMessages);

            $rooms->status = isset($data['status']) && $data['status'] == 'on' ? 1 : 0;
            $rooms->home_page = isset($data['home_page']) && $data['home_page'] == 'on' ? 1 : 0;
            $rooms->code = $data['code'];
            $rooms->meta_title = $data['metaTitle'];
            $rooms->meta_titleEn = $data['metaTitleEn'];
            $rooms->meta_titleAR = $data['metaTitleAr'];
            $rooms->meta_titleRU = $data['metaTitleRu'];
            $rooms->meta_description = $data['metaContent'];
            $rooms->meta_descriptionEn = $data['metaContentEn'];
            $rooms->meta_descriptionAr = $data['metaContentAr'];
            $rooms->meta_descriptionRu = $data['metaContentRu'];
            $rooms->meta_keywords = $data['metaKey'];
            $rooms->meta_keyworsdEn = $data['metaKeyEn'];
            $rooms->meta_keyworsdAr = $data['metaKeyAr'];
            $rooms->meta_keyworsdRu = $data['metaKeyRu'];

            foreach ([
                'title', 'titleEn', 'titleRu', 'titleAr', 'content', 'contentEn', 'contentRu', 'contentAr',
                'shortContent', 'shortContentEn', 'shortContentRu', 'shortContentAr', 'url', 'urlEn', 'urlRu', 'urlAr'
            ] as $field) {
                $rooms->$field = $data[$field];
            }

            $rooms->save();

            // Kategorileri güncelle
            try {
                if ($id !== null) {
                    RoomsAndCategories::where('room_id', $rooms->id)->delete();
                }
                if ($request->filled('categories')) {
                    $selectedCategories = $request->input('categories');
                    foreach ($selectedCategories as $categoryId) {
                        RoomsAndCategories::create([
                            'room_id' => $rooms->id,
                            'categories_id' => $categoryId
                        ]);
                    }
                }
            } catch (\Exception $e) {
                return response()->json(['message' => 'An error occurred while saving categories.'], 500);
            }

            // Görselleri işleyin
            for ($i = 1; $i <= 12; $i++) {
                if (!empty($data["image{$i}"])) {
                    $urlParts = parse_url($data["image{$i}"]);
                    $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';

                    // Resim varsa ve yolu geçerliyse
                    if ($onlyPath) {
                        // Resmi kaydedin
                        $imagePath = $onlyPath;
                        // Veritabanına kaydedin
                        DB::table('images')->insert([
                            'room_id' => $rooms->id,
                            'image_id' => $i,
                            'image_path' => $imagePath,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }

            return redirect('/NPanel/products')->with('success_message', $message);
        }

        return view('admin.products.crud')->with(compact('pageTitle', 'rooms', 'allCategories', 'roomImages', 'selectedImage', 'selectedCategory'));
    }




    public function destroy($id)
    {
        // Delete
        Rooms::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Oda Silindi.');
    }

    public function imagesDestroy($id)
    {
        Images::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Resim Silindi.');
    }

    public function featuresIndex()
    {
        $features = RoomFeature::get()->toArray();
        $users = Admin::get()->toArray();
        return view('admin.products.features.index', compact('features', 'users'));
    }



    public function categoryIndex()
    {
        $categories = RoomCategories::get()->toArray();
        $users = Admin::get()->toArray();
        return view('admin.products.categories.index', compact('categories', 'users'));
    }
    public function categorySubcategories(Request $request, $id)
    {
        $categories = RoomCategories::where('subId', $id)->get()->toArray();
        $category = RoomCategories::find($id);
        $users = Admin::get()->toArray();

        return view('admin.products.categories.subcategories', compact('categories', 'category', 'users'));
    }

    public function categoryCrud(Request $request, $id = null)
    {
        $allCategories = RoomCategories::get()->toArray();
        $userId = Auth::guard('admin')->user()->id;
        if ($id == "") {
            $pageTitle = "Kategori Ekleme";
            $categories = new RoomCategories;
            $message = "Bilgiler Kayıt Edildi.";
            $categories->created_at = now();
            $categories->createUserId = $userId;
        } else {
            $pageTitle = "Kategori Düzeleme";
            $categories = RoomCategories::find($id);
            $message = "Bilgiler Güncellendi.";
            $categories->updated_at = now();
            $categories->updateUserId = $userId;
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'title' => 'required',
                'content' => 'required',
                'metaTitle' => 'required',
                'metaUrl' => 'required'
            ];
            $customMessages = [
                'title.require' => 'Başlık giriniz.',
                'content.require' => 'Açıklama giriniz.',
                'metaTitle.require' => 'Meta Başlık giriniz.',
                'metaUrl.require' => 'Meta Url giriniz.',

            ];
            $this->validate($request, $rules, $customMessages);

            if (isset($data['status']) && $data['status'] == 'on') {
                $categories->status = 1;
            } else {
                $categories->status = 0;
            }
            $categories->subId = $data['subPage'];
            $categories->orderNo = $data['orderNo'];

            foreach (['image', 'imageEn', 'imageRu', 'imageAr'] as $lang) {
                $urlParts = parse_url($data[$lang]);
                $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
                $categories->$lang = $onlyPath;
            }

            foreach ([
                'title', 'titleEn', 'titleRu', 'titleAr', 'content', 'contentEn', 'contentRu', 'contentAr',
            ] as $field) {
                $categories->$field = $data[$field];
            }
            $categories->url = $data['metaUrl'];
            $categories->urlEn = $data['metaUrlEn'];
            $categories->urlAr = $data['metaUrlAr'];
            $categories->urlRu = $data['metaUrlRu'];
            $categories->meta_title = $data['metaTitle'];
            $categories->meta_titleEn = $data['metaTitleEn'];
            $categories->meta_titleAr = $data['metaTitleAr'];
            $categories->meta_titleRu = $data['metaTitleRu'];
            $categories->meta_description = $data['metaContent'];
            $categories->meta_descriptionEn = $data['metaContentEn'];
            $categories->meta_descriptionAr = $data['metaContentAr'];
            $categories->meta_descriptionRu = $data['metaContentRu'];
            $categories->meta_keywords = $data['metaKey'];
            $categories->meta_keywordsEn = $data['metaKeyEn'];
            $categories->meta_keywordsAr = $data['metaKeyAr'];
            $categories->meta_keywordsRu = $data['metaKeyRu'];

            $categories->save();
            if (isset($data['subPage']) && $data['subPage'] > 0) {
                $redirectUrl = '/NPanel/products/categories/subcategories/' . $data['subPage'];
            } else {
                $redirectUrl = '/NPanel/products/categories';
            }

            return redirect($redirectUrl)->with('success_message', $message);
        }
        return view('admin.products.categories.crud')->with(compact('pageTitle', 'categories', 'allCategories'));
    }

    public function categoryDestroy($id)
    {
        RoomCategories::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Kategori Silindi.');
    }

}



