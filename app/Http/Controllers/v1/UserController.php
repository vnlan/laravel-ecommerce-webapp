<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Role;
use App\Models\v1\User;
use Illuminate\Http\Request;
use App\Traits\v1\StorageFileTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UserController extends Controller
{
    
    use StorageFileTrait;
    private $user;
    private $role;
    public function __construct()
    {
        $this->role = new Role;
        $this->user = new User; 
    }

    //My Info
    public function myInfo(){
        return view('v1.admin-views.pages.manage.my-info.index');
    }



    //employee
    public function empIndex()
    {
      $employees = $this->user->where('role_id', '>=', 2)->where('role_id', '<=', 4)->get();
      return view('v1.admin-views.pages.manage.employees.index',compact('employees'));
    }

    public function empCreate()
    {
        return view('v1.admin-views.pages.manage.employees.add');
    }
    public function empStore(Request $request)
    {
        try {
           
            $userMapping = [
                'display_name' => $request->name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'email' => $request->email,
                'password' => $request->password,
                'salary' => $request->salary_per_month,
                'active' => $request->active,
                'address' => $request->address,
                'phone' => $request->phone,
                'role_id' => $request->role_id,
            ];
            
    
            $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/employees/' . Str::Slug($request->name) . '/avatar');
            if (!empty($avatarImageUploaded)) {
                $userMapping['avatar_path'] = $avatarImageUploaded['file_path'];
                
            }
            
            $idCardFront = $this->storageFileUpload($request, 'id_card_front', 'v1/admin-page/images/employees/' . Str::Slug($request->name) . '/id-card/front');
            if (!empty($idCardFront)) {
                $userMapping['id_card_front'] = $idCardFront['file_path'];
                
            }
            
            $idCardBack = $this->storageFileUpload($request, 'id_card_back', 'v1/admin-page/images/employees/' . Str::Slug($request->name) . '/id-card/back');
            if (!empty($idCardBack)) {
                $userMapping['id_card_back'] = $idCardBack['file_path'];
                
            }
            $userCreated = $this->user->create($userMapping);
    
            return redirect()->route('employees.index')->with('success','Th??m m???i nh??n vi??n th??nh c??ng!');
            
          
          } catch (\Exception $e) {
                return redirect()->route('employees.index')->with('error','Th??m m???i nh??n vi??n th???t b???i! ???? x???y ra l???i');
          
            }
    }
    public function empEdit($id)
    {
        try{
            $employee = $this->user->find($id);
            return view('v1.admin-views.pages.manage.employees.edit',compact('employee'));
        }catch(\Exception $e){

        }
       
    }
    public function empUpdate(Request $request, $id)
    {
        try {
            $userOnUpdated = $this->user->find($id);


            $userMapping = [
                'display_name' => $request->name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                // 'email' => $request->email,
                // 'password' => $request->password,
                'salary' => $request->salary_per_month,
                'active' => $request->active,
                'address' => $request->address,
                'phone' => $request->phone,
                'role_id' => $request->role_id,
            ];

            $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/employees/' . Str::Slug($request->name) . '/avatar');
            if (!empty($avatarImageUploaded)) {
                $userMapping['avatar_path'] = $avatarImageUploaded['file_path'];
                
            }
            $idCardFront = $this->storageFileUpload($request, 'id_card_front', 'v1/admin-page/images/employees/' . Str::Slug($request->name) . '/id-card/front');
            if (!empty($idCardFront)) {
                $userMapping['id_card_front'] = $idCardFront['file_path'];
                
            }
            $idCardBack = $this->storageFileUpload($request, 'id_card_back', 'v1/admin-page/images/employees/' . Str::Slug($request->name) . '/id-card/back');
            if (!empty($idCardBack)) {
                $userMapping['id_card_back'] = $idCardBack['file_path'];
                
            }
            $userOnUpdated->update($userMapping);
            

            return redirect()->route('employees.index')->with('success','C???p nh???t nh??n vi??n th??nh c??ng!');
        } catch (\Exception $e) {
            return redirect()->route('employees.index')->with('error','C???p nh???t nh??n vi??n th???t b???i! C?? l???i x???y ra');
            
        }
    }
    public function empDelete($id)
    {
        try {
            //code...
            $userOnDeleted = $this->user->find($id);

            $userImagesDirectory = 'storage/v1/admin-page/images/employees/' . Str::slug($userOnDeleted->display_name); 
            
        
            if(File::exists($userImagesDirectory)){
                File::deleteDirectory(public_path($userImagesDirectory));
            }
           
            $userOnDeleted->delete();
           

            return redirect()->route('employees.index')->with('success', 'X??a nh??n vi??n th??nh c??ng!');
        } catch (\Exception $e) {
            //throw $th;
            return redirect()->route('employees.index')->with('error', 'X??a nh??n vi??n th???t b???i! ???? x???y ra l???i');
          
        }
     
    
    }


 //Customer


 public function customerIndex()
 {
     $customers = $this->user->where('role_id', '>=', 5)->where('role_id', '<=', 6)->get();
     return view('v1.admin-views.pages.manage.customers.index',compact('customers'));
 }

 public function customerCreate()
 {
     return view('v1.admin-views.pages.manage.customers.add');
 }
 public function customerStore(Request $request)
 {
     try {
        
         $userMapping = [
            'display_name' => $request->name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => $request->password,
           
            'active' => $request->active,
            'address' => $request->address,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'salary' => 0,
         ];
         
 
         $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/customers/' . Str::Slug($request->name) . '/avatar');
         if (!empty($avatarImageUploaded)) {
             $userMapping['avatar_path'] = $avatarImageUploaded['file_path'];
             
         }
         
         $idCardFront = $this->storageFileUpload($request, 'id_card_front', 'v1/admin-page/images/customers/' . Str::Slug($request->name) . '/id-card/front');
         if (!empty($idCardFront)) {
             $userMapping['id_card_front'] = $idCardFront['file_path'];
             
         }
         
         $idCardBack = $this->storageFileUpload($request, 'id_card_back', 'v1/admin-page/images/customers/' . Str::Slug($request->name) . '/id-card/back');
         if (!empty($idCardBack)) {
             $userMapping['id_card_back'] = $idCardBack['file_path'];
             
         }
         $userCreated = $this->user->create($userMapping);

         return redirect()->route('customers.index')->with('success','Th??m m???i Kh??ch h??ng th??nh c??ng!');
         
       
       } catch (\Exception $e) {
             return redirect()->route('customers.index')->with('error','Th??m m???i Kh??ch h??ng th???t b???i! ???? x???y ra l???i');
     
         }
   
 }

 public function customerEdit($id)
 {
     try{
         $customer = $this->user->find($id);
         return view('v1.admin-views.pages.manage.customers.edit',compact('customer'));
     }catch(\Exception $e){

     }
 }

 public function customerUpdate(Request $request, $id)
 {
     try {
         $userOnUpdated = $this->user->find($id);


         $userMapping = [
            'display_name' => $request->name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            // 'email' => $request->email,
            // 'password' => $request->password,
           
            'active' => $request->active,
            'address' => $request->address,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'salary' => 0,
         ];

         $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/customers/' . Str::Slug($request->name) . '/avatar');
         if (!empty($avatarImageUploaded)) {
             $userMapping['avatar_path'] = $avatarImageUploaded['file_path'];
             
         }
         $idCardFront = $this->storageFileUpload($request, 'id_card_front', 'v1/admin-page/images/customers/' . Str::Slug($request->name) . '/id-card/front');
         if (!empty($idCardFront)) {
             $userMapping['id_card_front'] = $idCardFront['file_path'];
             
         }
         $idCardBack = $this->storageFileUpload($request, 'id_card_back', 'v1/admin-page/images/customers/' . Str::Slug($request->name) . '/id-card/back');
         if (!empty($idCardBack)) {
             $userMapping['id_card_back'] = $idCardBack['file_path'];
             
         }
         $userOnUpdated->update($userMapping);
   
         return redirect()->route('customers.index')->with('success','C???p nh???t ngh??? s?? th??nh c??ng!');
     } catch (\Exception $e) {
         return redirect()->route('customers.index')->with('error','C???p nh???t ngh??? s?? th???t b???i! C?? l???i x???y ra');
        
     }

 }
 public function customerDelete($id)
 {
     try {
         //code...
         $userOnDeleted = $this->user->find($id);

         $userImagesDirectory = 'storage/v1/admin-page/images/customers/' . Str::slug($userOnDeleted->display_name); 
         
     
         if(File::exists($userImagesDirectory)){
             File::deleteDirectory(public_path($userImagesDirectory));
         }
       
         $userOnDeleted->delete();
         return redirect()->route('customers.index')->with('success', 'X??a kh??ch h??ng th??nh c??ng!');
     } catch (\Exception $e) {
   
         return redirect()->route('customers.index')->with('error', 'X??a kh??ch h??ng th???t b???i! ???? x???y ra l???i');
         
     }
 }

}
