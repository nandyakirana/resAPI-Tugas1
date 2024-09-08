<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Todo</title>
    #<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        h1 {
            font-size: 2em;
            color: #333;
        }
        p {
            font-size: 1.2em;
            margin: 10px 0;
        }
        a, button {
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Todo Details</h1>

    <p><strong>Task:</strong> {{ $todo->task }}</p>
    <p><strong>Status:</strong> {{ $todo->completed ? 'Completed' : 'Pending' }}</p>

    <a href="{{ route('todos.edit', $todo) }}">Edit</a>
    <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <a href="{{ route('todos.index') }}">Back to Todo List</a>
</body>
</html>
