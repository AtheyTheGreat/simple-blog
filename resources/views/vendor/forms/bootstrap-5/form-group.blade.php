@if($wrap)
<div {!! $attributes->merge(['class' => 'mb-4'.($floating ? ' form-floating' : ($inline ? ' row align-items-center' : ''))]) !!}>
    @if((! $floating) && $showLabel)
        <x-forms::label :blank-label="$blankLabel" :label="$label ?: $label()" for="{{ $blankLabel ? '' : $name }}" :inline-label-class="$inlineLabelClass ?? 'col-sm-2'" :framework="$framework" :inline="$inline" :required="$required" :floating="false" />
    @endif

    @if($inline && (! $floating))
    <div class="{{ $inlineInputClass ?? 'col-sm-10' }}">
    @endif
@endif

        {!! $slot !!}

@if($wrap)
    @if($inline && (! $floating))
    </div>
    @endif

    @if($floating)
        <x-forms::label
            :label="$label ?: $label()"
            :for="$name"
            :inline-label-class="$inlineLabelClass ?? 'col-sm-2'"
            :framework="$framework"
            :required="$required"
            floating />
    @endif
</div>
@endif
