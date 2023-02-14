<?php
declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Services\SettingService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller {

    public function __construct(protected SettingService $settingService) {}

    public function index(): View
    {
        $settings = $this->settingService->getAllSettings();
        return view('dashboard.settings.create', compact('settings'));
    }

    public function store(SettingRequest $request)
    {
        $input = $request->only([...Setting::SETTINGS_FIELD]);
        $this->settingService->updateSettings($input);

        return redirect()->back()->with('toast.success', 'Setting Successfully Updated !!');

    }

}
