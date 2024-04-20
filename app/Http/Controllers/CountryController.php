<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequests;
use App\Http\Services\Country\CountryService;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    protected $countryService;
    public function __construct(CountryService $countryService)
    {
        $this ->countryService = $countryService;
    }
    public function index()
    {
        return view('admin.country.list',[
            'title' => 'Danh sách mới nhất ',
            'countries' =>$this -> countryService ->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.add',[
            'title' => 'Thêm Quốc gia mới',
            'countries' => $this ->countryService->getAll()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequests $request)
    {
        $this ->countryService ->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return view('admin.country.edit',[
            'title' => 'Chỉnh sửa Quốc gia : ' .$country->name,
            'country' => $country,
            'countries' =>$this -> countryService ->getAll()
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Country $country,CountryRequests $request)
    {
        $this->countryService->update($request,$country);
        return redirect('/countries/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this ->countryService->destroy($request);
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
