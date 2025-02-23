<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: #1a1a2e;
            color: #e94560;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-6xl font-bold animate-bounce">404</h1>
    <p class="text-xl mt-4">Oops! Page Not Found.</p>
    <br>
    <a href="/" class="mt-6 px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">Go Home</a>
</div>

<script>
    document.addEventListener("contextmenu", (event) => {
        event.preventDefault();
    });
</script>
</body>
</html>
