<?php
namespace App\Http\Controllers;
use App\Http\Requests\CompanyRequests;
use App\Http\Services\company\CompanyService;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyService;
    public function __construct(CompanyService $companyService)
    {
        $this ->companyService = $companyService;
    }
    public function index()
    {
        return view('admin.company.list',[
            'title' => 'Danh sách mới nhất ',
            'companies' =>$this -> companyService ->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.add',[
            'title' => 'Thêm công ty mới',
            'companies' => $this ->companyService->getAll()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequests $request)
    {
        $this ->companyService ->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('admin.company.edit',[
            'title' => 'Chỉnh sửa thông tin : ' .$company->name,
            'company' => $company,
            'companies' =>$this -> companyService ->getAll()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Company $company,CompanyRequests $request)
    {
        $this->companyService->update($request,$company);
        return redirect('/companies/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this ->companyService->destroy($request);
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
