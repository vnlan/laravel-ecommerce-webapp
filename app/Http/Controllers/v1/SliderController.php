<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Slider;
use Illuminate\Http\Request;
use App\Traits\v1\StorageFileTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use StorageFileTrait;
    private $slider;

    public function __construct()
    {
        $this->slider = new Slider; 
    }
    public function index()
    {
        $sliders = $this->slider->all();
        return view('v1.admin-views.pages.manage.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.admin-views.pages.manage.sliders.add');
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
           
            $sliderMapping = [
                'title' => $request->title,
                'short_description' => $request->short_description,
                'link' => $request->link,
                'employee_id' => Auth::user()->id,
            ];
            
    
            $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/sliders/' . Str::Slug($request->title) . '/avatar');
            if (!empty($avatarImageUploaded)) {
                $sliderMapping['avatar_path'] = $avatarImageUploaded['file_path'];
                
            }
            $sliderCreated = $this->slider->create($sliderMapping);
            return redirect()->route('sliders.index')->with('success','Thêm mới slider thành công!');
            
          
          } catch (\Exception $e) {
          
              return redirect()->route('sliders.index')->with('error','Thêm mới slider thất bại. Đã xảy ra lỗi!');
           
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
            $slider = $this->slider->find($id);
            return view('v1.admin-views.pages.manage.sliders.edit',compact('slider'));
        } catch (\Exception $e) {
            return redirect()->route('sliders.index')->with('error','Không tìm thấy slider');
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
            $sliderOnUpdated = $this->slider->find($id);

            
            $sliderMapping = [
                'title' => $request->title,
                'short_description' => $request->short_description,
                'link' => $request->link,
                'employee_id' => Auth::user()->id,
            ];
            $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/sliders/' . Str::slug($request->title) . '/avatar');
            if (!empty($avatarImageUploaded)) {
                $sliderMapping['avatar_path'] = $avatarImageUploaded['file_path'];
            }
            $sliderOnUpdated->update($sliderMapping);
    
            return redirect()->route('sliders.index')->with('success','Cập nhật danh mục thành công!');
        } catch (\Exception $e) {
            return redirect()->route('sliders.index')->with('error','Cập nhật danh mục thất bại! Có lỗi xảy ra');
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
            $sliderOnDeleted = $this->slider->find($id);

            $sliderAvatarDirectory = 'storage/v1/admin-page/images/sliders/' . Str::slug($sliderOnDeleted->title) . '/avatar'; 
            
        
            if(File::exists($sliderAvatarDirectory)){
                File::deleteDirectory(public_path($sliderAvatarDirectory));
            }
            $sliderOnDeleted->delete();
            return redirect()->route('sliders.index')->with('success', 'Xóa sliders thành công!');
        } catch (\Exception $e) {
            
            return redirect()->route('sliders.index')->with('error', 'Xóa sliders thất bại! Đã xảy ra lỗi');
        }
     
    }
}
