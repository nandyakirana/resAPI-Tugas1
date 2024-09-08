<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 80%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        header {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .profile-container {
            display: flex;
            align-items: center;
        }
        header img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 15px;
        }
        .profile-info {
            font-size: 1em;
            font-weight: bold;
            text-align: left;
        }
        .profile-info span {
            display: block;
            margin-bottom: 5px;
        }
        h1 {
            font-size: 1.8em;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        input[type="text"] {
            padding: 8px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 4px;
            flex: 1;
            margin-right: 10px;
        }
        button {
            padding: 8px 15px;
            font-size: 0.9em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button.add {
            background-color: #1365ff;
            color: white;
        }
        button.delete {
            background-color: #dc3545;
            color: white;
            margin-left: 5px;
        }
        button.done {
            background-color: #28a745;
            color: white;
            margin-left: 5px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 8px;
            padding: 8px 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .task-completed {
            text-decoration: line-through;
            color: #6c757d;
        }
        .btn-group {
            display: flex;
        }
        .success-message {
            color: #28a745;
            margin-bottom: 15px;
            font-weight: bold;
            text-align: center;
        }
        .logout-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="profile-container">
                <img src="{{ asset('img/profile.jpeg') }}" alt="Profile Picture">
                <div class="profile-info">
                    <span>Nama: Giacinta Marescotti Nandya Kirana Permatadewi</span>
                    <span>NIM: 215314211</span>
                </div>
            </div>
        </header>

        <h1>Todo List</h1>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <input type="text" name="task" placeholder="Add a new task" required>
            <button type="submit" class="add">Add</button>
        </form>

        <ul>
            @foreach($todos as $todo)
                <li class="{{ $todo->completed ? 'task-completed' : '' }}">
                    <span>{{ $todo->task }}</span>
                    <div class="btn-group">
                        <form action="{{ route('todos.update', $todo) }}" method="POST" class="inline-form">
                            @csrf
                            @method('PATCH')
                            <button type="submit" name="completed" value="{{ $todo->completed ? '0' : '1' }}" class="done">
                                {{ $todo->completed ? 'Undo' : 'Done' }}
                            </button>
                        </form>
                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
