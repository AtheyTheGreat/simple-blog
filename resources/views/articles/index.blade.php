@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 mt-4">

    <!-- Add New Button -->
    <div class="mb-10">
        <a href="{{route('articles.create')}}" class="bg-orange-600 hover:bg-orange-700 text-white px-3 py-3 items-center">
            <img src="{{ asset('svg/plus.svg') }}" alt="" class="w-4 h-4 inline-block mb-1"/>
            <span class="font-semibold font-poppins">Add New</span>
        </a>
    </div>


        <!-- Articles List -->
        <div class="space-y-6 ">

            <!-- Article Card 1 -->
            @foreach($articles as $article)
            <div class="bg-white shadow-md flex flex-col md:flex-row overflow-hidden">
                <!-- Image -->
                <div class="w-full md:w-1/3 aspect-[5/4]">
                    <img src="{{$article->getFirstMediaUrl('featured_image')}}" alt="{{$article->title}}" class="object-cover h-full w-full">
                </div>
                <!-- Content -->
                <div class="p-6 flex flex-col justify-between w-full md:w-2/3">
                    <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold mb-2 text-gray-600 font-poppins">{{$article->title}}</h2>
                    <!-- Actions -->
                    <div class="flex space-x-6">
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
                                        <button class="bg-gray-300 text-gray-500 px-8 py-3 font-poppins text-sm font-semibold" data-modal-hide="default-modal">{{ __('No') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    </div>
                    <p class="text-gray-500 font-poppins text-md">
                        {{$article->excerpt}}
                    </p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('article.show', $article->slug) }}" class="text-white font-poppins bg-orange-600 hover:bg-orange-700 px-4 py-3 inline-flex items-center font-semibold">
                            Read More
                            <span class="pl-2">
                                <img src="{{ asset('svg/long-arrow-right.svg') }}" alt="" class="w-5 h-5 inline-block"/>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
@endsection
