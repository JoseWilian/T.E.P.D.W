<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/7.css" />
    <style>
        .selected {
            background-color: yellow;
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="window glass active" style="max-width: 50%">
            <div class="title-bar">
                <div class="title-bar-text">All Fruits</div>
            </div>
            <ul role="menubar">
                <li role="menuitem" tabindex="0" onclick="window.location.href='{{ route('products.create') }}'">New
                </li>
                <li id="updateButton" role="menuitem" tabindex="0">Edit</li>
                <li id="show" role="menuitem" tabindex="0">Show Description</li>
                <li id="deleteButton" role="menuitem" tabindex="0">Delete</li>
            </ul>
            <div class="content window-body has-space">
                @yield('content')
            </div>
            <div class="window-body has-space">
                <h5><strong>Description:</strong> </h5>
                <p id="desc"></p>
            </div>
        </div>
    </div>
    <footer>
        <p>References:</p>
        <p>https://khang-nd.github.io/7.css/#intro</p>
        <p>https://medium.com/@tutsmake.com/laravel-11-simple-crud-application-example-2f0fc9c2f572</p>
        <p>copilot.microsoft.com</p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('li[role="option"]').forEach(function(item) {
                item.addEventListener('click', function() {
                    item.classList.toggle('selected');
                });
            });
            document.getElementById('deleteButton').addEventListener('click', function() {
                const selectedItems = document.querySelectorAll('li.selected');
                const selectedIds = Array.from(selectedItems).map(item => item.getAttribute('data-id'));
                fetch('{{ route('delete.selection') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            ids: selectedIds
                        })
                    }).then(response => response.json()).then(data => {
                        console.log('Success:',
                            data
                        );
                        location.reload();
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            });

            document.getElementById('updateButton').addEventListener('click', function() {
                const selectedItems = document.querySelectorAll('li.selected');

                if (selectedItems.length === 1) {
                    const selectedId = selectedItems[0].getAttribute('data-id');

                    window.location.href = `/products/${selectedId}/edit`;

                } else {
                    console.log('Please select exactly one item.');
                }
            });


            document.getElementById('show').addEventListener('click', function() {
                const selectedItems = document.querySelectorAll('li.selected');

                if (selectedItems.length === 1) {
                    const selectedId = selectedItems[0].getAttribute('data-id');

                    $.ajax({
                        url: 'productDesc/' + selectedId,
                        method: 'GET',
                        success: function(data) {
                            $('#desc').text(data.description);
                        },

                    });

                }

            });

        });
    </script>
</body>

</html>
