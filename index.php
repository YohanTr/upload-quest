<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$path = "uploads/";
$it = new FilesystemIterator($path);
foreach ($it as $fileinfo) {
  $file_path = $path.$fileinfo->getFilename();
  $file_name = $fileinfo->getFilename();
  ?>
        <img class="img-file" src="<?=$file_path ?>" style="width = 100px"alt="Image">
        <h2><?= $file_name ?></h2>
        <?php
}
?>
</body>
</html>