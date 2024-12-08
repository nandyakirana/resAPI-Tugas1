<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ToDo List</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .login-container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 0, 255, 0.5), 0 0 30px rgba(0, 255, 255, 0.5);
            width: 100%;
            max-width: 400px;
        }

        .login-container h1 {
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 0 0 10px #ff00ff, 0 0 20px #00ffff;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #fff;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.7);
            outline: none;
            box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .input-group input:focus {
            border-color: #ff00ff;
            box-shadow: 0 0 10px #ff00ff, 0 0 20px #00ffff;
        }

        .btn {
            padding: 10px 20px;
            background: linear-gradient(45deg, #ff00ff, #00ffff);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 0 15px #ff00ff, 0 0 25px #00ffff;
            display: inline-block;  /* Makes the button behave as an inline element */
        }

        .btn:hover {
            background: linear-gradient(45deg, #00ffff, #ff00ff);
            box-shadow: 0 0 20px #ff00ff, 0 0 30px #00ffff;
        }

        .error-msg {
            color: red;
            text-align: center;
            margin-top: 15px;
        }

    </style>
</head>
<body>

<div class="login-container">
    <h1>Login</h1>
    <form action="{{ url('login') }}" method="POST">
        @csrf
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>
        </div>
        <div style="text-align: right;"> <!-- This aligns the button to the right -->
            <button type="submit" class="btn">Login</button>
        </div>
    </form>

    @if ($errors->any())
        <div class="error-msg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

</body>
</html>
