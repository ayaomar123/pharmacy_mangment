@php($locales = config('app.available_locales', []))

@if (count($locales) > 1)
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown" title="{{ __('app.language') }}">
            <i class="feather icon-globe"></i>
            <span>{{ $locales[app()->getLocale()] ?? strtoupper(app()->getLocale()) }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            @foreach ($locales as $locale => $label)
                <a class="dropdown-item @if ($locale === app()->getLocale()) active @endif"
                    href="{{ route('locale.switch', $locale) }}">{{ $label }}</a>
            @endforeach
        </div>
    </div>
@endif
