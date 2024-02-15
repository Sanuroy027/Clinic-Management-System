
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="popup_style.css">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Admin Panel</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="#">
<meta name="keywords" content="Admin , Responsive">
<meta name="author" content="Nikhil Bhalerao +919423979339.">


<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
</head>
<body class="fix-menu">

<div class="theme-loader">
<div class="ball-scale">
<div class='contain'>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
</div>
</div>
</div>

<?php include('connect.php');
if(isset($_POST['btn_submit']))
{
    if(isset($_GET['editid']))
    {
        $sql ="UPDATE patient SET patientname='$_POST[patientname]',admissiondate='$_POST[admissiondate]',admissiontime='$_POST[admissiontime]',address='$_POST[address]',mobileno='$_POST[mobilenumber]',city='$_POST[city]',pincode='$_POST[pincode]',loginid='$_POST[loginid]',bloodgroup='$_POST[select2]',gender='$_POST[gender]',dob='$_POST[dateofbirth]' WHERE patientid='$_GET[editid]'";
        if($qsql = mysqli_query($conn,$sql))
        {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                  Success
                </h3>
                <p>User Record Updated Successfully</p>
                <p>
                 <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                 <?php echo "<script>setTimeout(\"location.href = 'view-patient.php';\",1500);</script>"; ?>
                </p>
              </div>
            </div>
<?php
        }
        else
        {
            echo mysqli_error($conn);
        }
    }
    else
    {
        $passw = hash('sha256', $_POST['password']);
        function createSalt()
        {
            return '2123293dsj2hu2nikhiljdsd';
        }
        $salt = createSalt();
        $pass = hash('sha256', $salt . $passw);
        $sql ="INSERT INTO patient(patientname,admissiondate,admissiontime,address,mobileno,city,pincode,loginid,password,bloodgroup,gender,dob,status) values('$_POST[patientname]','$_POST[admissiondate]','$_POST[admissiontime]','$_POST[address]','$_POST[mobilenumber]','$_POST[city]','$_POST[pincode]','$_POST[loginid]','$pass','$_POST[select2]','$_POST[gender]','$_POST[dateofbirth]','Active')";
        if($qsql = mysqli_query($conn,$sql))
        {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                  Success
                </h3>
                <p>User Created Successfully</p>
                <p>
                 <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                 <?php echo "<script>setTimeout(\"location.href = 'login.php';\",1500);</script>"; ?>
                </p>
              </div>
            </div>
<?php
        }
        else
        {
            echo mysqli_error($conn);
        }
    }
}
if(isset($_GET['editid']))
{
    $sql="SELECT * FROM patient WHERE patientid='$_GET[editid]' ";
    $qsql = mysqli_query($conn,$sql);
    $rsedit = mysqli_fetch_array($qsql);

}

?>


 

<section class="login-block">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">


<div class="card-block">
<div class="col-md-6" style="margin-top: px; margin-right: px; ">
<h3 class="text-center txt-primary" style="align-items: center;">Sign up</h3>
</div>
<form id="main" method="post" action="" enctype="multipart/form-data">

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"> Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="patientname" id="patientname" placeholder="Enter name...." required=""  value="<?php if(isset($_GET['editid'])) { echo $rsedit['patientname']; } ?>" >
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">Mobile No</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="Enter mobilenumber...." required="" value="<?php echo $rsedit['mobileno']; ?>">
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Registration Date</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="admissiondate" id="admissiondate" placeholder="Enter admissiondate...." required=""  value="<?php if(isset($_GET['editid'])) { echo $rsedit['admissiondate']; } ?>" >
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">Registration Time</label>
        <div class="col-sm-4">
            <input type="time" class="form-control" name="admissiontime" id="admissiontime" placeholder="Enter admissiontime...." required="" value="<?php echo $rsedit['admissiontime']; ?>">
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Login ID</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="loginid" id="loginid"
                        value="<?php if(isset($_GET['editid'])) { echo $rsedit['loginid']; } ?>" />
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">Blood Group</label>
        <div class="col-sm-4">
            <select class="form-control show-tick" name="select2" id="select2">
                <option value="">Select</option>
                <?php
            $arr = array("A+","A-","B+","B-","O+","O-","AB+","AB-");
            foreach($arr as $val)
            {
                if($val == $rsedit['bloodgroup'])
                {
                    echo "<option value='$val' selected>$val</option>";
                }
                else
                {
                    echo "<option value='$val'>$val</option>";
                }
            }
            ?>
            </select>
            <span class="messages"></span>
        </div>

    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-4">
             <input class="form-control" type="text" name="city" id="city"
                        value="<?php if(isset($_GET['editid'])) { echo $rsedit['city']; } ?>" />
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">PIN Code</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="pincode" id="pincode"
                        value="<?php if(isset($_GET['editid'])){ echo $rsedit['pincode']; } ?>" />
            <span class="messages"></span>
        </div>
    </div>

<?php
  if(!isset($_GET['editid']))
  {
?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-4">
            <input class="form-control" type="password" name="password" id="password"/>
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-4">
            <input class="form-control" type="password" name="cnfirmpassword" id="cnfirmpassword"/>
            <span class="messages" id="confirm-pw" style="color: red;"></span>
        </div>
    </div>
<?php } ?>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-4">
            <select name="gender" id="gender" class="form-control" required="">
                <option value="">-- Select One -- </option>
                <option value="Male" <?php if(isset($_GET['editid']))
                    { if($rsedit['gender'] == 'Male') { echo 'selected'; } } ?>>Male</option>
                <option value="Female" <?php if(isset($_GET['editid']))
                    { if($rsedit['gender'] == 'Female') { echo 'selected'; } } ?>>Female</option>
            </select>
        </div>

        <label class="col-sm-2 col-form-label">Date of Birth</label>
        <div class="col-sm-4">
            <input class="form-control" type="date" name="dateofbirth" max="<?php echo date("Y-m-d"); ?>"
                        id="dateofbirth" value="<?php echo $rsedit['dob']; ?>" />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <textarea name="address" id="address" class="form-control"><?php if(isset($_GET['editid'])) { echo $rsedit['address']; } ?></textarea>
        </div>

    </div>



    <div class="form-group row">
        <label class="col-sm-2"></label>
        <div class="col-sm-10">
            <button type="submit" name="btn_submit" class="btn btn-primary m-b-0">Submit</button>
        </div>
    </div>
    <div class="col-md-6">
<p class="text-inverse text-right m-b-0">Thank you.</p>
<p class="text-inverse text-right"><a href="login.php"><b class="f-w-600">Back to Login</b></a></p>
</div>

</form>

</section>


<script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

<script type="text/javascript" src="files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="files/assets/js/common-pages.js"></script>

<script async src="#"></script>
<script></script>
</body>
</html>
