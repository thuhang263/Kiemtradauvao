<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProjectRequests;

use App\Http\Services\project\ProjectService;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectService;
    public function __construct(ProjectService $projectService)
    {
        $this ->projectService = $projectService;
    }
    public function index()
    {
        return view('admin.project.list',[
            'title' => 'Danh sách mới nhất ',
            'project' =>$this -> projectService ->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = $this->projectService->getCompany();

        return view('admin.person.add',[
            'title' => 'Thêm mới',
            'companies' => $companies,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequests $request)
    {
        $this ->projectService ->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $company = $this->projectService->getCompany();

        return view('admin.project.edit',[
            'title' => 'Chỉnh sửa nhân viên : ' .$project->full_name,
            'project' => $project,
            'companies' => $company,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Project $project,ProjectRequests $request)
    {
        $this->projectService->update($request,$project);
        return redirect('/project/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this ->projectService->destroy($request);
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
