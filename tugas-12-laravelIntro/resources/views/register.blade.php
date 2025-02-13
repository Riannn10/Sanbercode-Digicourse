<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <h3>Sign Up Form</h3>
    <form action="/welcome"method="POST">
        @csrf
        <label>First Name:</label> <br> <br>
        <input type="text" name="First Name" required> <br> <br>

        <label> Last Name:</label> <br>
        <input type="text" name="Last Name"> <br> <br>

        <label>Gender:</label> <br> <br>
        <input type="radio" name="Gender" value="1"> Laki Laki <br>
        <input type="radio" name="Gender" value="2"> Perempuan <br>
        <input type="radio" name="Gender" value="3"> Other <br> <br>

        <label>Nationality:</label> <br> <br>
        <select name="Nationality">
            <option value="1">Indonesia</option>
            <option value="2">US</option>
            <option value="3">Rusia</option>
        </select> <br><br>

        <label>Language Spoken:</label> <br><br>
        <input type="checkbox" name="Language Spoken" value="1">Bahasa Indonesia <br>
        <input type="checkbox" name="Language Spoken" value="2">English <br>
        <input type="checkbox" name="Language Spoken" value="3">Other <br> <br>

        <label>Bio</label> <br>
        <textarea name="Bio" id="" cols="30" rows="10"></textarea> <br> <br>
        <button type="submit">Sumbit</button>


    </form>
</body>
</html>