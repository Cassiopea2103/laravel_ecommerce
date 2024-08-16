<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    
    <!-- Logout option -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <input 
            type="submit"
            value="LOGOUT"
        />
    </form>

    <!-- ABANNER MESSAGE : -->
    <h1>Admin Dashboard pannel</h1>

</body>
</html>