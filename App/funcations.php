<?php

function testmessage($condation,$message){
if($condation)
{
echo"<div class='alert alert-success mx-auto col-6'>
    $message done
</div>";
}
else{
    echo"<div class='alert alert-danger mx-auto col-6'>
    $message failed
</div>"; 
}
}
function path($go){
echo"<script>
window.location.replace('/lec36crud/$go')
</script>";
}

function Auth(){
    if(!$_SESSION['admin']){
        header("location:/lec36crud/admin/login.php");
    }
}

?>

