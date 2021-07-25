@extends('layouts.app')

@section('content')
                <div class="w-29 bg-white p-6 rounded-lg mb-4">
                    <a href="/videos/create" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Add</a>
                </div>
                @if ($videos->count())
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Video
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Created
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Edited
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($videos as $video)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                               {{ $video->title }}
                                            </div>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <video width="320" height="240" controls>
                                                <source src="/storage/videos/{{$video->video}}" type="video/mp4">
                                            </video>
                                        </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex text-xs leading-5 font-semibold rounded-full text-green-800">
                                            {{ $video->created_at->diffForHumans() }}
                                        </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex text-xs leading-5 font-semibold rounded-full text-green-800">
                                                {{ $video->updated_at->diffForHumans() }}
                                            </span>
                                            </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-small">
                                        <span>
                                            <a href="/videos/{{$video->id}}/edit" class="bg-green-500 text-white px-2 py-1 rounded font-small w-full">Edit</a>
                                        </span> 
                                        <span>
                                            {!! Form::open(['url' => ['videos', $video->id], 'method' => 'POST']) !!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'mt-2 hover:bg-red-700 bg-red-500 text-white px-2 py-1 rounded font-small w-full'])}}
                                            {!! Form::close() !!}
                                        </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    
                     {{ $videos->links() }}
  
                @else
                    <p>There are no videos</p>
                @endif

@endsection