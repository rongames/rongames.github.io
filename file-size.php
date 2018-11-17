<h2>Check file size</h2>

<form action="" method="post">
   Directory Path: <input type="text" name="path"> &nbsp; <input type="submit" value="submit">
</form>
<br>

<?php


// function to check file size
function folderSize($dir)
{
    $size = 0;
    foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : folderSize($each);
    }
    return $size;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   echo "<h4>Total Size ", folderSize($_POST["path"]), "bytes.</h4>";

}

?>
