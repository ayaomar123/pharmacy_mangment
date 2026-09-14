<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use QCod\AppSettings\Setting\AppSettings;
use QCod\AppSettings\SavesSettings;

class SettingController extends Controller
{
    use SavesSettings {
        index as protected showSettingsPage;
        store as protected saveSettings;
    }

    /**
     * Show the settings page with its labels in the active locale.
     */
    public function index(AppSettings $appSettings)
    {
        $view = $this->showSettingsPage($appSettings);

        return $view->with(
            'settingsUI',
            $this->translateSettingsUi($view->getData()['settingsUI'])
        );
    }

    /**
     * Save the settings, flashing the translated confirmation message.
     */
    public function store(Request $request, AppSettings $appSettings)
    {
        return $this->saveSettings($request, $appSettings)
            ->with(['status' => __('settings.saved')]);
    }

    /**
     * Overlay resources/lang/<locale>/settings.php onto the settings UI definition.
     *
     * config/app_settings.php stays the single source of structure. Its strings
     * cannot be translated in place because config is resolved before the locale
     * middleware runs (and may be cached by `config:cache`), so the translation
     * happens here, per request. A line that a locale does not define is left as
     * it is in the config, which keeps the English text as the fallback.
     */
    protected function translateSettingsUi(array $settingsUI): array
    {
        if (Lang::has('settings.submit')) {
            $settingsUI['submit_btn_text'] = __('settings.submit');
        }

        foreach ($settingsUI['sections'] ?? [] as $section => $fields) {
            foreach (['title', 'descriptions'] as $attribute) {
                $line = "settings.sections.{$section}.{$attribute}";

                if (isset($fields[$attribute]) && Lang::has($line)) {
                    $settingsUI['sections'][$section][$attribute] = __($line);
                }
            }

            foreach ($fields['inputs'] ?? [] as $index => $input) {
                foreach (['label', 'placeholder', 'hint'] as $attribute) {
                    $line = "settings.inputs.{$input['name']}.{$attribute}";

                    if (isset($input[$attribute]) && Lang::has($line)) {
                        $settingsUI['sections'][$section]['inputs'][$index][$attribute] = __($line);
                    }
                }
            }
        }

        return $settingsUI;
    }
}
