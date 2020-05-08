<?php
session_start();
$userID = $_SESSION['user'];
require_once 'vendor/autoload.php';

use Google\Cloud\Datastore\DatastoreClient;

$datastore = new DatastoreClient([
  'projectId' => 'task2-272810'
]);

if (array_key_exists('name', $_POST)  ){
    $name = $_POST['name']; 

    if ($name == null || !$name){
        echo "User name cannot be empty";
    }else{
        $key = $datastore->key('user', $userID);
        $entity = $datastore->lookup($key);
        $entity['name'] = $name;
        $datastore->update($entity);
        echo '<script language=javascript>window.location.href="/main"</script>';
    }

}

?>



<html>
<body>

<form action="/name" method="post">
    New user name : <input type="text" name="name"><br>
    <input type="submit">
</form>

</body>
</html>