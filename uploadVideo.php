
<?php
require_once 'vendor/autoload.php';
use Google\Cloud\Datastore\DatastoreClient;
use Google\Cloud\Storage\StorageClient;

session_start();
$userID = $_SESSION['user'];
//require_once 'vendor/autoload.php';



//use Google\Cloud\Datastore\DatastoreClient;

//use Google\Cloud\Storage\StorageClient;


$datastore = new DatastoreClient([
    'projectId' => 'task2-272810'
]);

//信息 上传datastore
if (array_key_exists('title', $_POST) && array_key_exists('category', $_POST) ) {
    $title = $_POST['title'];
    $category = $_POST['category'];

if ($title == null || !$title){
    echo "Please enter title";
} elseif($category == null || !$category){
    echo "Please enter category";
} else{
    $key = $datastore->key('video');
    $entity = $datastore->entity($key, [
        'title' => $title,
        'category' => $category,
        'date' => new DateTime(),
        'owner' => $userID,
        'num_of_view' => 0,
        'number_of_like' => 0,
    ]);

    $datastore->insert($entity);
    echo "upload done!";
}

}

//视频文件 上传storage
$storage = new StorageClient();

$fileName = $_FILES[$_POST["video"]]['name'];

$file = fopen(pathinfo($fileName), 'r');

$bucket = $storage->bucket("ccassvideo");

$object = $bucket->upload($file, [
    'name' => $_POST["video"]
]);




?>


<html>
<body>

<form action="/uploadVideo" method="post">
    Video title: <input type="text" name="title"><br>
    Category:    <input type="text" name="category"><br>
    Upload：     <input type="file" name="video" /><br>
    <input type="submit">
</form>

</body>
</html>