<?php
       $withError=[];

       /* Backend Validations */
       /*$description = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $_POST['description']);
       if ($_POST['name'] == "") {
              $withError[]="Name should not be blank";
       }
       if ($_POST['email'] == "") {
              $withError[]="Email should not be blank";
       }
       if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $_POST['email'] != "") {
              $withError[]="Email should not be in valid format";
       }
       if ($_POST['phone'] == "") {
              $withError[]="Phone should not be blank";
       }
       if (! is_numeric($_POST['phone']) && $_POST['phone'] != "") {
              $withError[]="Phone should all be numeric";
       }
       if ($_POST['state'] == "") {
              $withError[]="State should not be blank";
       }
       $states=['NSW','VIC','ACT','QLD','WA','SA','TAS'.'NT'];
       if (!in_array($_POST['state'],$states) && $_POST['state'] != "") {
              $withError[]="Office Location is not in the options";
       }
       if ($description == "") {
              $withError[]="Description should not be blank";
       }
       if (strlen($description) > 20 ) {
              $withError[]="Description should not be more than 20 characters";
       }*/
       /* Backend Validations */
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Kebab Systems</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p {
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      }
      h1 {
      margin: 0;
      font-weight: 400;
      }
      h3 {
      margin: 12px 0;
      color: #8ebf42;
      }
      .main-block {
      display: flex;
      justify-content: center;
      align-items: center;
      background: #fff;
      }
      form {
      width: 100%;
      padding: 20px;
      }
      fieldset {
      border: none;
      border-top: 1px solid #8ebf42;
      }
      .account-details, .personal-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .account-details >div, .personal-details >div >div {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      }
      .account-details >div, .personal-details >div, input, label {
      width: 100%;
      }
      label {
      padding: 0 5px;
      text-align: right;
      vertical-align: middle;
      }
      input {
      padding: 5px;
      vertical-align: middle;
      }
      .checkbox {
      margin-bottom: 10px;
      }
      select, .children, .gender, .bdate-block {
      width: calc(100% + 26px);
      padding: 5px 0;
      }
      select {
      background: transparent;
      }
      .gender input {
      width: auto;
      }
      .gender label {
      padding: 0 5px 0 0;
      }
      .bdate-block {
      display: flex;
      justify-content: space-between;
      }
      .birthdate select.day {
      width: 35px;
      }
      .birthdate select.mounth {
      width: calc(100% - 94px);
      }
      .birthdate input {
      width: 38px;
      vertical-align: unset;
      }
      .checkbox input, .children input {
      width: auto;
      margin: -2px 10px 0 0;
      }
      .checkbox a {
      color: #8ebf42;
      }
      .checkbox a:hover {
      color: #82b534;
      }
      button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px;
      border: none;
      background: #8ebf42;
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #82b534;
      }
      @media (min-width: 568px) {
      .account-details >div, .personal-details >div {
      width: 50%;
      }
      label {
      width: 40%;
      }
      input {
      width: 60%;
      }
      select, .children, .gender, .bdate-block {
      width: calc(60% + 16px);
      }
      }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  </head>


  <body>
    <div class="main-block">
    <form action="submitted.php" method="POST">
      <div><div><image src="images/logo.jpg" height="30%" width="30%"></div></div>

      <?php
           if (count($withError) > 0) {
      ?>
      <fieldset>
        <legend>
          <h3>Form encountered some errors...</h3>
        </legend>
        <h4 style="color:red;">Kindly fix the following item/s:  </h4>
        <div  class="personal-details"  >
          <div >
            <?php
                 foreach($withError as $error){
                   print "<div style='color:red;'><label>".$error."</label></div>";
                 }
            ?>
          </div>
        </div>
      </fieldset>
      <button onclick="javascript:history.back();" id="submit_me" type="button">Go back and edit the form</button>
      <?php
    }else{
      ?>

      <fieldset>
        <legend>
          <h3>Customer Information was successfully logged! We will be in reaching out within 48 hours</h3>
        </legend>
        <div  class="personal-details">
          <div>
            <div><label>Name*</label><?php echo $_POST['name']; ?></div>
            <div><label>Email*</label><?php echo $_POST['email']; ?></div>
            <div><label>Phone Number*</label><?php echo $_POST['phone']; ?></div>
            <div><label>Company*</label><?php echo $_POST['company']; ?></div>
            <div>
              <label>State*</label>
              <?php echo $_POST['state']; ?>
            </div>
            <div><label>Short Description of Issue: </label><?php echo $_POST['description']; ?></div>
          </div>
        </div>
      </fieldset>
      <?php
          }
      ?>
    </form>
    </div>
  </body>
</html>
