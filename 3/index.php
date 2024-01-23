<form method="post">
<input type="text" name="mark" placeholder="марка">
<input type="text" name="model" placeholder="модель">
<select name="year">
    <option>Год</option>
<?php
for($i=1975;$i<2005;$i++){
    echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select>
<input type="text" name="price" placeholder="стоимость">
<input type="submit" value="сохранить">
</from>
<?php
if(!empty($_POST)){
    $data["mark"]=$_POST["mark"];
    $data["model"]=$_POST["model"];
    $data["year"]=$_POST["year"];
    $data["price"]=$_POST["price"];
    file_put_contents("cars.txt", serialize($data)."-",FILE_APPEND);
}
if(isset($_GET['view'])){
    $view = explode("-",file_get_contents("cars.txt"));
    echo '<table border="1"cellpadding="5">';
    echo '<th>mark</th><th>model</th><th>year</th><th>price</th>';
    foreach($view as $key=>$val){
        $us=unserialize($val);
        echo '<tr>';
        foreach($us as $key=>$val){
            echo '<td>'.$val.'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
?>
<a href="?view">посмотреть данные</a>