<?php
declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Constants\UserRole;
use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Services\SettingService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SettingController extends Controller {

    public function __construct(protected SettingService $settingService){
        $this->middleware("isAdmin:".UserRole::SUPER_ADMIN);
    }

    public function index(): View
    {
        $settings = $this->settingService->getAllSettings();
        return view('dashboard.settings.create', compact('settings'));
    }

    public function store(SettingRequest $request): RedirectResponse
    {
        $input = $request->only([...Setting::SETTINGS_FIELD]);
        $this->settingService->updateSettings($input);
        return redirect()->back()->with('toast.success', 'Setting Successfully Updated !!');
    }

}
