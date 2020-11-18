<?php 

if (!empty($_FILES['avatar']['name'][0])){
    $files = $_FILES['avatar'];
    $upload = array();
    $failed = array();
    $extensionAllowed = array('jpg', 'jpeg', 'png', 'gif');

    foreach($files['name'] as $position => $file_name){
        $file_tmp = $files['tmp_name'][$position];
        $file_size = $files['size'][$position];
        $file_error = $files['error'][$position];

        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        if(!in_array($file_ext, $extensionAllowed)) {
            echo "Not supported";
        } else {
            if($file_size > 1000000) {
                echo "too big";
            } else {
                $file_name_new = uniqid('', false) . '.' . $file_ext;
                $file_destination = 'uploads/'.$file_name_new;
                if(move_uploaded_file($file_tmp, $file_destination)){
                $upload[$position] = $file_destination;
                echo "Upload Effectué !";
                header('Location: index.php');
                }
            }
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="imageUpload">Upload an profile image</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type="file" name="avatar[]" multiple="multiple" id="imageUpload" />
    <button type="submit" value="upload">Submit</button>
</form>

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
