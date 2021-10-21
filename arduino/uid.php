<?php
include '../functions.php';
?>
<html>
    <head>
        <title>Αποστολή</title>
        <?php styles(); ?>
        <style>
            .container {
                margin-top:100px;
                width:400px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="box">
                    <center><h2>Αποστολή UID</h2></center><br>
                    <form method="post" action="insert_uid.php">
                        <div class="form-group">
                            <label for="uid">UID (Μοναδικός κωδικός χρήστη - tag)</label>
                            <input name="uid" type="text" class="form-control" id="uid" placeholder="UID" required>
                        </div>
                        <center><button type="submit" class="btn btn-default">Αποστολή</button></center>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

