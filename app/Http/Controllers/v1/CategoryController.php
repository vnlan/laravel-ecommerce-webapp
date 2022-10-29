<?php

namespace App\Http\Controllers\v1;


use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\v1\Category;
use App\Traits\v1\StorageFileTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use StorageFileTrait;
    private $category;

    public function __construct()
    {
        $this->category = new Category; 
       
        
    }
    public function index()
    {
        $categories = $this->category->all();
        return view('v1.admin-views.pages.manage.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('v1.admin-views.pages.manage.categories.add');
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
           
            $categoryMapping = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            
    
            $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/categories/' . Str::Slug($request->name) . '/avatar');
            if (!empty($avatarImageUploaded)) {
                $categoryMapping['avatar_path'] = $avatarImageUploaded['file_path'];
                
            }
            $categoryCreated = $this->category->create($categoryMapping);
            return redirect()->route('categories.index')->with('success','Thêm mới danh mục thành công!');
            
          
          } catch (\Exception $e) {
          
              return redirect()->route('categories.index')->with('error','Thêm mới danh mục thất bại. Đã xảy ra lỗi!');
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
            //code...
            $category = $this->category->find($id);
            return view('v1.admin-views.pages.manage.categories.edit',compact('category'));
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error','Không tìm thấy danh mục');
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
            $categoryOnUpdated = $this->category->find($id);

            $categoryAvatarDirectory = 'storage/v1/admin-page/images/categories/' . Str::slug($categoryOnUpdated->name) .'/avatar'; 
            
        
            if(File::exists($categoryAvatarDirectory)){
                File::deleteDirectory(public_path($categoryAvatarDirectory));
            }
            
            $categoryMapping = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/categories/' . Str::slug($request->name) . '/avatar');
            if (!empty($avatarImageUploaded)) {
                $categoryMapping['avatar_path'] = $avatarImageUploaded['file_path'];
            }else{
                $categoryMapping['avatar_path'] = null;
            }
            $categoryOnUpdated->update($categoryMapping);
    
            return redirect()->route('categories.index')->with('success','Cập nhật danh mục thành công!');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error','Cập nhật danh mục thất bại! Có lỗi xảy ra');
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
        //
        try {
            //code...
            $categoryOnDeleted = $this->category->find($id);

            $categoryAvatarDirectory = 'storage/v1/admin-page/images/categories/' . Str::slug($categoryOnDeleted->name) . '/avatar'; 
            
        
            if(File::exists($categoryAvatarDirectory)){
                File::deleteDirectory(public_path($categoryAvatarDirectory));
            }
            $categoryOnDeleted->delete();
            return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công!');
        } catch (\Exception $e) {
            //throw $th;
            return redirect()->route('categories.index')->with('error', 'Xóa danh mục thất bại! Đã xảy ra lỗi');
        }
     
    }
}
