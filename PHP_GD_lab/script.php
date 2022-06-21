<?php
if ($_FILES && $_FILES["userfile"]["error"]== UPLOAD_ERR_OK)
{
    $name = "uploads/" .$_FILES["userfile"]["name"];
    move_uploaded_file($_FILES["userfile"]["tmp_name"], $name);
    echo "Файл загружен";
}
else {
	echo"Не удалось загрузить файл";
}
?>
<a href="redirect.php"> Перейти к обработке фотографии</a>