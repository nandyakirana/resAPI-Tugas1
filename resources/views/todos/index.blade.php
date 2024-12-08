<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f2f2f2;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 600px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(255, 0, 255, 0.5), 0 0 30px rgba(0, 255, 255, 0.5);
        }

        h1 {
            text-align: center;
            color: #007bff;
            text-shadow: 0 0 8px #ff66cc, 0 0 15px #ff66ff;
        }

        .profile {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
            box-shadow: 0 0 8px #ff66cc;
        }

        .profile-info {
            color: #333;
        }

        .profile-info p {
            margin: 0;
            font-size: 14px;
        }

        form {
            display: flex;
            margin-bottom: 20px;
        }

        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            color: #333;
            outline: none;
            box-shadow: inset 0 0 8px rgba(0, 191, 255, 0.5);
        }

        button {
            padding: 10px 20px;
            margin-left: 10px;
            background: linear-gradient(45deg, #ff66cc, #3399ff);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 12px #ff66cc, 0 0 15px #3399ff;
        }

        button:hover {
            background: linear-gradient(45deg, #3399ff, #ff66cc);
            box-shadow: 0 0 18px #3399ff, 0 0 25px #ff66cc;
        }

        .todo-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .todo-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.1);
            position: relative;
        }

        .todo-item p {
            margin: 0;
            color: #333;
            flex-grow: 1;
        }

        .todo-item.done p {
            text-decoration: line-through;
            color: #999;
        }

        .todo-item .status {
            margin-left: 10px;
            color: #333;
            font-size: 14px;
        }

        .todo-item.deleted .status {
            color: #f44336;
        }

        .btn-done {
            background: linear-gradient(45deg, #4caf50, #66bb6a);
            box-shadow: 0 0 8px #66bb6a;
        }

        .btn-done:hover {
            box-shadow: 0 0 16px #66bb6a;
        }

        .btn-delete {
            background: linear-gradient(45deg, #e57373, #f44336);
            box-shadow: 0 0 8px #f44336;
        }

        .btn-delete:hover {
            box-shadow: 0 0 16px #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile">
            <img src="{{ asset('image/profile.jpg') }}" alt="Profile">
            <div class="profile-info">
                <p>Nama: Giacinta Marescotti Nandya Kirana Permatadewi</p>
                <p>NIM: 215341211</p>
            </div>
        </div>

        <h1>Todo List</h1>

        <form action="{{ url('todolist') }}" method="POST">
            @csrf
            <input type="text" id="task" name="task" placeholder="Add a new task" required>
            <button type="submit">Add</button>
        </form>

        <ul class="todo-list">
            @foreach ($todos as $todo)
                <li class="todo-item" id="todo-{{ $todo->id }}">
                    <p>{{ $todo->task }}</p>
                    <div>
                        <form action="{{ url('todolist/'.$todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn-done" onclick="updateStatus(event, {{ $todo->id }})">Done</button>
                        </form>
                        <form action="{{ url('todolist/'.$todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="deleteTask(event, {{ $todo->id }})">Delete</button>
                        </form>
                    </div>
                    <div class="status"></div>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        function updateStatus(event, id) {
            event.preventDefault();
            const todoItem = document.getElementById('todo-' + id);
            const status = todoItem.querySelector('.status');
            todoItem.classList.add('done');
            status.textContent = 'Task Completed';
            status.style.display = 'inline';
        }

        function deleteTask(event, id) {
            event.preventDefault();
            const todoItem = document.getElementById('todo-' + id);
            const status = todoItem.querySelector('.status');
            todoItem.classList.add('deleted');
            status.textContent = 'Task Deleted';
            status.style.display = 'inline';
        }
    </script>
</body>
</html>
