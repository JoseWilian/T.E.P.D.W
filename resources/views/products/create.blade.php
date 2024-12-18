<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>titulo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/7.css" />
</head>

<body>
    <div class="background">
        <div class="window glass active" style="max-width: 50%">
            <div class="title-bar">
                <div class="title-bar-text">A glass window frame</div>
                <div class="title-bar-controls">
                    <button aria-label="Close" onclick="window.location.href='{{ route('products') }}'"></button>
                </div>
            </div>
            <div class="window-body has-space">
                <form action="{{ url('products') }}" method="POST">
                    @csrf
                    <div class="field-row-stacked" style="width: 200px">
                        <label for="text27">Name:</label>
                        <input id="text27" type="text" name="name" placeholder="Name" required />
                    </div>

                    <div class="field-row-stacked" style="width: 200px">
                        <label for="text29">Description:</label>
                        <textarea id="text29" rows="2" name="description" placeholder="Description" required></textarea>
                    </div>
                    <button type="submit" style="margin-top: 10px;">Save</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>
