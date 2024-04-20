<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequests;
use App\Http\Requests\RoleRequests;

use App\Http\Services\role\RoleServices;
use App\Models\Country;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;
    public function __construct(RoleServices $roleService)
    {
        $this ->roleService = $roleService;
    }
    public function index()
    {
        return view('admin.role.list',[
            'title' => 'Danh sách mới nhất ',
            'roles' =>$this -> roleService ->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.add',[
            'title' => 'Thêm Quốc gia mới',
            'roles' => $this ->roleService->getAll()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequests $request)
    {
        $this ->roleService ->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.role.edit',[
            'title' => 'Chỉnh sửa  : ' ,
            'role' => $role,
            'roles' =>$this -> roleService ->getAll()
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Country $country,CountryRequests $request)
    {
        $this->roleService->update($request,$country);
        return redirect('/roles/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this ->roleService->destroy($request);
        if($result){
            return response() -> json([
                'error' => false,
                'message'=>'Xóa thành công'
            ]);
        }
        return response() -> json([
            'error' => true
        ]);
    }
}
