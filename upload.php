<?php 
    include("dbcon.php");
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Register</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    
    <?php
        if(isset($_POST['upload_submit'])){
            //details_of_trainee
            $name = filter_input(INPUT_POST, 'name');
            $dob = filter_input(INPUT_POST,'dob');
            $gender=filter_input(INPUT_POST,'gender');
            $category=filter_input(INPUT_POST,'category');
            $address=filter_input(INPUT_POST,'address');
            $mobile=filter_input(INPUT_POST,'mobile');
            $email=filter_input(INPUT_POST,'email');
            $pname=filter_input(INPUT_POST,'pname');
            $poccupation=filter_input(INPUT_POST,'poccupation');
            $designation=filter_input(INPUT_POST,'designation');
            $cpf=filter_input(INPUT_POST,'cpf');
            $section=filter_input(INPUT_POST,'section');
            $location=filter_input(INPUT_POST,'location');
            $pmobile=filter_input(INPUT_POST,'pmobile');
            $ptelephone=filter_input(INPUT_POST,'ptelephone');
            $guardian=filter_input(INPUT_POST,'guardian');
            
            
            //academic_details
            $institute=filter_input(INPUT_POST,'institute');
            $course=filter_input(INPUT_POST,'course');
            $sem=filter_input(INPUT_POST,'sem');
            $sem_value=filter_input(INPUT_POST,'sem_value');
            $cgpa=filter_input(INPUT_POST,'cgpa');
            $cgpa_value=filter_input(INPUT_POST,'cgpa_value');
            $percentage=filter_input(INPUT_POST,'percentage');
            

            //documents
            $flag=0;
            $target_dir = "Documents/";
            $str = $email;
            $s = explode("@",$str);
            array_pop($s); #remove last element.
            $s = implode("@",$s);
            
            //photo
                $s1=$s."-Photo";
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $uploadOk = 1;
                $imageFileType1 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $new_target_file1=$target_dir.$s1.".".$imageFileType1;
                

            //training
                $s2=$s."-Training";
                $target_file = $target_dir . basename($_FILES["training"]["name"]);
                $uploadOk = 1;
                $imageFileType2 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $new_target_file2=$target_dir.$s2.".".$imageFileType2;
                
            //gpasheet
                $s3=$s."-Gpasheet";
                $target_file = $target_dir . basename($_FILES["gpasheet"]["name"]);
                $uploadOk = 1;
                $imageFileType3 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $new_target_file3=$target_dir.$s3.".".$imageFileType3;
                
            //intermediate
                $s4=$s."-Intermediate";
                $target_file = $target_dir . basename($_FILES["intermediate"]["name"]);
                $uploadOk = 1;
                $imageFileType4 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $new_target_file4=$target_dir.$s4.".".$imageFileType4;

            //categorycertificate
            if ($_POST['category']!='general'){
                $flag=1;
                $s5=$s."-Categorycertificate";
                $target_file = $target_dir . basename($_FILES["categorycertificate"]["name"]);
                $uploadOk = 1;
                $imageFileType5 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $new_target_file5=$target_dir.$s5.".".$imageFileType5;
            }
            else {
                $flag=0;
            }
            
            // Check if image file is a actual image or fake image
            if($flag==1){
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["photo"]["tmp_name"]) && getimagesize($_FILES["training"]["tmp_name"]) && getimagesize($_FILES["gpasheet"]["tmp_name"]) && getimagesize($_FILES["intermediate"]["tmp_name"]) && getimagesize($_FILES["categorycertificate"]["tmp_name"]);
                    if($check !== false) {
                    $uploadOk = 1;
                    
                } else {
                    $result= "File is not an image.";
                    $uploadOk = 0;
                    }
                }
            }
            else if($flag==0){
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["photo"]["tmp_name"]) && getimagesize($_FILES["training"]["tmp_name"]) && getimagesize($_FILES["gpasheet"]["tmp_name"]) && getimagesize($_FILES["intermediate"]["tmp_name"]);
                    if($check !== false) {
                    $uploadOk = 1;
                    
                } else {
                    $result= "File is not an image.";
                    $uploadOk = 0;
                    }
                }
            }

            // Check if file already exists
            if ($flag==1){
                if(file_exists($new_target_file1) || file_exists($new_target_file2) || file_exists($new_target_file3) || file_exists($new_target_file4) || file_exists($new_target_file5)) {
                $result= "Sorry, already registered.";
                $uploadOk = 0;
                }
            }
            else if($flag==0){
                if(file_exists($new_target_file1) || file_exists($new_target_file2) || file_exists($new_target_file3) || file_exists($new_target_file4)) {
                $result= "Sorry, already registered.";
                $uploadOk = 0;
                }
            }

            // Check file size
            if($flag==1){
                if ($_FILES["photo"]["size"] > 1000000 || $_FILES["training"]["size"] > 1000000 || $_FILES["gpasheet"]["size"] > 1000000 || $_FILES["intermediate"]["size"] > 1000000 || $_FILES["categorycertificate"]["size"] > 1000000) {
                    $result= "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
            }
            else if($flag==0){
                if ($_FILES["photo"]["size"] > 1000000 || $_FILES["training"]["size"] > 1000000 || $_FILES["gpasheet"]["size"] > 1000000 || $_FILES["intermediate"]["size"] > 1000000) {
                    $result= "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
            }
            // Allow certain file formats
            if($flag==1){
                if(($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg") ||
                ($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") ||
                ($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg") ||
                ($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg") ||
                ($imageFileType5 != "jpg" && $imageFileType5 != "png" && $imageFileType5 != "jpeg")) {
                    $result= "Sorry, only JPG, JPEG & PNG files are allowed.";
                    $uploadOk = 0;
                    }
                }
            else if($flag==0){
                if(($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg") ||
                ($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") ||
                ($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg") ||
                ($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg")){
                    $result= "Sorry, only JPG, JPEG & PNG files are allowed.";
                    $uploadOk = 0;
                    }
                }
            
            // if everything is ok, try to upload file
            if ($uploadOk == 1) {
                
             
                if($flag==1){
                    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $new_target_file1) && move_uploaded_file($_FILES["training"]["tmp_name"], $new_target_file2) && move_uploaded_file($_FILES["gpasheet"]["tmp_name"], $new_target_file3) && move_uploaded_file($_FILES["intermediate"]["tmp_name"], $new_target_file4) && move_uploaded_file($_FILES["categorycertificate"]["tmp_name"], $new_target_file5)){
                    $sql = "INSERT INTO details_of_trainee (NAME,DOB,GENDER,CATEGORY,ADDRESS,MOBILE,EMAIL,PNAME,POCCUPATION,DESIGNATION,CPF,SECTION,LOCATION,PMOBILE,PTELEPHONE,GUARDIAN) 
                             VALUES ('$name','$dob','$gender','$category','$address','$mobile','$email','$pname','$poccupation','$designation','$cpf','$section','$location','$pmobile','$ptelephone','$guardian')";
                    $sql1 = "INSERT INTO academic_details (EMAIL,INSTITUTE,COURSE,`SEMESTER/YEAR`,`CGPA/PERCENTAGE`,`PERCENTAGE(10+2)`)
                            VALUES ('$email','$institute','$course','$sem-$sem_value','$cgpa-$cgpa_value','$percentage')";
                    $sql2 = "INSERT INTO documents (EMAIL,PHOTO,TRAINING_LETTER,CGPA_SHEET,INTER_MARKSHEET,CATEGORY_CERTIFICATE)
                            VALUES ('$email','$new_target_file1','$new_target_file2','$new_target_file3','$new_target_file4','$new_target_file5') ";
                    mysqli_query($con,$sql);
                    mysqli_query($con,$sql1);
                    mysqli_query($con,$sql2);
            
                    $result= "Registration successful";
                    } 
                }else 
                if($flag==0){
                    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $new_target_file1) && move_uploaded_file($_FILES["training"]["tmp_name"], $new_target_file2) && move_uploaded_file($_FILES["gpasheet"]["tmp_name"], $new_target_file3) && move_uploaded_file($_FILES["intermediate"]["tmp_name"], $new_target_file4)){
                        $sql = "INSERT INTO details_of_trainee (NAME,DOB,GENDER,CATEGORY,ADDRESS,MOBILE,EMAIL,PNAME,POCCUPATION,DESIGNATION,CPF,SECTION,LOCATION,PMOBILE,PTELEPHONE,GUARDIAN) 
                                 VALUES ('$name','$dob','$gender','$category','$address','$mobile','$email','$pname','$poccupation','$designation','$cpf','$section','$location','$pmobile','$ptelephone','$guardian')";
                        $sql1 = "INSERT INTO academic_details (EMAIL,INSTITUTE,COURSE,`SEMESTER/YEAR`,`CGPA/PERCENTAGE`,`PERCENTAGE(10+2)`)
                                VALUES ('$email','$institute','$course','$sem-$sem_value','$cgpa-$cgpa_value','$percentage')";
                        $sql2 = "INSERT INTO documents (EMAIL,PHOTO,TRAINING_LETTER,CGPA_SHEET,INTER_MARKSHEET)
                                VALUES ('$email','$new_target_file1','$new_target_file2','$new_target_file3','$new_target_file4') ";
                        mysqli_query($con,$sql);
                        mysqli_query($con,$sql1);
                        mysqli_query($con,$sql2);
                
                        $result= "Registration successful";
                    } 
                }
                else {
                    $result= "Something went wrong or already registered..";
                }
            }
        

        }
    ?>
    <div class="form-group jumbotron text-center"  style="margin-top:200px;margin-left:400px;width: 50%;height:30%;border: 3px solid green;text-align:center">
        <div class="col-sm-12 col-sm-offset-2">
            <?php echo $result; ?>    
        </div>
    </div>
</html>