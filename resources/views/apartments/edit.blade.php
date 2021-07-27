@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mb-4">
            <div>
                <h1 class="text-center mb-4 font-bold">Edit Apartment</h1>
                {!! Form::open(['url' => ['apartments', $apartment->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="mb-4">
                        {{Form::label('title', 'Title', ['class' => 'sr-only'])}}
                        {{Form::text('title', $apartment->title, ['class' => 'bg-gray-100 border-2 w-full p-3 rounded-lg', 'placeholder' => 'Title'])}}
                        @error('title')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        {{Form::label('sq_mt', 'sq_mt', ['class' => 'sr-only'])}}
                        {{Form::number('sq_mt', $apartment->sq_mt, ['class' => 'bg-gray-100 border-2 w-full p-3 rounded-lg', 'placeholder' => 'Square meter'])}}
                        @error('sq_mt')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                {{Form::file('photo_main')}}
                                @error('photo_main')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                {{$apartment->main_photo}}
                                <img width="320" height="240" src="/storage/photos/{{$apartment->main_photo}}" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                {{Form::file('photo_1')}}
                                @error('photo_1')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                {{$apartment->photo_1}}
                                <img width="320" height="240" src="/storage/photos/{{$apartment->photo_1}}" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                {{Form::file('photo_2')}}
                                @error('photo_2')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                {{$apartment->photo_2}}
                                <img width="320" height="240" src="/storage/photos/{{$apartment->photo_2}}" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                {{Form::file('photo_3')}}
                                @error('photo_3')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                {{$apartment->photo_3}}
                                <img width="320" height="240" src="/storage/photos/{{$apartment->photo_3}}" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                {{Form::file('photo_4')}}
                                @error('photo_4')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                {{$apartment->photo_4}}
                                <img width="320" height="240" src="/storage/photos/{{$apartment->photo_4}}" />
                            </div>
                        </div> 
                    </div>
                    <div class="mb-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                {{Form::file('photo_5')}}
                                @error('photo_5')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                {{$apartment->photo_5}}
                                <img width="320" height="240" src="/storage/photos/{{$apartment->photo_5}}" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        {{Form::label('master_bedroom', 'master_bedroom', ['class' => 'sr-only'])}}
                        {{Form::number('master_bedroom', $apartment->master_bedroom, ['class' => 'bg-gray-100 border-2 w-full p-3 rounded-lg', 'placeholder' => 'Master bedroom'])}}
                        @error('master_bedroom')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        {{Form::label('bathroom', 'bathroom', ['class' => 'sr-only'])}}
                        {{Form::number('bathroom', $apartment->bathroom, ['class' => 'bg-gray-100 border-2 w-full p-3 rounded-lg', 'placeholder' => 'Bathroom'])}}
                        @error('bathroom')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="kitchen" id="kitchen" class="mr-2" value="1" {{($apartment->kitchen == 1 ? ' checked' : '') }}>
                            <label for="kitchen">Kitchen</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="guest_toilet" id="guest_toilet" class="mr-2" {{($apartment->guest_toilet == 1 ? ' checked' : '') }}>
                            <label for="guest_toilet">Guest Toilet</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="corridor" id="corridor" class="mr-2" {{($apartment->corridor == 1 ? ' checked' : '') }}>
                            <label for="corridor">Corridor</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="store" id="store" class="mr-2" {{($apartment->store == 1 ? ' checked' : '') }}>
                            <label for="store">Store</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="balcony" id="balcony" class="mr-2" {{($apartment->balcony == 1 ? ' checked' : '') }}>
                            <label for="balcony">Balcony</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="parking" id="parking" class="mr-2" {{($apartment->parking == 1 ? ' checked' : '') }}>
                            <label for="parking">Parking</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="elevetor" id="elevetor" class="mr-2" {{($apartment->elevator == 1 ? ' checked' : '') }}>
                            <label for="elevetor">Elevator</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="cctv" id="cctv" class="mr-2" {{($apartment->cctv == 1 ? ' checked' : '') }}>
                            <label for="cctv">CCTV and Video Camera Entry</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="garbage_shooter" id="garbage_shooter" class="mr-2" {{($apartment->garbage_shooter == 1 ? ' checked' : '') }}>
                            <label for="garbage_shooter">Garbage Shooter</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="generators" id="generators" class="mr-2" {{($apartment->generator == 1 ? ' checked' : '') }}>
                            <label for="generators">Generators</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="wifi" id="wifi" class="mr-2" {{($apartment->wifi == 1 ? ' checked' : '') }}>
                            <label for="wifi">Wifi</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="publish" id="publish" class="mr-2" {{($apartment->published == 1 ? ' checked' : '') }}>
                            <label for="publish">Publish</label>
                        </div>
                    </div>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class'=>'cursor-pointer bg-blue-500 text-white px-4 py-3 rounded font-medium w-full'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection