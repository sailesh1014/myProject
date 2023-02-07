<?php

namespace App\Http\Controllers\Dashboard;

use App\Constants\UserRole;
use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */


    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $settings = Setting::all();
        return view('dashboard.settings.create', compact('settings'));
    }

    public function store(SettingRequest $request)
    {
        $settings = Setting::all();
        DB::transaction(function () use ($request, $settings) {

            Setting::upsert([
                [
                    'key' => 'app_name',
                    'name' => $request->input('app_name') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key' => 'admin_email',
                    'name' => $request->input('admin_email') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key' => 'company_address',
                    'name' => $request->input('company_address') ?? null,
                    'updated_at' => now()
                ],

            ], ['key'], ['name', 'updated_at']);

            //updating settings cached value
            Setting::updateCachedSettingsData();

        });

        return redirect()->back()->with('alert.success', 'Setting Successfully Updated !!');

    }


    /**
     * Show the form for editing the specified resource.
     * @param Setting $setting
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Setting $setting)
    {

        return view('dashboard.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     * @param SettingRequest $request
     * @param Setting $setting
     * @return \Illuminate\Http\RedirectResponse
     */
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
