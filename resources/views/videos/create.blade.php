@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mb-4">
            <div>
                <h1 class="text-center mb-4 font-bold">Add Video</h1>
                {!! Form::open(['url' => 'videos', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="mb-4">
                        {{Form::label('title', 'Title', ['class' => 'sr-only'])}}
                        {{Form::text('title', '', ['class' => 'bg-gray-100 border-2 w-full p-3 rounded-lg', 'placeholder' => 'Title'])}}
                        @error('title')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        {{Form::file('video')}}
                        @error('video')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{Form::submit('Upload', ['class'=>'bg-blue-500 text-white px-4 py-3 rounded font-medium w-full'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection