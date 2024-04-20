<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\role_user\RoleUserService;

class RoleUserController extends Controller
{
    protected $roleUserService;

    // Khởi tạo RoleUserService
    public function __construct(RoleUserService $roleUserService)
    {
        $this->roleUserService = $roleUserService;
    }

    // Lưu trữ vai trò người dùng
    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        $roleId = $request->input('role_id');

        if ($this->roleUserService->create($userId, $roleId)) {
            return redirect()->back()->with('success', 'Vai trò đã được gán thành công');
        }

        return redirect()->back()->with('error', 'Gán vai trò thất bại');
    }

    // Cập nhật vai trò người dùng
    public function update(Request $request, $userId)
    {
        $roleId = $request->input('role_id');

        if ($this->roleUserService->update($userId, $roleId)) {
            return redirect()->back()->with('success', 'Vai trò đã được cập nhật thành công');
        }

        return redirect()->back()->with('error', 'Cập nhật vai trò thất bại');
    }

    // Xóa vai trò người dùng
    public function destroy($userId, $roleId)
    {
        if ($this->roleUserService->delete($userId, $roleId)) {
            return redirect()->back()->with('success', 'Vai trò đã được xóa thành công');
        }

        return redirect()->back()->with('error', 'Xóa vai trò thất bại');
    }
}
