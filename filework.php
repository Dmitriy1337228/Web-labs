<?php
header('Content-type: image/jpeg');
$dir = 'uploads/';

$choose = $_POST['choose'];

if ($choose == "negate"){
$file = scandir($dir);
for ($i = 0; $i < count($file); $i++) { // Перебираем все файлы
    if (($file[$i] != ".") && ($file[$i] != "..")) { // Текущий каталог и родительский пропускаем
		$path = $dir.$file[$i]; // Получаем путь к картинке
		$im = imagecreatefromjpeg($path);
		if (imagefilter($im, IMG_FILTER_NEGATE)) {
			imagejpeg($im);
		     //echo "<img src='$path' alt=''/>"; // Вывод превью картинки 
		}
	}
}	
}
if ($choose == "rotatel"){
$file = scandir($dir);
for ($i = 0; $i < count($file); $i++) { // Перебираем все файлы
    if (($file[$i] != ".") && ($file[$i] != "..")) { // Текущий каталог и родительский пропускаем
		$path = $dir.$file[$i]; // Получаем путь к картинке
		$im = imagecreatefromjpeg($path);
		 if (imagerotate($im, 90, 40)){
			 $rotate = imagerotate($im, 90, 40);
			 imagejpeg($rotate);
			//imagejpeg($im, $path);
			//echo "<img src='$path' alt=''/>"; // Вывод превью картинки 
		 }
	}
}	
}
if ($choose == "rotater"){
$file = scandir($dir);
for ($i = 0; $i < count($file); $i++) { // Перебираем все файлы
    if (($file[$i] != ".") && ($file[$i] != "..")) { // Текущий каталог и родительский пропускаем
		$path = $dir.$file[$i]; // Получаем путь к картинке
		$im = imagecreatefromjpeg($path);
		 if (imagerotate($im, 270, 40)){
			 $rotate = imagerotate($im, 270, 40);
			 imagejpeg($rotate);
			//imagejpeg($im, $path);
			//echo "<img src='$path' alt=''/>"; // Вывод превью картинки 
		 }
	}
}	
}
if ($choose == "black"){
$file = scandir($dir);
for ($i = 0; $i < count($file); $i++) { // Перебираем все файлы
    if (($file[$i] != ".") && ($file[$i] != "..")) { // Текущий каталог и родительский пропускаем
		$path = $dir.$file[$i]; // Получаем путь к картинке
		$im = imagecreatefromjpeg($path);
		
		$imgw = imagesx($im);
		$imgh = imagesy($im);
		
		for ($i=0; $i<$imgw; $i++) {
			for ($j=0; $j<$imgh; $j++) {

                // Get the RGB value for current pixel

                $rgb = ImageColorAt($im, $i, $j); 

                // Extract each value for: R, G, B

                $rr = ($rgb >> 16) & 0xFF;
                $gg = ($rgb >> 8) & 0xFF;
                $bb = $rgb & 0xFF;

                // Get the value from the RGB value

                $g = round(($rr + $gg + $bb) / 3);

                // Gray-scale values have: R=G=B=G

                $val = imagecolorallocate($im, $g, $g, $g);

                // Set the gray value

                imagesetpixel ($im, $i, $j, $val);
			}
		}
	imagejpeg($im);
	}
}
}
if ($choose == "flipH"){
$file = scandir($dir);
for ($i = 0; $i < count($file); $i++) { // Перебираем все файлы
    if (($file[$i] != ".") && ($file[$i] != "..")) { // Текущий каталог и родительский пропускаем
		$path = $dir.$file[$i]; // Получаем путь к картинке
		$im = imagecreatefromjpeg($path);
		if (imageflip($im, IMG_FLIP_HORIZONTAL)) {
			imagejpeg($im);
		     //echo "<img src='$path' alt=''/>"; // Вывод превью картинки 
		}
	}
}	
}
if ($choose == "flipV"){
$file = scandir($dir);
for ($i = 0; $i < count($file); $i++) { // Перебираем все файлы
    if (($file[$i] != ".") && ($file[$i] != "..")) { // Текущий каталог и родительский пропускаем
		$path = $dir.$file[$i]; // Получаем путь к картинке
		$im = imagecreatefromjpeg($path);
		if (imageflip($im, IMG_FLIP_VERTICAL)) {
			imagejpeg($im);
		     //echo "<img src='$path' alt=''/>"; // Вывод превью картинки 
		}
	}
}	
}

imagedestroy($im);
?>
