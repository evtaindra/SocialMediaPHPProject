<?php include ("./CommonFiles/Header.php"); ?>
<!--
Windjy Jean, Sarah Liu, Faizan Alam
CST8257 - Web Applications Development
PHP Social Media Project
-->
<?php
// If user is logged in, assign Student object to $LoggedInUser, otherwise redirect to login and die (self-executing function)
if (!isset($_SESSION["LoggedInUserId"])) {
    header("Location: Login.php?returnUrl=".urlencode($_SERVER['REQUEST_URI']));
    die();
}

if ($_GET[deleteAlbumID]) {
    deleteAlbum($_GET[deleteAlbumID]);
    removeDirectory("Pictures/$_GET[deleteAlbumID]");
}

?>
<body>
    <div class="container">
        <form class="form-horizontal" id="accChangeForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1 style="text-align: center">My Albums</h1>
            <br />
            <p class="text-center">
                Welcome
                <b>
                    <?php
                    $Name = htmlspecialchars($_SESSION[LoggedInUserName]);
                    echo "$Name"; 
                    ?>
                </b>!
            (Not you? Change users
                <a href="<?php echo $directoryPrefix; ?>/Logout.php">here</a>.)
            </p>
            <br />
            <p class="col-lg-offset-10">
                <a href="AddAlbum.php">Create a New Album</a>
            </p>
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Date Updated</th>
                    <th>Number of Pictures</th>
                    <th>Accessibility</th>
                    <th></th>
                </tr>
                <?php
                // Print All Albums Portion
                // Get the album list
                $albumList = showAlbums($_SESSION["LoggedInUserId"]);
                $index = 0;
                if ($_POST) {
                    foreach ($albumList as $album) {
                        saveAccessibilityChanges($album[Album_Id], $_POST[accessibility . $index]);
                        $index++;
                    }
                }
                $index = 0;
                $albumList = showAlbums($_SESSION["LoggedInUserId"]);
                //var_dump($albumList);
                foreach ($albumList as $album) {
                $numOfPicInAlbum = countPicturesInAlbum($album[Album_Id]);
                $albumTitle = htmlspecialchars($album[Title]);
                echo <<< EOT
                <tr>
                <td id="$album[Album_Id]"><a href="MyPictures.php?albumID=$album[Album_Id]">$albumTitle</a></td>
                <td>$album[Date_Updated]</td>
                <td>$numOfPicInAlbum</td>
                <td>
                    <select class="form-control" id="accessibility$index" name="accessibility$index">
EOT;
                    if ($album[Accessibility_Code] == "shared") {
                        echo "<option value='private'>Accessible Only by Owner</option>";
                        echo "<option value='shared' selected>Accessible by Owner and Friends</option>";
                    }
                    else {
                        echo "<option value='private' selected>Accessible Only by Owner</option>";
                        echo "<option value='shared'>Accessible by Owner and Friends</option>";
                    }

                    echo "</select>";
                    echo "</td>";
                    echo "<td><a class='delete' href='?deleteAlbumID=$album[Album_Id]'>delete</a></td>";
                    $index++;
                }
                ?>
            </table>
            <input type="submit" name="btnSaveChanges" class="col-lg-2 col-lg-offset-9 btn btn-primary" id="btnSaveChanges" value="Save Changes" />
        </form>
    </div>
    <?php include ("./CommonFiles/Footer.php"); ?>
    <script>
        $(document).ready(function () {
            $(".delete").on("click", function () {
                return confirm("Are you sure? All pictures in the album will be deleted as well!");
            });
        });
    </script>
</body>
