{{-- Featured Image --}}
<x-forms::form-group :label="$label ?: __('Featured Image')" :name="$attributes->get('id') ?: $id()" inline>
    <div class="d-flex align-items-center">
        {{-- File Upload Button --}}
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-wrapper">
                <span class="btn-file">
                    <label
                        class="bg-orange-600 text-white font-poppins font-semibold px-4 py-3 cursor-pointer"
                    >
                        <div class="flex">
                        {{ __('Select an Image') }}
                        <span class="pl-2 mt-1">
                        {!! file_get_contents(public_path('svg/arrow-to-top.svg')) !!}
                        </span>
                        </div>

                        <input
                            type="file"
                            accept="{{ implode(',', $mimetypes) }}"
                            name="{{ $name }}"
                            id="{{ $id() }}"
                            style="display: none;"
                        />
                    </label>
                </span>
            </div>
        </div>
    </div>
</x-forms::form-group>
