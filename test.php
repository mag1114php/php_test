<?php
error_reporting(0);
/* Задание 1  */
$news="Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia"; //переменная новость
$link="more.php" ; // некоторая ссылка на новость
/* Обрезка */
$b=substr($news,0,179)."...";
$b=explode(" ",$b); // разбив строки на слова
$count=count($b);// кол-во элментов в массиве
$replace_word=$b[$count-2]." ".$b[$count-1]; // строка на место старой
$b=str_replace(array($b[$count-1],$b[$count]),"<a href=$link>$replace_word</a>",$b); // после замены
$b=implode(" ",$b); // объединяем массив в строку 
/* Конец задание 1  */

/* Задание 2 */
// файл и новый размер
$uploaded_file="test.png";  //путь картинки
$src=imagecreatefrompng($uploaded_file); // грузим картинку
$size=getimagesize($uploaded_file); // получаем размеры
$width=$size[0]; //ширина
$height=$size[1]; // высота
$k1=$width/200; // кэф ширины
$k2=$height/100; // кеф высоты
$new_w=$width/$k1; // нужная ширина
$new_h=$height/$k2; // нужная высота
$tmp=imagecreatetruecolor($new_w,$new_h); // создание пустой картинки
$filename="small.png"; // название новый картикни
imagecopyresampled($tmp,$src,0,0,0,0,$new_w,$new_h,$width,$height); // копирование картинки
imagepng($tmp,$filename,9); // выгрузка картинки
/* Конец задание 2 */

/* Задание 4 */
$random_massive=[]; // объявляем массив
$result=[];//массив резуьтатов
for($i=0;$i<=99;$i++){
  if ($i>30){  // для проверки заполним значениями 30
    $random_massive[$i]=30;
  }
  else if(($i>5) and ($i<=10)){  // для проверки заполним значениями 15
    $random_massive[$i]=15;
  }
  else{
  $random_massive[$i]=rand(0,100); // заполяняем массив рандомными числами
  }
  
}
$temp=1;
for($i=0;$i<=99;$i++){
  if($random_massive[$i]==$random_massive[$i+1]){
    $temp+=1;
  }
  else{
    array_push($result,$temp);
    $temp=1;
  }
  
}

/* Конец Задание 4 */
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title></title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <!--Вывод задание 1 -->
  <h1> Задание 1 </h1>
     <p><?=$news;?> </p>
     <a href=<?=$link;?>> Полный текст  </a>
     <h4> Отформатированный текст </h4>
     <p> <?=$b;?></p>
     <hr>
   <!--Конец  Вывод задание 1 -->  
   
   <!--Вывод задание 2 -->
  <h1>Задание 2  </h1>
    <h4>Сжатая картинка 200*100</h4>
    <img src="small.png" />
    <hr>
   <!--Конец Вывод задание 2 -->

     <!--Вывод задание 3 -->
  <h1>Задание 3  </h1>
    <p>Чем отличаются эти запросы:
1. SELECT * FROM a, b WHERE a.id=b.a_id;
2. SELECT * FROM a JOIN b ON a.id=b.a_id; </p>
<p> Эти 2 запроса семантически идентичны. С помощью соединения предикаты могут быть указаны в предложениях JOIN или WHERE. </p>
   <!--Конец Вывод задание 3 -->

   <!-- Вывод Задание 4-->
   <h1> Задание 4 </h1>
   <ul style="list-style:none;">
     <?php foreach($result as $item):?>
      <li style="display:inline"> <?=$item?> </li>
     <?php endforeach;?>
     </ul>  
   <!--Конец Задание 4-->
</body>
</html>