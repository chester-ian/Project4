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
      text-align:middle;
      width: 50%;
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
    <script>
    $(document).ready(function(){

    // jQuery methods go here...
    $("#submit_me").click(function(){
        var err="";
        if ($("#name").val()==""){
           err+="\n Name should not be blank.";
        }
        if ($("#email").val()==""){
           err+="\n Email should not be blank.";
        }
        var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        var emailFormat = re.test($("#email").val());
        if (!emailFormat && $("#email").val()!=""){
           err+="\n Email should be in proper format.";
        }
        if ($("#phone").val()==""){
           err+="\n Phone should not be blank.";
        }
        if ($("#state").val()==""){
           err+="\n State should not be blank.";
        }
        if ($('#description').val().trim().length <= 0) {
            // textarea is empty or contains only white-space
            err+="\n Description should not be blank.";
        } else{
          var html = $($('#description').val().bold());
          html.find('script').remove();
          $("#description").val(html.html());
          if ($("#description").val().length > 20 ){
              err+="\n Description should not be more than 20 characters.";
          }
        }
        if(! $("#phone").val().match(/^\d+$/)) {
          err+="\n Phone should all be numeric.";
        }

        if (err!=""){
            alert("Kindly fix the following item/s: \n"+err);
        }else{
           $("#submit_form").submit();
        }


        //$("#submit_form").submit();

    });
    });
    </script>



  </head>
  <body>
    <div class="main-block">
    <form action="submitted.php" id="submit_form" method="POST">
      <div><div><image src="images/logo.jpg" height="30%" width="30%"></div></div>
      <fieldset>
        <legend>
          <h3>Not sure if we can help you? Leave your details and we'll reach out </h3>
        </legend>
        <div  class="personal-details">
          <div>
            <div><label>Name*</label><input type="text" id="name" name="name" required></div>
            <div><label>Email*</label><input type="text" id="email" name="email" required></div>
            <div><label>Phone Number*</label><input type="text" id="phone" name="phone" required></div>
            <div><label>Company</label><input type="text" id="company" name="company" required></div>
            <div>
              <label>Office Location*</label>
              <select name="state" id="state">
                <option value=""></option>
                <option value="NSW">NSW</option>
                <option value="VIC">VIC</option>
                <option value="ACT">ACT</option>
                <option value="QLD">QLD</option>
                <option value="QLD">WA</option>
                <option value="QLD">SA</option>
                <option value="QLD">TAS</option>
                <option value="QLD">NT</option>
              </select>
            </div>
            <div><label>Describe topic of consultation (max 20 characters):</label><textarea rows="3" id="description" name="description" max="20"></textarea></div>
          </div>


        </div>
      </fieldset>
      <button style="height:30%;width:% !important" id="submit_me" type="button">Submit</button>
    </form>
    </div>
  </body>
</html>
