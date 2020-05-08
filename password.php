<?php
session_start();
$userID = $_SESSION['user'];
require_once 'vendor/autoload.php';

use Google\Cloud\Datastore\DatastoreClient;

$datastore = new DatastoreClient([
  'projectId' => 'task2-272810'
]);

if (array_key_exists('Opassword', $_POST) && array_key_exists('Npassword', $_POST)  ){
    $Opassword = $_POST['Opassword']; 
    $Npassword = $_POST['Npassword']; 

    if ($Opassword == null || !$Opassword){
        echo "Please enter the old password";
    }elseif($Npassword == null || !$Npassword){
        echo "Please enter the new password";
    }else{
        $key = $datastore->key('user', $userID);
        $entity = $datastore->lookup($key);
        
        if($entity['password'] == $Opassword) {
        $entity['password'] = $Npassword;
        $datastore->update($entity);
        echo '<script language=javascript>window.location.href="/login"</script>';
        }else{
            echo 'User password is incorrect';
        }
    }

}

?>



<html>
<body>

<form action="/password" method="post">
    Old password: <input type="password" name="Opassword"><br>
    New password: <input type="password" name="Npassword"><br>

    <input type="submit">
</form>

</body>
</html>