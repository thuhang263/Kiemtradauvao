<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequests;
use App\Http\Services\user\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService;
    public function __construct(UserService $userService)
    {
        $this ->userService = $userService;
    }
    public function index()
    {
        return view('admin.user.list',[
            'title' => 'Danh sách tài khoản mới nhất ',
            'users' =>$this -> userService ->getAll()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->userService->getRole();
        return view('admin.user.add',[
            'title' => 'Thêm tài khoản mới',
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequests $request)
    {
        $this ->userService ->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $roles = $this->userService->getRole();
        return view('admin.user.edit',[
            'title' => 'Chỉnh sửa tài khoản',
            'user' => $user,
            'roles' => $roles,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(User $user,UserRequests $request)
    {
        $this->userService->update($request,$user);
        return redirect('/users/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this ->userService->destroy($request);
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
