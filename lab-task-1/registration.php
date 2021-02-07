<!DOCTYPE html>
<html>

<head>
    <title>registration page</title>
</head>

<body>
    <h1>my registration page</h1>
    <form>
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="firstNmae" /></td>
                <td></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" /></td>
            </tr>
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="userName" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirmPassword" /></td>
            </tr>
        </table>
        Gender:
        <br>
        <input type="radio" name="gender" id="male" value="male" />
        Male
        <input type="radio" name="gender" id="female" value="female" />
        Female
        <input type="radio" name="gender" id="other" value="other" />
        other
        <br>
        Date of birth:
        <br>
        <input type="date" id="birthday" name="birthday">
        <br>
        <br>
        <input type="submit" value="submit">
        <input type="reset" value="reset">
    </form>
</body>

</html>