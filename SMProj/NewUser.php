<!DOCTYPE html>
<!--
Windjy Jean, Sarah Liu, Faizan Alam
CST8257 - Web Applications Development
PHP Social Media Project
-->

<body>
    <?php include ("./CommonFiles/Header.php"); ?>
    <div class="container col-lg-8">
        <h1 style="text-align: center">Sign Up</h1>
        <p class="col-lg-offset-1">All fields are required.</p><br>

        <form class="form-horizontal" id="depositForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="name" class="col-lg-3 col-lg-offset-1 control-label" style="text-align: left">Student ID:</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="studentid" name="studentid" value="<?php echo $studentid; ?>">
                </div>
                <div class="col-lg-4 text-danger">
                    <?php echo $studentiderrormsg ?>
                </div>                        
            </div>
            <div class="form-group">
                <label for="postalcode" class="col-lg-3 col-lg-offset-1 control-label" style="text-align: left">Name:</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="col-lg-4 text-danger">
                    <?php echo $nameerrormsg ?>
                </div>    
            </div>
            <div class="form-group">
                <label for="phone" class="col-lg-3 col-lg-offset-1 control-label" style="text-align: left">Phone Number:
                    <br><label style="font-weight: normal">(nnn-nnn-nnnn)</label>
                </label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
                </div>
                <div class="col-lg-4 text-danger">
                    <?php echo $phoneerrormsg ?>
                </div>                         
            </div>
            <div class="form-group">
                <label for="password" class="col-lg-3 col-lg-offset-1 control-label" style="text-align: left">Password:</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
                </div>
                <div class="col-lg-4 text-danger">
                    <?php echo $passworderrormsg ?>
                </div>                         
            </div>
            <div class="form-group">
                <label for="password2" class="col-lg-3 col-lg-offset-1 control-label" style="text-align: left">Confirm Password:</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="password2" name="password2" value="<?php echo $password2; ?>">
                </div>
                <div class="col-lg-4 text-danger">
                    <?php echo $password2errormsg ?>
                </div>                         
            </div>
            <br>
            <div class="col-lg-offset-1">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                <button class="btn btn-primary" type="submit" name="reset">Clear</button>
            </div>
            <br>
        </form>
    </div>
    <?php include ("./CommonFiles/Footer.php"); ?>
</body>