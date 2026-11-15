<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/login1" method="post">
        @csrf
        @method('POST')
        <label for="name">name</label> <br>
         <input type="text" name="name" id="name" required>
         <br>
        <label for="password"> password</label> <br>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">masuk</button>
    </form>
</body>
</html>