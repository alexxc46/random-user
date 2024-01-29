<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
     
    </head>
    <body>        
        <div class="container">
            <h1>Test</h1>
            <button onclick="handleClick()">Download XML</button>
        </div>
    </body>
    <script>
    function handleClick() {
        window.location.href = '/xml';
    }
</script>
</html>
