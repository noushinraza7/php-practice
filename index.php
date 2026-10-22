<!DOCTYPE html>
<html lang="en">
    <body>
        <h1>php example</h1>
        <form method="post">
            enter your name <input type="text" id="uname" name="username"><br>
            <button type="submit">Submit</button>
        </form>
        <?php 
            if(isset($_POST["username"])){
                $uname=htmlspecialchars($_POST['username']);
                echo "<h2>Hello, $uname!</h2>";
            }    
# hello !!!
        ?>
    </body>
</html>
