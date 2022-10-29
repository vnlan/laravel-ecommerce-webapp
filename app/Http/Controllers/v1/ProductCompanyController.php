<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\v1\ProductCompany;
use App\Traits\v1\StorageFileTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class ProductCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use StorageFileTrait;
    private $productCompany;


    public function __construct()
    {
        $this->productCompany = new ProductCompany; 
       
        
    }
    public function index()
    {
        //
        $productCompanies = $this->productCompany->all();
        return view('v1.admin-views.pages.manage.product-companies.index',compact('productCompanies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('v1.admin-views.pages.manage.product-companies.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
           
            $productCompanyMapping = [
                'company_name' => $request->company_name,
                'company_short_name' => $request->company_short_name,
                'description' => $request->description,
            ];
            
    
            $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/product-companies/' . Str::slug($request->company_short_name) . '/avatar');
            if (!empty($avatarImageUploaded)) {
                $productCompanyMapping['avatar_path'] = $avatarImageUploaded['file_path'];
                
            }
            $productCompanyCreated = $this->productCompany->create($productCompanyMapping);
            return redirect()->route('product-companies.index')->with('success','Thêm mới Hãng sản xuất thành công!');
            
          
          } catch (\Exception $e) {
              return redirect()->route('product-companies.index')->with('error','Thêm mới Hãng sản xuất thất bại. Đã xảy ra lỗi!');
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
        try {
            $productCompany = $this->productCompany->find($id);
            return view('v1.admin-views.pages.manage.product-companies.edit',compact('productCompany'));
        } catch (\Exception $e) {
            return redirect()->route('product-companies.index')->with('error','Không tìm thấy hãng sản xuất!');
        }
      
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
        try {
            $productCompanyOnUpdated = $this->productCompany->find($id);

            $productCompanyAvatarDirectory = 'storage/v1/admin-page/images/product-companies/' . Str::slug($productCompanyOnUpdated->company_short_name) .'/avatar'; 
            
     
            if(File::exists($productCompanyAvatarDirectory)){
                File::deleteDirectory(public_path($productCompanyAvatarDirectory));
            }
            
            $productCompanyMapping = [
                'company_name' => $request->company_name,
                'company_short_name' => $request->company_short_name,
                'description' => $request->description,
            ];
            $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/product-companies/' . Str::slug($request->company_short_name) . '/avatar');
            if (!empty($avatarImageUploaded)) {
                $productCompanyMapping['avatar_path'] = $avatarImageUploaded['file_path'];
            }else{
                $productCompanyMapping['avatar_path'] = null;
            }
            $productCompanyOnUpdated->update($productCompanyMapping);
    
            return redirect()->route('product-companies.index')->with('success','Cập nhật Hãng sản xuất thành công!');
        } catch (\Exception $e) {
            return redirect()->route('product-companies.index')->with('error','Cập nhật Hãng sản xuất thất bại! Có lỗi xảy ra');
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
            //code...
            $productCompanyOnDeleted = $this->productCompany->find($id);

            $productCompanyDirectory = 'storage/v1/admin-page/images/product-companies/' . Str::slug($productCompanyOnDeleted->company_name) . '/avatar'; 
            
        
            if(File::exists($productCompanyDirectory)){
                File::deleteDirectory(public_path($productCompanyDirectory));
            }
            $productCompanyOnDeleted->delete();
            return redirect()->route('product-companies.index')->with('success', 'Xóa Hãng sản xuất thành công!');
        } catch (\Exception $e) {
            //throw $th;
            return redirect()->route('categories.index')->with('error', 'Xóa Hãng sản xuất thất bại! Đã xảy ra lỗi');
        }
    }
}
