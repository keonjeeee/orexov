<form>
<select name="year">
<?php
for($i=1997;$i<=2017;$i++){
    echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select>
<select name="month">
<?php
$m = ["12"=>"декабрь","11"=>"ноябрь","10"=>"октябрь","9"=>"сентябрь","8"=>"август","1"=>"январь","7"=>"июль","6"=>"июнь","5"=>"май","4"=>"апрель","3"=>"март","2"=>"февраль"];
$w = ["1"=>"понедельник","2"=>"вторник","3"=>"среда","4"=>"четверг","5"=>"пятница","6"=>"суббота","0"=>"воскресенье"];
for($i=1;$i<=12;$i++){
    echo '<option value="'.$i.'">'.$m[$i].'</option>';
}
?>
</select>
<input type="submit" value="просчитать">
</form>
<?php
if(isset($_GET['year'])&& isset($_GET['month'])){
    $month = $_GET['month'];
    $year = $_GET['year'];
    $final_date = date("t",mktime(0,0,0,$month,1,$year));
    $final = mktime(0,0,0,$month,$final_date,$year);
    $start = mktime(0,0,0,$month,1,$year);
    
    for($i=$start;$i<=$final;$i=$i+(3600*24)){
        $v = $i+(3600*24*6);
        if(date("w",$i)==1 && date("w",$v)==0 && date("M",$v)==date("M",$i)){
            $nedelya++;
        }
        if(date("w",$i)==2){
            $vtornik++;
        }
    }
    echo $w[date("w",$start)]."- Начало месяца <br>";
    echo $w[date("w",$final)]."- Конец месяца<br>";
    echo $vtornik." - вторников<br>";
    echo $nedelya." - Полных недель";
}
?>