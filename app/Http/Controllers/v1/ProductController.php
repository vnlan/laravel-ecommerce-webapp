<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Category;
use Illuminate\Http\Request;
use App\Models\v1\Product;
use App\Models\v1\ProductCompany;
use App\Models\v1\ProductImage;
use App\Traits\v1\StorageFileTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $product;
    private $productCompany;
    private $category;
    private $productImage;
    use StorageFileTrait;


    public function __construct()
    {
        $this->product = new Product; 
        $this->productCompany = new ProductCompany;
        $this->category = new Category; 
        $this->productImage = new ProductImage;
    }
    public function index()
    {
        //
        $products = $this->product->all();
      
        return view('v1.admin-views.pages.manage.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productCompanies = $this->productCompany->all();
        $categories = $this->category->all();
        return view('v1.admin-views.pages.manage.products.add',compact('productCompanies','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        try{
            DB::beginTransaction();
            $productMapping = [
                'sku' => $request->sku,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'product_company_id' => $request->product_company_id,
                'short_description' => $request->short_description,
                'long_description'=> $request->long_description,
            ];
            $featureImageUploaded = $this->storageFileUpload($request, 'feature_image_path', 'v1/admin-page/images/products/' . Str::slug($request->name) . '/feature');
            
            if (!empty($avatarImageUploaded)) {
                $productMapping['feature_image_path'] = $featureImageUploaded['file_path'];
            }else{
                $productMapping['feature_image_path'] = null;
            }
          
            $productCreated = $this->product->create($productMapping);
            $productCreated->categories()->attach($request->category_id);
            //Add detail images for product
            if($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItems ) {
                    $productDetailImage = $this->storageMultipleFileUpload($fileItems, 'v1/admin-page/images/products/' . Str::slug($request->name) . '/detail');
                    $productCreated->images()->create([
                        'image_path' => $productDetailImage['file_path'],
                    ]);
                }
            }
           
            DB::commit();
            return redirect()->route('products.index')->with('success','Thêm mới sản phẩm thành công!');
        }catch(\Exception $exception){
            DB::rollBack();
            return redirect()->route('products.index')->with('error','Thêm mới sản phẩm thất bại! Đã xảy ra lỗi');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = $this->product->find($id); 
        $productCompanies = $this->productCompany->all();
        $categories = $this->category->all();


        // $categorySelected = $this->product->categories;
        // dd($categorySelected);
        return view('v1.admin-views.pages.manage.products.edit',compact('productCompanies','categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        try{
            DB::beginTransaction();
            $productMapping = [
                'sku' => $request->sku,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'product_company_id' => $request->product_company_id,
                'short_description' => $request->short_description,
                'long_description'=> $request->long_description,
            ];
            $featureImageUploaded = $this->storageFileUpload($request, 'feature_image_path', 'v1/admin-page/images/products/' . Str::slug($request->name) . '/feature');
            if(!empty($featureImageUploaded)){
                $productMapping['feature_image_path'] = $featureImageUploaded['file_path'];
              
            }
            $this->product->find($id)->update($productMapping);
            
            $productUpdated = $this->product->find($id);
            $productUpdated->categories()->sync($request->category_id);
            //Add detail images for product 
            if($request->hasFile('image_path')){
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItems ) {
                    $productDetailImage = $this->storageMultipleFileUpload($fileItems, 'v1/admin-page/images/products/' . Str::slug($request->name) . '/detail');
                    $productUpdated->images()->create([
                        'image_path' => $productDetailImage['file_path'],
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('products.index')->with('success','Cập nhật sản phẩm thành công!');
        }catch(\Exception $exception){
            DB::rollBack();
            return redirect()->route('products.index')->with('error','Cập nhật sản phẩm thất bại! Đã xảy ra lỗi');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $productOnDelete = $this->product->find($id);
            $productImagesDirectory = 'storage/v1/admin-page/images/products/' . Str::slug($productOnDelete->name); 
           
            if(File::exists($productImagesDirectory)){
                File::deleteDirectory(public_path($productImagesDirectory));
            }
            $productOnDelete->images()->delete();
            $productOnDelete->delete();
            
            return redirect()->route('products.index')->with('success','Xóa sản phẩm thành công!');
        } catch (\Exception $exception) {
            return redirect()->route('products.index')->with('error','Xóa sản phẩm thất bại! Đã xảy ra lỗi!');
        }
    }
}
