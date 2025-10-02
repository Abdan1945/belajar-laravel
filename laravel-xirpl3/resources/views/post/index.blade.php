<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>Data Posts</legend>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Content</th>
            </tr>
            @foreach ($post as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->title }}</td>
                <td>{{Str::limit ($data->content, )}}</td>
            </tr>
            @endforeach
        </table>
    </fieldset>
</body>
</html>