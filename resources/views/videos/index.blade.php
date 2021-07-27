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
                                            Status
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
                                            <span>
                                                @if ($video->is_active == 1)
                                                    <span class="inline-flex text-xs leading-5 font-semibold rounded-full text-green-500 bg-green-100 py-1 px-2">
                                                        Published
                                                    </span>
                                                @endif
                                                @if ($video->is_active == 0)
                                                    <span class="inline-flex text-xs leading-5 font-semibold rounded-full text-red-500 bg-red-100 py-1 px-2">
                                                        Not Published
                                                    </span>
                                                @endif
                                            </span>
                                            </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-small">
                                        <span>
                                            <a href="/videos/{{$video->id}}/edit" class="bg-green-500 text-white px-2 py-1 rounded font-small w-full">Edit</a>
                                        </span> 
                                        <span>
                                            {{-- <button id="delete" class="modal-open cursor-pointer mt-2 bg-red-500 text-white px-2 py-1 rounded font-small">Delete</button> --}}
                                            {!! Form::open(['url' => ['videos', $video->id], 'method' => 'POST']) !!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'cursor-pointer mt-2 bg-red-500 text-white px-2 py-1 rounded font-small w-full'])}}
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
 <!--Modal-->
 <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center" id="deleteForm">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">

        <!--Body-->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>

         <h2 class="text-xl font-bold py-4 text-center">Are you sure?</h3>
                        <p class="text-sm text-gray-500 px-8 text-center">Do you really want to delete your account?
                This process cannot be undone</p>    

        <!--Footer-->
        <div class="flex justify-center pt-2">
            {!! Form::open(['url' => ['videos', $video->id], 'method' => 'POST']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Yes', ['class' => 'cursor-pointer px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400'])}}
            {!! Form::close() !!}
            {{-- <button class="px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Yes</button> --}}
            <button class="modal-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">No</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection