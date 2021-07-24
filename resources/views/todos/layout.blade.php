<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css" integrity="sha512-RntatPOhEcQEA81gC/esYoCkGkL7AYV7TeTPoU+R9zE44/yWxVvLIBfBSaMu78rhoDd73ZeRHXRJN5+aPEK53Q==" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />


    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

</head>
<body>
    <div class="text-center pt-10 flex justify-center">
        <div class="w-1/3 border border-gray-400 rounded py-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
