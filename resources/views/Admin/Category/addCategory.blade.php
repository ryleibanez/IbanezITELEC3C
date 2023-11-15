<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" id="myForm">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Category Name') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="category_name" required autofocus
                    autocomplete="category" />
            </div>




            <div class="flex items-center justify-end mt-4">


                <x-button class="ms-4">
                    {{ __('Add Category') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

    <script>
        document.getElementById('myForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('/addCategoryPost', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    var dataUser = data.status;


                    if (dataUser == 'success') {


                        window.location.replace('/category');


                    } else {
                        Toastify({
                            text: dataUser.category_name,
                            duration: 3000,


                            close: true,
                            gravity: "bottom", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "red",
                            }
                        }).showToast();
                    }


                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
