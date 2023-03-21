<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
    <div>
        <!-- Navbar -->

        <!-- // Navbar -->

        <div>
            <form method="POST" action="/doctors/register">
                <h2>Register on lifeBlog</h2>

                <input type="text" name="name" placeholder="name">
                <br>
                <br>
                <input type="text" name="gender" placeholder="gender">
                <br>
                <br>
                <input type="email" name="email" placeholder="Email">
                <br>
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <br>
                <label for="specialist"> SELECT SPECIALIST</label>

                <select name="specialist">
                    <option value="pneumologue">pneumologue</option>
                    <option value="dentist">dentist</option>
                    <option value="psychiatre">psychiatre </option>
                    <option value="cardiologue">cardiologue</option>
                </select>
                <br>
                <br>
                <button type="submit" class="btn" name="reg_user">Register</button>
                <p>
                    Already a member? <a href="/doctors/login">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>