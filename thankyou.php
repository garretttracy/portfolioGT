<?php
$visitor_fname = filter_input(INPUT_POST, 'firstName');
$visitor_lname = filter_input(INPUT_POST, 'lastName');
$visitor_msg = filter_input(INPUT_POST, 'custExp');
/* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg;  */

// Validate inputs
if ($visitor_fname == null) {
    $error = "Invalid input data. Check firstname and try again.";
    /* include('error.php'); */
    echo "Form Data Error: " . $error;
    
}
if ($visitor_lname == null) {
    $error = "Invalid lastname. Check all fields and try again.";
    /* include('error.php'); */
    echo "Form Data Error: " . $error;
    
}
if ($visitor_msg == null) {
    $error = "Invalid input data. Check comment and try again.";
    /* include('error.php'); */
    echo "Form Data Error: " . $error;
    
} else {
    $dsn = 'mysql:host=localhost;dbname=gtportfoliodb';
    $username = 'root';
    $password = 'Pa$$w0rd';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        /* include('database_error.php'); */
        echo "DB Error: " . $error_message;
        exit();
    }

    // Add the product to the database  
    $query = 'INSERT INTO visitor
                         (visitor_fname, visitor_lname, visitor_msg)
                      VALUES
                         (:firstName, :lastName, :custExp)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $visitor_fname);
    $statement->bindValue(':lastName', $visitor_lname);
    $statement->bindValue(':custExp', $visitor_msg);
    $statement->execute();
    $statement->closeCursor();
    /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg; */
}
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Eva Jones Design</title>
        <style type="text/css">
            @import url("CSS/stylesheet.css");
            body {
                background-image: url(images/bkgdContact.jpg);
            }
        </style>
        <!-- Mobile -->
        <link href="CSS/mobile.css" rel="stylesheet" type="text/css" media="only screen and (max-width:800px)">
        <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
        <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    </head>

    <body>
        <div id="logo"><img src="images/logo.png" width="220" height="103" alt="Eva Jones Design"></div>
        <nav>
            <ul id="MenuBar1" class="MenuBarHorizontal">
                <li><a href="index.html">home</a>    </li>
                <li><a href="about.html">about</a></li>
                <li><a href="portfolio.html">portfolio</a>    </li>
                <li><a href="contact.html">contact</a></li>
            </ul>
        </nav>
        <header>
            <h1>contact <span class="fancy">Eva Jones</span></h1>
        </header>
        <section>
            <h2>Thank you for contacting me! I will get back to you shortly.</h2>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <p>&nbsp;</p>
        </section>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <h1>&nbsp;</h1>
        <h2>&nbsp;</h2>
        <script type="text/javascript">
            var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown: "SpryAssets/SpryMenuBarDownHover.gif", imgRight: "SpryAssets/SpryMenuBarRightHover.gif"});
        </script>
    </body>
</html>
