<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A simple counter page to demonstrate React with Laravel">
    <title>{{ $metaTitle }}</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/components/counter.jsx'])
</head>

<body>
    <div id="app"></div>
</body>

</html>
