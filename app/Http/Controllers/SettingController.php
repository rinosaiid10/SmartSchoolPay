<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\ChatFile;
use App\Models\Settings;
use App\Models\ChatMessage;
use App\Models\LeaveMaster;
use App\Models\SessionYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    public function index()
    {
        if (!Auth::user()->can('setting-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }

        $settings = getSettings();
        $getDateFormat = getDateFormat();
        $getTimezoneList = getTimezoneList();
        $getTimeFormat = getTimeFormat();

        $session_year = SessionYear::orderBy('id', 'desc')->get();
        // $language = Language::select('id', 'name')->orderBy('id', 'desc')->get();
        return view('settings.index', compact('settings', 'getDateFormat', 'getTimezoneList', 'getTimeFormat', 'session_year'));
    }

    public function update(Request $request)
    {
        if (!Auth::user()->can('setting-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $request->validate([
            'school_name' => 'required|max:255',
            'school_email' => 'required|email',
            'school_phone' => 'required',
            'school_address' => 'required',
            'time_zone' => 'required',
            'theme_color' => 'required',
            'secondary_color' => 'required',
            'session_year' => 'required',
            'school_tagline' => 'required',
            'online_payment' => 'required|in:0,1',
            'facebook' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
            'maplink' => 'required',
            'recaptcha_site_key' => 'nullable',
            'recaptcha_secret_key' => 'nullable',
            'recaptcha_status' => 'required'
        ]);

        $settings = [
            'school_name', 'school_email', 'school_phone', 'school_address', 'time_zone', 'date_formate', 'time_formate', 'theme_color', 'session_year', 'school_tagline' ,'online_payment','secondary_color' ,'facebook' ,'instagram' ,'linkedin', 'maplink','recaptcha_site_key', 'recaptcha_secret_key', 'recaptcha_status'
        ];
        try {
            foreach ($settings as $row) {
                if (Settings::where('type', $row)->exists()) {
                    if ($row == 'session_year') {
                        $get_id = Settings::select('message')->where('type', 'session_year')->pluck('message')->first();

                        $old_year = SessionYear::find($get_id);
                        $old_year->default = 0;
                        $old_year->save();

                        $session_year = SessionYear::find($request->$row);
                        $session_year->default = 1;
                        $session_year->save();
                    }

                    // removing the double unnecessary double quotes in school name
                    if ($row == 'school_name') {
                        $data = [
                            'message' => str_replace('"', '', $request->$row)
                        ];
                    }else{
                        $data = [
                            'message' => $request->$row
                        ];
                    }
                    Settings::where('type', $row)->update($data);
                } else {
                    $setting = new Settings();
                    $setting->type = $row;
                    $setting->message = $row == 'school_name' ? str_replace('"', '', $request->$row) : $request->$row;
                    $setting->save();
                }
            }

            // for online payment data
            if (Settings::where('type', 'online_payment')->exists()) {
                $data = [
                    'message' => $request->online_payment
                ];
                Settings::where('type', 'online_payment')->update($data);
            } else {
                $setting = new Settings();
                $setting->type = 'online_payment';
                $setting->message = $request->online_payment;
                $setting->save();
            }
            // end of online payment data

            if ($request->hasFile('logo1')) {
                if (Settings::where('type', 'logo1')->exists()) {
                    $get_id = Settings::select('message')->where('type', 'logo1')->pluck('message')->first();
                    if (Storage::disk('public')->exists($get_id)) {
                        Storage::disk('public')->delete($get_id);
                    }
                    $data = [
                        'message' => $request->file('logo1')->store('logo', 'public')
                    ];
                    Settings::where('type', 'logo1')->update($data);
                } else {
                    $setting = new Settings();
                    $setting->type = 'logo1';
                    $setting->message = $request->file('logo1')->store('logo', 'public');
                    $setting->save();
                }
            }
            if ($request->hasFile('logo2')) {
                if (Settings::where('type', 'logo2')->exists()) {
                    $get_id = Settings::select('message')->where('type', 'logo2')->pluck('message')->first();
                    if (Storage::disk('public')->exists($get_id)) {
                        Storage::disk('public')->delete($get_id);
                    }
                    $data = [
                        'message' => $request->file('logo2')->store('logo', 'public')
                    ];
                    Settings::where('type', 'logo2')->update($data);
                } else {
                    $setting = new Settings();
                    $setting->type = 'logo2';
                    $setting->message = $request->file('logo2')->store('logo', 'public');
                    $setting->save();
                }
            }
            if ($request->hasFile('favicon')) {
                if (Settings::where('type', 'favicon')->exists()) {
                    $get_id = Settings::select('message')->where('type', 'favicon')->pluck('message')->first();
                    if (Storage::disk('public')->exists($get_id)) {
                        Storage::disk('public')->delete($get_id);
                    }
                    $data = [
                        'message' => $request->file('favicon')->store('logo', 'public')
                    ];
                    Settings::where('type', 'favicon')->update($data);
                } else {
                    $setting = new Settings();
                    $setting->type = 'favicon';
                    $setting->message = $request->file('favicon')->store('logo', 'public');
                    $setting->save();
                }
            }
            if ($request->hasFile('login_image')) {
                if (Settings::where('type', 'login_image')->exists()) {
                    $get_id = Settings::select('message')->where('type', 'login_image')->pluck('message')->first();
                    if (Storage::disk('public')->exists($get_id)) {
                        Storage::disk('public')->delete($get_id);
                    }
                    $data = [
                        'message' => $request->file('login_image')->store('logo', 'public')
                    ];
                    Settings::where('type', 'login_image')->update($data);
                } else {
                    $setting = new Settings();
                    $setting->type = 'login_image';
                    $setting->message = $request->file('login_image')->store('logo', 'public');
                    $setting->save();
                }
            }

            $logo1 = Settings::select('message')->where('type', 'logo1')->pluck('message')->first();
            $logo2 = Settings::select('message')->where('type', 'logo2')->pluck('message')->first();
            $favicon = Settings::select('message')->where('type', 'favicon')->pluck('message')->first();
            $app_name = Settings::select('message')->where('type', 'school_name')->pluck('message')->first();
            $timezone = Settings::select('message')->where('type', 'time_zone')->pluck('message')->first();
            $login_image = Settings::select('message')->where('type', 'login_image')->pluck('message')->first();
            $recaptcha_site_key = Settings::select('message')->where('type', 'recaptcha_site_key')->pluck('message')->first();
            $recaptcha_secret_key = Settings::select('message')->where('type', 'recaptcha_secret_ke')->pluck('message')->first();

            $env_update = changeEnv([
                'LOGO1' => $logo1,
                'LOGO2' => $logo2,
                'FAVICON' => $favicon,
                'LOGIN_IMAGE' => $login_image,
                'APP_NAME' => '"' . $app_name . '"',
                'TIMEZONE' => "'" . $timezone . "'",
                'SITE_KEY' =>  $recaptcha_site_key,
                'SECRET_KEY' => $recaptcha_secret_key

            ]);
            if ($env_update) {
                $response = array(
                    'error' => false,
                    'message' => trans('data_update_successfully'),
                );
            }
        } catch (Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return response()->json($response);
    }

    public function fcm_index()
    {
        if (!Auth::user()->can('fcm-setting-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }

        $settings = getSettings();
        return view('settings.fcm_key', compact('settings'));
    }

    public function email_index()
    {
        if (!Auth::user()->can('email-setting-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $settings = getSettings();
        return view('settings.email_configuration', compact('settings'));
    }

    public function email_update(Request $request)
    {
        if (!Auth::user()->can('email-setting-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $request->validate([
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_send_from' => 'required|email',
        ]);

        $settings = [
            'mail_mailer',
            'mail_host',
            'mail_port',
            'mail_username',
            'mail_password',
            'mail_encryption',
            'mail_send_from',
        ];

        try {
            foreach ($settings as $row) {
                if (Settings::where('type', $row)->exists()) {

                    $data = [
                        'message' => $request->$row
                    ];
                    Settings::where('type', $row)->update($data);
                } else {
                    $setting = new Settings();
                    $setting->type = $row;
                    $setting->message = $request->$row;
                    $setting->save();
                }
                Settings::updateOrInsert(
                    ['type' => 'email_configration_verification'],
                    ['type' => 'email_configration_verification', 'message' => 0]
                );
            }
            $env_update = changeEnv([
                'MAIL_MAILER' => $request->mail_mailer,
                'MAIL_HOST' => $request->mail_host,
                'MAIL_PORT' => $request->mail_port,
                'MAIL_USERNAME' => $request->mail_username,
                'MAIL_PASSWORD' => $request->mail_password,
                'MAIL_ENCRYPTION' => $request->mail_encryption,
                'MAIL_FROM_ADDRESS' => $request->mail_send_from

            ]);
            if ($env_update) {
                $response = array(
                    'error' => false,
                    'message' => trans('data_update_successfully'),
                );
            } else {
                $response = array(
                    'error' => false,
                    'message' => trans('error_occurred'),
                );
            }
        } catch (Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return response()->json($response);
    }

    public function verifyEmailConfigration(Request $request)
    {
        if (!Auth::user()->can('email-setting-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $validator = Validator::make($request->all(), [
            'verify_email' => 'required|email',
        ]);
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first(),
            );
            return response()->json($response);
        }
        try {
            $data = [
                'email' => $request->verify_email,
            ];
            $admin_mail = env('MAIL_FROM_ADDRESS');
            if (!filter_var($request->verify_email, FILTER_VALIDATE_EMAIL)) {
                $response = array(
                    'error' => true,
                    'message' => trans('invalid_email'),
                );
                return response()->json($response);
            }
            Mail::send('mail', $data, function ($message) use ($data, $admin_mail) {
                $message->to($data['email'])->subject('Connection Verified successfully');
                $message->from($admin_mail, 'Eschool Admin');
            });

            Settings::where('type','email_configration_verification')->update(['message'=>1]);

            $response = array(
                'error' => false,
                'message' => trans('email_sent_successfully'),
            );
        } catch (Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return response()->json($response);
    }

    public function privacy_policy_index()
    {
        if (!Auth::user()->can('privacy-policy')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $settings = Settings::where('type', 'privacy_policy')->first();
        $type = 'privacy_policy';
        return view('settings.privacy_policy', compact('settings', 'type'));
    }

    public function contact_us_index()
    {
        if (!Auth::user()->can('contact-us')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $settings = Settings::where('type', 'contact_us')->first();
        $type = 'contact_us';
        return view('settings.contact_us', compact('settings', 'type'));
    }

    public function about_us_index()
    {
        if (!Auth::user()->can('about-us')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $settings = Settings::where('type', 'about_us')->first();
        $type = 'about_us';
        return view('settings.about_us', compact('settings', 'type'));
    }

    public function terms_condition_index()
    {
        if (!Auth::user()->can('terms-condition')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $settings = Settings::where('type', 'terms_condition')->first();
        $type = 'terms_condition';
        return view('settings.terms_condition', compact('settings', 'type'));
    }

    public function setting_page_update(Request $request)
    {
        if (!Auth::user()->can('setting-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'message' => 'required'
        ]);
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first(),
            );
            return response()->json($response);
        }
        $type = $request->type;
        $message = $request->message;
        $id = Settings::select('id')->where('type', $type)->pluck('id')->first();
        if (isset($id) && !empty($id)) {
            $setting = Settings::find($id);
            $setting->message = $message;
            $setting->save();
            $response = array(
                'error' => false,
                'message' => trans('data_update_successfully'),
            );
        } else {
            $setting = new Settings();
            $setting->type = $type;
            $setting->message = $message;
            $setting->save();
            $response = array(
                'error' => false,
                'message' => trans('data_store_successfully'),
            );
        }

        return response()->json($response);
    }

    public function app_index()
    {
        if (!Auth::user()->can('setting-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $settings = getSettings();
        return view('settings.app_settings', compact('settings'));
    }

    public function app_update(Request $request)
    {
        if (!Auth::user()->can('setting-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $request->validate([
            'app_link' => 'required',
            'ios_app_link' => 'required',
            'app_version' => 'required',
            'ios_app_version' => 'required',
            'force_app_update' => 'required',
            'app_maintenance' => 'required',
            'teacher_app_link' => 'required',
            'teacher_ios_app_link' => 'required',
            'teacher_app_version' => 'required',
            'teacher_ios_app_version' => 'required',
            'teacher_force_app_update' => 'required',
            'teacher_app_maintenance' => 'required',
        ]);

        $settings = [
            'app_link',
            'ios_app_link',
            'app_version',
            'ios_app_version',
            'force_app_update',
            'app_maintenance',
            'teacher_app_link',
            'teacher_ios_app_link',
            'teacher_app_version',
            'teacher_ios_app_version',
            'teacher_force_app_update',
            'teacher_app_maintenance',
        ];

        try {

            foreach ($settings as $row) {
                if (Settings::where('type', $row)->exists()) {

                    $data = [
                        'message' => $request->$row
                    ];
                    Settings::where('type', $row)->update($data);
                } else {
                    $setting = new Settings();
                    $setting->type = $row;
                    $setting->message = $request->$row;
                    $setting->save();
                }
            }

            $response = array(
                'error' => false,
                'message' => trans('data_update_successfully'),
            );
        } catch (Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return response()->json($response);
    }

    public function notification_setting(Request $request)
    {
        if (!Auth::user()->can('setting-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $request->validate([
           'sender_id' => 'required',
           'project_id' => 'required',
           //'service_account_file' => 'required|mimes:json'
        ]);
        $settings = ['sender_id', 'project_id'];
        try {
            foreach ($settings as $row) {
                if (Settings::where('type', $row)->exists()) {
                    $data = [
                        'message' => $request->$row
                    ];
                    Settings::where('type', $row)->update($data);
                } else {
                    $setting = new Settings();
                    $setting->type = $row;
                    $setting->message = $request->$row;
                    $setting->save();
                }
            }
            if ($request->hasFile('service_account_file')) {
                $serviceAccountFile = $request->file('service_account_file');

                if (Settings::where('type', 'service_account_file')->exists()) {
                    $get_id = Settings::where('type', 'service_account_file')->value('message');

                    // Delete the existing file
                    if (Storage::disk('public')->exists($get_id)) {
                        Storage::disk('public')->delete($get_id);
                    }

                    // Store the new file with its original name
                    $data = [
                        'message' => $serviceAccountFile->storeAs('firebase', $serviceAccountFile->getClientOriginalName(), 'public')
                    ];
                    Settings::where('type', 'service_account_file')->update($data);
                } else {
                    $setting = new Settings();
                    $setting->type = 'service_account_file';
                    $setting->message = $serviceAccountFile->storeAs('firebase', $serviceAccountFile->getClientOriginalName(), 'public');
                    $setting->save();
                }
            }

            $sender_id = Settings::select('message')->where('type', 'sender_id')->pluck('message')->first();
            $firebase_project_id = Settings::select('message')->where('type', 'project_id')->pluck('message')->first();
            $env_update = changeEnv([
                'SENDER_ID' =>  $sender_id,
                'FIREBASE_PROJECT_ID' =>  $firebase_project_id,
            ]);
            if ($env_update) {
                $response = array(
                    'error' => false,
                    'message' => trans('data_update_successfully'),
                );
            }
        } catch (\Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }

        return response()->json($response);
    }

    public function chat_setting_index()
    {
        if (!Auth::user()->can('chat-settings')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $settings = getSettings();
        return view('settings.chat_setting', compact('settings'));
    }

    public function chat_setting_update(Request $request)
    {
        if (!Auth::user()->can('chat-settings')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $request->validate([
            'max_files_or_images_in_one_message' => 'required',
            'max_file_size_in_bytes' => 'required',
            'max_characters_in_text_message' => 'required',
            'automatically_messages_removed_days' => 'required',
            'info-link' => 'required'
        ]);
        $settings = ['max_files_or_images_in_one_message', 'max_file_size_in_bytes', 'max_characters_in_text_message', 'automatically_messages_removed_days', 'info-link'];
        try {
            foreach ($settings as $row) {
                if (Settings::where('type', $row)->exists()) {
                    $data = [
                        'message' => $request->$row
                    ];
                    Settings::where('type', $row)->update($data);
                } else {
                    $setting = new Settings();
                    $setting->type = $row;
                    $setting->message = $request->$row;
                    $setting->save();
                }
            }
            $response = array(
                'error' => false,
                'message' => trans('data_update_successfully'),
            );

        } catch (\Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return response()->json($response);
    }

    public function delete_chat_messages(Request $request)
    {
        if (!Auth::user()->can('chat-message-delete')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $validator = Validator::make($request->all(), [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after:from_date',
        ],[
            'to_date.after' => "The 'To Date' must be a date after the 'From Date'."
        ]);

        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        try {
            $from_date = date('Y-m-d', strtotime($request->from_date));
            $to_date = date('Y-m-d', strtotime($request->to_date));

            $chat_messages = ChatMessage::with('file')->whereDate('date', '>=', $from_date)->whereDate('date', '<=', $to_date)->get();

            foreach ($chat_messages as $message) {
                if($message->file)
                {
                    foreach ($message->file as $file) {
                        if($file)
                        {
                            if(Storage::disk('public')->exists($file->file_name)) {
                                Storage::disk('public')->delete($file->file_name);
                            }
                            $file->delete();
                        }
                    }
                }
                $message->delete();
            }

            $response = array(
                'error' => false,
                'message' => trans('data_delete_successfully'),
            );

        } catch (\Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return response()->json($response);
    }

    public function cron_job()
    {
        try {
            $settings = getSettings();
            $automatically_messages_removed_days = $settings['automatically_messages_removed_days'] ?? '30';

            $date = now()->subDays($automatically_messages_removed_days);

            $chat_messages = ChatMessage::with('file')->whereDate('date', '<', $date)->get();

            foreach ($chat_messages as $message) {
                if($message->file)
                {
                    foreach ($message->file as $file) {
                        if($file)
                        {
                            if(Storage::disk('public')->exists($file->file_name)) {
                                Storage::disk('public')->delete($file->file_name);
                            }
                            $file->delete();
                        }
                    }
                }
                $message->delete();
            }

            Log::info("Old Chat Messages Deleted");

            $response = array(
                'error' => false,
                'message' => trans('data_delete_successfully'),
            );
        } catch (\Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return response()->json($response);
    }

}
