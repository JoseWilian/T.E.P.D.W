<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/7.css" />
</head>

<body>
    <div class="background">
        <div class="window glass active" style="max-width: 50%">
            <div class="title-bar">
                <div class="title-bar-text">@yield('window-title')</div>
                <div class="title-bar-controls">
                    <button aria-label="Close" onclick="window.location.href='{{ route('products') }}'"></button>
                </div>
            </div>
            <div class="window-body has-space">
                @yield('content')
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>
