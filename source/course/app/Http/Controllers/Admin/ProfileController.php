<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RenewPasswordRequest;
use App\Services\AlertService;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends BaseAdminController
{

    private $__user;
    private $__alertService;

    public function __construct(User $user, AlertService $alertService)
    {
        $this->user         = $user;
        $this->alertService = $alertService;
    }

    public function index(Request $request)
    {
        $auth = \Auth::guard('admin')->user();
        return view('admin.profile.index', [
            'profile' => $auth,
        ]);
    }

    public function renewPassword(RenewPasswordRequest $request)
    {
        try {
            $auth       = \Auth::guard('admin')->user();
            $detailUser = $this->user->where('id', $auth->id)->first();
            $detailUser->update([
                'password' => bcrypt($request->new_password)
            ]);
            $this->alertService->saveSessionSuccess('Change password successfully');
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());
            $this->alertService->saveSessionDanger('Change password unsuccessfully');
        }
        return redirect(route('admin.profile.index'));
    }
}
