<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Blog;
use Illuminate\Http\Request;
use App\Traits\v1\StorageFileTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use StorageFileTrait;
    private $blog;

    public function __construct()
    {
        $this->blog = new Blog; 
    }
    public function index()
    {
        $blogs = $this->blog->all();
        return view('v1.admin-views.pages.manage.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.admin-views.pages.manage.blogs.add');
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
           
            $blogMapping = [
                'blog_category' => $request->blog_category,
                'title' => $request->title,
                'short_description' => $request->short_description,
                'content'  => $request->content,
                'employee_id' => Auth::user()->id,
            ];
            
    
            $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/blogs/' . Str::Slug($request->title) . '/avatar');
            if (!empty($avatarImageUploaded)) {
                $blogMapping['avatar_path'] = $avatarImageUploaded['file_path'];
                
            }
            $blogCreated = $this->blog->create($blogMapping);
            return redirect()->route('blogs.index')->with('success','Thêm mới blog thành công!');
            
          
          } catch (\Exception $e) {
          
              return redirect()->route('blogs.index')->with('error','Thêm mới blog thất bại. Đã xảy ra lỗi!');
           
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
        try {
            //code...
            $blog = $this->blog->find($id);
            return view('v1.admin-views.pages.manage.blogs.edit',compact('blog'));
        } catch (\Exception $e) {
            return redirect()->route('blogs.index')->with('error','Không tìm thấy blog');
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
        try {
            $blogOnUpdated = $this->blog->find($id);

            
            $blogMapping = [
                'blog_category' => $request->blog_category,
                'title' => $request->title,
                'short_description' => $request->short_description,
                'content'  => $request->content,
                'employee_id' => Auth::user()->id,
            ];
            $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/blogs/' . Str::slug($request->title) . '/avatar');
            if (!empty($avatarImageUploaded)) {
                $blogMapping['avatar_path'] = $avatarImageUploaded['file_path'];
            }
            $blogOnUpdated->update($blogMapping);
    
            return redirect()->route('blogs.index')->with('success','Cập nhật danh mục thành công!');
        } catch (\Exception $e) {
            return redirect()->route('blogs.index')->with('error','Cập nhật danh mục thất bại! Có lỗi xảy ra');
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
            $blogOnDeleted = $this->blog->find($id);

            $blogAvatarDirectory = 'storage/v1/admin-page/images/blogs/' . Str::slug($blogOnDeleted->title) . '/avatar'; 
            
        
            if(File::exists($blogAvatarDirectory)){
                File::deleteDirectory(public_path($blogAvatarDirectory));
            }
            $blogOnDeleted->delete();
            return redirect()->route('blogs.index')->with('success', 'Xóa blogs thành công!');
        } catch (\Exception $e) {
            
            return redirect()->route('blogs.index')->with('error', 'Xóa blogs thất bại! Đã xảy ra lỗi');
        }
     
    }
}
