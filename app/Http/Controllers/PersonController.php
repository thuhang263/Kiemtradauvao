<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequests;
use App\Http\Requests\PersonRequests;
use App\Http\Services\Country\CountryService;
use App\Http\Services\person\PersonService;
use App\Models\Country;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    protected $personService;
    public function __construct(PersonService $personService)
    {
        $this ->personService = $personService;
    }
    public function index()
    {
        return view('admin.person.list',[
            'title' => 'Danh sách mới nhất ',
            'people' =>$this -> personService ->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = $this->personService->getUser();
        $companies = $this->personService->getCompany();

        return view('admin.person.add',[
            'title' => 'Thêm mới',
            'users' => $users,
            'companies' => $companies,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequests $request)
    {
        $this ->personService ->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        $user = $this->personService->getUser();
        $company = $this->personService->getCompany();

        return view('admin.person.edit',[
            'title' => 'Chỉnh sửa nhân viên : ' .$person->full_name,
            'person' => $person,
            'users' => $user,
            'companies' => $company,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Person $person,PersonRequests $request)
    {
        $this->personService->update($request,$person);
        return redirect('/people/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this ->personService->destroy($request);
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
