<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} Welcome, {{ auth()->user()->name }} 
            Welcome <br>
            <div class="span">
                <span>
                    Total Users: {{count($users)}}
                </span>
            </div>
        </h2>
        
    </x-slot>

    
      
   
    <div class="col-md-12">
        <button type="button" class="btn btn-outline-primary float-right">Primary</button>

    </div>
    `<table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created_at</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $items)
                <tr>
                    <th scope="row">{{ $items->id }}</th>
                    <td>{{ $items->name }}</td>
                    <td>{{ $items->email }}</td>
                    <td>{{ $items->created_at->diffForHumans() }}</td>
                   
                </tr>
            @endforeach

        </tbody>
    </table>

</x-app-layout>
