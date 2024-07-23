@props(['status'])

@if ($status)
    <div class="alert alert-info" role="alert">
        <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}>
            {{ $status }}
        </div>
    </div>
@endif
