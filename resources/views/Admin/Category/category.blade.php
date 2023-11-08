<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} Welcome, {{ auth()->user()->name }} 
            Welcome <br>
            <div class="span">
                <span>
                    Total Categories: {{count($categories)}}
                </span>
            </div>
        </h2>
        
    </x-slot>

    
      
   
    <div class="col-md-12">
        <button type="button" class="btn btn-outline-primary float-right" onclick="window.location.href='{{route('addCategory')}}'">Add Category</button>

    </div>
    `<table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">User ID</th>
                <th scope="col">Created_at</th>
             
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $items)
                <tr>
                    <th scope="row">{{ $items->id }}</th>
                    <td>{{ $items->category_name }}</td>
                    <td>{{$items->user_id}}</td>
                    <td>{{$items->created_at->diffForHumans()}}</td>
                  
                </tr>
            @endforeach

        </tbody>
    </table>

</x-app-layout>
