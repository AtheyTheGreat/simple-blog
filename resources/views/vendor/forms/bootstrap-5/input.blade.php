<x-forms::form-group :wrap="$showLabel && $type != 'hidden'" :label="$label ?: $label()"
                     :name="$attributes->get('id') ?: $id()" :framework="$framework" :inline="$inline"
                     :inline-input-class="$inlineInputClass ?? 'col-sm-10'"
                     :inline-label-class="$inlineLabelClass ?? 'col-sm-2'"
                     :required="$required" :floating="$floating">
    @if($isDateInput() || (! empty($prepend)) || (! empty($append)))
        <div class="input-group">
            @if($isDateInput())
                <span class="input-group-text">
                    <!-- <i class="{{ $icon }}"></i> -->
                    <img src="{{asset('svg/calender-alt.svg')}}"/>
                </span>
            @elseif(! empty($prepend))
                {{ $prepend }}
            @endif
            @endif

            @if($isFileInput())
                @include('forms::bootstrap-5.file.file-input')
            @else
                <input
                    {!! $attributes->merge([
                        'class' => 'form-control rounded-0 p-3' . ($type === 'color' ? ' form-control-color' : '') . ($hasError($name) ? ' is-invalid' : '') . ($isDateInput() ? ' ' . $datePickerClass() : ''),
                        'required' => $required
                    ] + $getDefaultAttributes()) !!}
                    type="{{ $type }}"
                    value="{{ $value ?? ($type === 'color' ? '#000000' : '') }}"
                    name="{{ $name }}"
                    @if($label && ! $attributes->get('id'))
                        id="{{ $id() }}"
                    @endif
                    {{--  Placeholder is required as of writing  --}}
                    @if($floating || $placeholder)
                        @if($placeholder)
                        placeholder="{{ $placeholder }}"
                        @else
                        placeholder="&nbsp;"
                        @endif
                    @endif
                />
            @endif

            @if($isDateInput() || (! empty($prepend)) || (! empty($append)))
                @if($isDateInput())
                    <button type="button" data-date-clear="#{{ $attributes->get('id') ?: $id() }}"
                            class="{{ $clearBtnClass }}" title="{{ __('Clear') }}">
                        <i class="{{ $clearIcon }}"></i>
                    </button>
                @elseif(! empty($append))
                    {{ $append }}
                @endif
        </div>
    @endif

    @if(! empty($help))
        <x-forms::input-help :framework="$framework" :attributes="$help->attributes">
            {{ $help }}
        </x-forms::input-help>
    @endif

    @if($hasErrorAndShow($name))
        <x-forms::errors :framework="$framework" :name="$name"/>
    @endif
</x-forms::form-group>
