@extends('layouts.app')

@section('content')
<div class="mt-10 container">
    <div class="flex justify-between items-center">
    <h2 class="text-2xl font-bold mb-2 text-gray-600 font-poppins">{{$article->title}}</h2>
    <!-- Actions -->
    <div class="flex space-x-6 mb-2">
                        <a class="text-gray-500 hover:text-gray-700" href="{{route('articles.edit', $article->slug)}}">
                            <img src="{{ asset('svg/pencil.svg') }}" alt="Trash Icon" class="w-4 h-4 inline-block mb-2"/>
                        </a>
        <button
            class="text-gray-500 hover:text-gray-700"
            data-modal-target="default-modal"
            data-modal-toggle="default-modal"
        >
            <img src="{{ asset('svg/trash.svg') }}" alt="Trash Icon" class="w-4 h-4 inline-block mb-2"/>
        </button>

        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 max-w-md mx-auto flex">
                <div class="relative bg-white shadow dark:bg-gray-700 p-2">
                    <div class="flex items-center justify-between dark:border-gray-600">
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <i class="fas fa-close text-md text-gray-500"></i>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-4">
                        <p class="text-xl text-gray-500 dark:text-gray-400 font-poppins font-bold text-center leading-loose">
                            Are you sure you want to<br> delete the article
                        </p>
                    </div>
                    <div class="flex items-center mx-auto justify-center p-4 md:p-5 space-x-4">
                        <!-- Delete form -->
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-3 bg-orange-600 px-8 text-sm font-semibold font-poppins text-white">
                                Yes
                            </button>
                        </form>
                        <button type="button" data-modal-hide="default-modal" class="bg-gray-300 text-gray-500 px-8 py-3 font-poppins text-sm font-semibold">{{ __('No') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="text-md mb-2 text-gray-600 font-medium font-poppins">
        {{ \Carbon\Carbon::parse($article->published_at)->format('d F Y') }}
    </div>


    <div class="w-full mt-4">
        <img src="{{$article->getFirstMediaUrl('featured_image')}}" alt="{{$article->title}}" class="object-cover h-[550px] w-full aspect-1/4"/>
    </div>

    <div class="max-w-3xl mx-auto flex-col font-poppins text-gray-500 space-y-4 mt-10 mb-20">
        <p>
          {!! $article->content !!}
        <p>
    </div>

</div>
@endsection
