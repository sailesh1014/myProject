<?php
declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

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
        $settings = Setting::all();
        DB::transaction(function () use ($request, $settings) {

            Setting::upsert([
                [
                    'key'        => 'app_name',
                    'name'       => $request->input('app_name') ?? null,
                    'updated_at' => now(),
                ],
                [
                    'key'        => 'admin_email',
                    'name'       => $request->input('admin_email') ?? null,
                    'updated_at' => now(),
                ],
                [
                    'key'        => 'company_address',
                    'name'       => $request->input('company_address') ?? null,
                    'updated_at' => now(),
                ],

            ], ['key'], ['name', 'updated_at']);

            Setting::updateCachedSettingsData();

        });

        return redirect()->back()->with('alert.success', 'Setting Successfully Updated !!');

    }


    public function edit(Setting $setting)
    {

        return view('dashboard.settings.edit', compact('setting'));
    }


    public function update(SettingRequest $request, Setting $setting)
    {
        $setting->app_name = $request->input('app_name');
        $setting->admin_email = $request->input('admin_email');
        $setting->company_address = $request->input('company_address');
        $setting->save();

        Setting::updateCachedSettingsData();

        return redirect()->route('settings.index')->with('alert.success', 'Setting Successfully Updated !!');
    }
}
