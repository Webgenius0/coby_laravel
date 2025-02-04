<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SftpSettingController extends Controller {
    /**
     * Display mail settings page.
     *
     * @return View
     */
    public function index(): View {
        $settings = [
            'sftp_host' => env('SFTP_HOST', ''),
            'sftp_port' => env('SFTP_PORT', ''),
            'sftp_user' => env('SFTP_USER', ''),
            'sftp_pass' => env('SFTP_PASS', ''),
            'sftp_path' => env('SFTP_PATH', ''),
        ];

        return view('backend.layouts.settings.sftp_settings', compact('settings'));
    }

    /**
     * Update mail settings.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse {
        $request->validate([
            'sftp_host'            => 'nullable|string',
            'sftp_port'            => 'nullable|string',
            'sftp_user'            => 'nullable|string',
            'sftp_pass'            => 'nullable|string',
            'sftp_path'            => 'nullable|string',
        ]);

        try {
            $envContent = File::get(base_path('.env'));
            $lineBreak  = "\n";
            $envContent = preg_replace([
                '/SFTP_HOST=(.*)\s*/',
                '/SFTP_PORT=(.*)\s*/',
                '/SFTP_USER=(.*)\s*/',
                '/SFTP_PASS=(.*)\s*/',
                '/SFTP_PATH=(.*)\s*/',
            ], [
                'SFTP_HOST=' . $request->sftp_host . $lineBreak,
                'SFTP_PORT=' . $request->sftp_port . $lineBreak,
                'SFTP_USER=' . $request->sftp_user . $lineBreak,
                'SFTP_PASS=' . $request->sftp_pass . $lineBreak,
                'SFTP_PATH=' . $request->sftp_path . $lineBreak,
            ], $envContent);

            File::put(base_path('.env'), $envContent);

            return back()->with('t-success', 'Updated successfully');
        } catch (Exception) {
            return back()->with('t-error', 'Failed to update');
        }
    }
}
