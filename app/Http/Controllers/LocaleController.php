<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Store the requested locale in the session and return to the previous page.
     *
     * Unknown locales are rejected (404) instead of being stored, so only the
     * locales declared in config('app.available_locales') can ever be activated.
     */
    public function switch(Request $request, string $locale)
    {
        abort_unless(array_key_exists($locale, config('app.available_locales', [])), 404);

        $request->session()->put('locale', $locale);

        return back();
    }
}
