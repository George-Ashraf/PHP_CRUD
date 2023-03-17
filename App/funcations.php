<?php

function testmessage($condation, $message)
{
    if ($condation) {
        echo "<div class='alert alert-success mx-auto col-6'>
    $message done
</div>";
    } else {
        echo "<div class='alert alert-danger mx-auto col-6'>
    $message failed
</div>";
    }
}
function path($go)
{
    echo "<script>
window.location.replace('/lec36crud/$go')
</script>";
}
// 1:11:17
function Auth($rule1=null,$rule2=null)
// optionalلكي يكونوا nullلقد تمت مساوتهم ب
{
    if ($_SESSION['admin']) {
        if ($_SESSION['admin']['rule'] == 1|| $_SESSION['admin']['rule'] == $rule1 || $_SESSION['admin']['rule'] == $rule2 ) {
        }
         else {
            path("public/notauth.php");
        }
    } 
    
    else {
        path("admin/login.php");
    }
}
/**
 * validation steps
 * 1-filteration
 * filter result تقوم بأرسال trim 
 * تقوم بنزع المسافات من اخر الكلام واوله
 * html tagsتقوم بأبطال مفعول htmlspecialchars
 *نهائياhtml tags تقوم بمسح strip_tags
 * 
 * 
 * bool resultوليس 
 * 2-bool result
 * empty مثل  bool resultتقوم بأرسال functionاي 
 * 
 * 
 */


function filtervalidation($inputvalue){
$inputvalue=trim($inputvalue);
$inputvalue= htmlspecialchars($inputvalue);
$inputvalue=strip_tags($inputvalue);
$inputvalue=stripslashes($inputvalue);

return $inputvalue;

}

function strvalid($inputvalue){
    $empty=empty($inputvalue);
    // تقوم بأرسال عدد الاحرف التي كتبتهاstrlen
    $lenght=strlen($inputvalue)<3;

     if($empty==true || $lenght ==true){
        return true;
     
    }
    else{
        return false;
    }

}

function numvalid($inputvalue){
    $empty=empty($inputvalue);
    $isnumber= filter_var($inputvalue,FILTER_VALIDATE_INT)==false ;
    $isnegative= $inputvalue<0 ;

    // FILTER_VALIDATE_INT
    // trueبcondation يبقي الfalse ده طلع ب
    //  سواء علي رقم او دونمين او ايميل او فلوت والمزيد هناfilterتقوم بعمل 
    // https://www.php.net/manual/en/filter.filters.validate.php
    // تقوم بأرسال عدد الاحرف التي كتبتهاstrlen

     if($empty==true || $isnumber==true || $isnegative==true ){
        return true;
     
    }
    else{
        return false;
    }

}
// check file size
function validfilesize($filesize ,$size){
    $file_validation_size=($filesize/1024)/1024;
// megabyteهكذا ينتج الحجم بال

if($file_validation_size>$size){
    return true;
}
else{
    return false;
}
}
// check file type
function validimgtype($imginput){
if($imginput=="image/jpeg"||$imginput=="image/jpg"||$imginput=="image/png"||$imginput=="image/jif")
return false;
// لو الحاجات دي تمام اخرج
else{
    return true;
}
}

