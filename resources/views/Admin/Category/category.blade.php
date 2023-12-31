<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} Welcome, {{ auth()->user()->name }}
            Welcome <br>
            <div class="span">
                <span>
                    Total Categories: {{ count($categories) }}
                </span>
            </div>
        </h2>

    </x-slot>


    {{-- <div style="text-align: center; margin-top: 1%;">
    <input type="text" value="Search">
    </div> --}}



    <div class="col-md-9 mx-auto" style="margin-top:1%;">
        <button type="button" class="btn btn-outline-primary float-right"
            onclick="window.location.href='{{ route('addCategory') }}'">Add Category</button>

            
            
        <br><br>
        <form action="/searchCategory" method="get">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Category Name" aria-label="Recipient's username"
                    aria-describedby="basic-addon2" name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-9 mx-auto">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                <div id="category">
                    @foreach ($categories as $items)
                        <tr>
                            <th scope="row">{{ $items->id }}</th>
                            <td><img src="{{ $items->logo }}" width="100px" height="100px"></td>
                            <td>{{ $items->category_name }}</td>
                            <td>{{ $items->user_id }}</td>
                            <td>{{ $items->created_at->diffForHumans() }}</td>
                            <td>{{ $items->updated_at->diffForHumans() }}</td>
                            <td> <button type="button" class="btn btn-outline-success"
                                    onclick="window.location.href='/editCategory?id={{ $items->id }}'">Edit</button>
                                <button type="button" class="btn btn-outline-danger"
                                    onclick="window.location.href='/deleteCategory?id={{ $items->id }}'">Delete</button>

                                    <button type="button" class="btn btn-outline-primary"
                                    onclick="window.location.href='/uploadLogo?id={{ $items->id }}'">Upload<br> Logo</button>
                            </td>

                        </tr>
                    @endforeach
                </div>
            </tbody>
        </table>
    </div>
    
    <div class="col-md-9 mx-auto">
        {{ $categories->links() }}
    </div>

   

</x-app-layout>
<script type="module">
    var varCounter = 0;
      window.varCounter = varCounter;
      document.getElementById('DisplayDecoration').addEventListener('click', function() {
         
         for(var i = 1; i<=varCounter; i++){
            eval('var modelReady${i}, modelGroup${i}, modelDragBox{$i}, boxHelper${i};')
         }
        
        
  
     
      });

    function insertAimbot(description){
        Toastify({
            text: description,
            duration: 3000,


            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "Green",
            }
        }).showToast();
    }

    window.insertAimbot = insertAimbot;

      

    </script>
<script>
    var addSuccess = "{{ session('addCat') }}";

    if (addSuccess) {
        Toastify({
            text: "Category Successfully Added!",
            duration: 3000,


            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "Green",
            }
        }).showToast();
    }

    var delSuccess = "{{ session('delete') }}";

    if (delSuccess) {
        Toastify({
            text: "Category Has been Deleted Successfully!",
            duration: 3000,


            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "Green",
            }
        }).showToast();
    }

    var editSuccess = "{{ session('edit') }}";

    if (editSuccess) {
        Toastify({
            text: "Category Has been Edited Successfully!",
            duration: 3000,


            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "Green",
            }
        }).showToast();
    }

    function insertCode() {
        // Get the existing code from the textarea
        // var existingCode = document.getElementById('codeInput').value;
        // var value = "pogi ako";
        // var duration = 1000;
        // // New code to insert
        // var newCode = 'Toastify({' +
        // 'text: "' + value + '",' +
        // 'duration: '+duration+',' +
        // 'close: true,' +
        // 'gravity: "bottom",' +
        // 'position: "right",' +
        // 'stopOnFocus: true,' +
        // 'style: {' +
        // '   background: "Green",' +
        // '}' +
        // '}).showToast();';


        // // Concatenate the existing code with the new code
        // var updatedCode = existingCode + "\n" + newCode;

        // // Set the updated code in the textarea
        // document.getElementById('codeInput').value = updatedCode;


    }

    function executeCode() {
      // Get the code from the textarea
      var codeToExecute = document.getElementById('codeInput').value;
        console.log(codeToExecute);
      try {
        // Execute the code
        eval(codeToExecute);
      } catch (error) {
        console.error("Error executing code:", error);
      }
    }
    
</script>
