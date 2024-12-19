@extends('layouts.app')

@section('content')
<div class="mt-5">
    <div class="px-6">
        <div class="p-4">
            <h4 class="font-poppins text-2xl font-semibold text-gray-600">New Post</h4>
        </div>
        <div class="card-body p-4">
            {{-- Start the form --}}
            <x-forms::form :action="route('articles.store')" method="POST" enctype="multipart/form-data">

                {{-- Title --}}
                <x-forms::input
                    name="title"
                    :label="__('Title')"
                    placeholder="Title"
                    inline
                    inline-label-class="col-sm-2 text-gray-600 font-poppins font-semibold"
                    inline-input-class="col-sm-10" />

                {{-- Slug --}}
                <x-forms::input
                    name="slug" :label="__('Slug')"
                    placeholder="Slug"
                    inline
                    inline-label-class="col-sm-2 text-gray-600 font-poppins font-semibold"
                    inline-input-class="col-sm-10"
                />

                {{-- Content --}}
                <x-forms::textarea
                    name="content"
                    wysiwyg
                    :label="__('Content')"
                    placeholder="Start Writing..."
                    rows="10"
                    inline
                    inline-label-class="col-sm-2 text-gray-600 font-poppins font-semibold align-self-start pt-2"
                    inline-input-class="col-sm-10"
                    style="resize: none;"
                />

                {{-- Excerpt --}}
                <x-forms::textarea
                    name="excerpt"
                    :label="__('Excerpt')"
                    placeholder="Start Writing..."
                    rows="6"
                    inline
                    inline-label-class="col-sm-2 text-gray-600 font-poppins font-semibold align-self-start pt-2"
                    inline-input-class="col-sm-10"
                    style="resize: none;"
                />

                {{-- Featured Image --}}
                <x-forms::image-upload
                    name="featured_image"
                    :label="__('Featured Image')"
                    inline
                    inline-label-class="col-sm-2 text-gray-600 font-poppins font-semibold align-self-start pt-2"
                />


                {{-- Published Date --}}
                <x-forms::input
                    name="published_at"
                    :label="__('Published Date')"
                    type="date"
                    inline
                    inline-label-class="col-sm-2 text-gray-600 font-poppins font-semibold"
                    inline-input-class="col-sm-10"
                    placeholder="Published Date"
                />

                {{-- Submit Buttons --}}
                <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 mt-4 space-x-3 pl-3">
                    <button type="submit" class="py-3 bg-orange-600 px-8 text-sm font-semibold font-poppins text-white hover:bg-orange-700">Save</button>
                    <a href="/" class="bg-gray-300 text-gray-500 px-8 py-3 font-poppins text-sm font-semibold">{{ __('Cancel') }}</a>
                </div>
                </div>

            </x-forms::form>
        </div>
    </div>
</div>
@endsection
