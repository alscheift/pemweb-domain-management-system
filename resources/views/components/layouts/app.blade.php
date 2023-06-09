<!doctype html>
<html
    lang="en-US" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.png"/>
    
    <title>Domains Master | Domain Management System</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body class="h-full dark:bg-gray-900">

<div class="min-h-full">
    {{$slot}}
</div>

</body>
</html>
