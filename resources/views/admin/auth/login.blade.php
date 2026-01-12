<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Book car online</title>
    <link rel="stylesheet" href="{{ url('Assets/css/style.css') }}" class="rel">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
    <div class="wrapper">
        <div class="title">Login</div>

        @if ($errors->has('email'))
            <div class="alert alert-danger">
                {{ $errors->first('email') }}
            </div>
        @endif

        <form name="f1" onsubmit="return validation()" method="post">
            @csrf
            <div class="field">
                <input type="email" id="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="field">
                <input type="password" id="pass" name="password" required>
                <label>Password</label>
            </div>
            <div class="content">
                <div class="checkbox">
                </div>
            </div>
            <div class="field">
                <input type="submit" id="btn" value="Login">
            </div>
        </form>
    </div>

    <script>
        function validation() {
            var id = document.f1.email.value;
            var ps = document.f1.pass.value;
            if (id.length == "" && ps.length == "") {
                alert("User Email and Password fields are empty");
                return false;
            } else {
                if (id.length == "") {
                    alert("User Email is empty");
                    return false;
                }
                if (ps.length == "") {
                    alert("Password field is empty");
                    return false;
                }
            }
        }
    </script>

</body>

</html>
