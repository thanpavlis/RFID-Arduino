<?php
include '../functions.php';
$ok = true;
$temp = false;
if (isset($_POST['uid'])) {
    $conn = new mysqli("localhost", "root", "centos@$#18211993", "arduino");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->query("SET NAMES 'utf8'");
    $conn->query("SET CHARACTER SET 'utf8'");


    $sql = "SELECT uid FROM xrhstes WHERE uid='" . $_POST['uid'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $ok = false;
    } else {
        $sql = "INSERT INTO xrhstes(uid,name,last) VALUES ('" . $_POST['uid'] . "','" . $_POST['name'] . "','" . $_POST['last'] . "')";
        $conn->query($sql);
        $temp = true;
    }
    $conn->close();
}
?>
<html>
    <head>
        <title>Εγγραφή</title>
        <?php styles(); ?>
        <style>
            .container {
                margin-top:100px;
                width:400px;
            }
        </style>
        <?php if (($ok == true) && ($temp == true)) { ?>
            <script>
                alert("Επιτυχής καταχώρηση χρήστη !!!");
            </script>
        <?php } ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="box">
                    <center><h2>Εγγραφή Χρήστη</h2></center><br>
                    <?php if (!$ok) { ?>
                        <div class="alert alert-danger" role="alert">Το UID είναι ήδη καταχωρημένο !</div>
                    <?php } ?>  
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="uid">UID (Μοναδικός κωδικός χρήστη - tag)</label>
                            <input name="uid" type="text" class="form-control" id="uid" placeholder="UID" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Όνομα</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Όνομα Χρήστη" required>
                        </div>
                        <div class="form-group">
                            <label for="last">Επώνυμο</label>
                            <input name="last" type="text" class="form-control" id="last" placeholder="Επώνυμο Χρήστη" required>
                        </div>
                        <center><button type="submit" class="btn btn-default">Εγγραφή</button></center>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>