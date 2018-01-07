<!DOCTYPE html>
<!--
Windjy Jean, Sarah Liu, Faizan Alam
CST8257 - Web Applications Development
PHP Social Media Project
-->

<body>
    <?php include ("./CommonFiles/Header.php"); ?>
    <div class="container">
        <h1 style="text-align: center">Add Friend</h1><br>
        <p class="text-center">Welcome <b>(insert name here)</b>! (Not you? Change user <a href="(insertlinkhere)">here</a>.)</p>
        <p class="text-center">Enter the ID of the user you want to add as a friend.</p><br>

        <form class="form-horizontal col-lg-offset-2" id="depositForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="id" class="col-lg-1 col-lg-offset-1 control-label" style="text-align: left">ID:</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
                </div>
                <div class="col-lg-6 text-danger">
                    <button class="btn btn-primary" type="submit" name="submit">Send Friend Request</button>
                    <?php echo $iderrormsg ?>
                </div>                        
            </div>
            <br>
        </form>
    </div>
    <?php include ("./CommonFiles/Footer.php"); ?>
</body>