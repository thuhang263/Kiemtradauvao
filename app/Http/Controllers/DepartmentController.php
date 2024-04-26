<?php

namespace App\Http\Controllers;


use App\Http\Requests\DepartmentRequests;
use App\Http\Services\department\DepartmentService;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;
    public function __construct(DepartmentService $departmentService)
    {
        $this ->departmentService = $departmentService;
    }
    public function index()
    {
        return view('admin.department.list',[
            'title' => 'Danh sách mới nhất ',
            'departments' =>$this -> departmentService ->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = $this->departmentService->getCompany();
        $departments = $this->departmentService->getCompany();
        return view('admin.department.add',[
            'title' => 'Thêm mới',
            'departments'=>$departments,
            'companies' => $companies,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequests $request)
    {
        $this ->departmentService ->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        $company = $this->departmentService->getCompany();
        return view('admin.department.edit',[
            'title' => 'Chỉnh sửa phòng ban : ' .$department->name,
            'departments' =>$this -> departmentService ->getParent(),
            'companies' => $company,
            'department' => $department,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Department $department,DepartmentRequests $request)
    {
        $this->departmentService->update($request,$department);
        return redirect('/departments/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this ->departmentService->destroy($request);
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
