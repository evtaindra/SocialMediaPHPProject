<?php
// Login Query function
function loginQuery($UserId, $Password) {

    $dbConnection = parse_ini_file("db_connection.ini");
    extract($dbConnection);
    $myPdo = new PDO($dsn, $user, $password);
    $sql = 'SELECT UserId, Name FROM Users WHERE UserId = :userId AND Password = :password';
    $pStatment = $myPdo->prepare($sql);
    $pStatment->execute(array('userId' => $UserId, 'password' => $Password));
    $data = $pStatment->fetch();

    if ($data)
        return data;
    else
        return FALSE;
}
?>