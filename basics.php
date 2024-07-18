
<?php
date_default_timezone_set('Asia/Kolkata');

$date_format='Y-m-d';

// future date
$FD=2;
$FM=2;
$FY=0;

$FDT=date($date_format,strtotime(" +$FD days +$FM months +$FY years "));
echo "past date ".$FDT;

$boxsize=$_REQUEST["hiddencontainer"];
echo $boxsize;
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <script>
    
    function datechange(){
    let Fecha_end_input = document.getElementById("#Fecha_end")

        let n =  new Date();
        let y = n.getFullYear();
        let m = n.getMonth() + 1;
        let d = n.getDate();
        if(m < 10)
           m = '0' + m.toString();
        else if(d < 10)
           d = '0' + d.toString();
        
        let minDate = y + '-' + m + '-' + d
        let maxDate = y + '-' + "0"+(parseFloat(0+m) + 1) + '-' + d
        
        Fecha_end_input.setAttribute("min",minDate)
        Fecha_end_input.setAttribute("max",maxDate)
        
    }

     
 
 
    </script> 
</head>
<body>
     <input type="date" name="date1" id="date1" max="<?=$FDT;?>" >  
     <br>
     Card number: <input type="text" onkeyup="testIt(this.value);" id="ifsc"/>

     <input type="text" name="bank" id="" value="<?php echo $arr->BANK;?>" >

     <input type="hidden" id="hiddencontainer" name="hiddencontainer"/>

<script>
  var myhidden = document.getElementById("hiddencontainer");
  myhidden.value=boxHeight;
</script>
</body>
</html>