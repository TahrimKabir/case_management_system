<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('role')}}" method="POST">
        @csrf
        <input type="text" style="display: block;" name="role">
        <button type="submit">save</button>
    </form>
</body>
</html>