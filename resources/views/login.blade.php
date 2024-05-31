<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Source Sans Pro', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .login-box {
            width: 360px;
            margin: 7% auto;
        }
        .login-logo a {
            color: #333;
            font-size: 2.1rem;
            text-align: center;
            display: block;
        }
        .card {
            background: #ffffff;
            border-radius: .25rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border: 1px solid rgba(0, 0, 0, 0.125);
            padding: 1.25rem;
        }
        .login-card-body {
            padding: 1.25rem;
        }
        .login-box-msg {
            margin: 0;
            text-align: center;
            padding: 0 20px 20px;
            font-size: 1rem;
        }
        .input-group {
            position: relative;
            display: flex;
            width: 100%;
            flex-wrap: nowrap;
            align-items: stretch;
        }
        .input-group .form-control {
            border-right: 0;
        }
        .input-group-append .input-group-text {
            background-color: #ffffff;
            border-left: 0;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .icheck-primary {
            display: block;
            position: relative;
            user-select: none;
            padding-left: 1.25rem;
        }
        .icheck-primary input {
            position: absolute;
            z-index: -1;
            opacity: 0;
        }
        .icheck-primary input:checked + label::before {
            background-color: #007bff;
            border-color: #007bff;
        }
        .icheck-primary label {
            margin-bottom: 0;
            cursor: pointer;
        }
        .icheck-primary label::before {
            content: '';
            display: inline-block;
            position: absolute;
            width: 18px;
            height: 18px;
            border: 1px solid #adb5bd;
            border-radius: .25rem;
            background-color: #fff;
            top: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box cart-animation border-animation">
            <h2>Mareta<br>Inventaris 18346</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $item)
                  <li>{{ $item }}</li>
                @endforeach
              </ul>
            </div>
            @endif
             <form action="#" method="post">
             @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="username" placeholder="Enter username" required="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
