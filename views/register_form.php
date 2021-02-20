<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style2.css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="scroll-to-accept.css">
    <link rel="stylesheet" href="build/css/intlTelInput.css">
    <title>რეგისტრაციის ფორმა </title>
</head>
<body>
<h1>რეგისტრაცია</h1>
<fieldset>
    <form id = "registration" method="post">
        <label for="name">სახელი:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="surname">გვარი:</label>
        <input type="text" id="surname" name="surname">
        <br>
        <label for="birthdate">დაბადების თარიღი:</label>
        <input type="date" id="birthdate" name="birthdate">
        <br>
        <label>სქესი:</label>
        <p class="error">
        <br>
        <label><input type='radio' name='sex' value='Male' />Male</label>
        <label><input type='radio' name='sex' value='Female' />Female</label>
        </p>
        <br>
        <label for="address">მისამართი:</label>
        <input type="text" id="address" name="address">
        <br>
        <label for="phone">მობილური:</label>
        <br>
        <input type="tel" id="phone" name="phone">
        <br>
        <br>
        <label for="country">ქვეყანა:</label>
        <select id="country" name="country">
            <option value="-1">Select Country</option>
            <?php $arrCountry = $register->getCountry("country", "id", "country"); ?>
            <?php foreach($arrCountry as $country) :?>
                <option value="<?php echo $country->id ?>"><?php echo $country->country ?></option>        
            <?php endforeach; ?>
        </select>
        <div class="clear"></div>
        <label for="city">ქალაქი:</label>
        <select id="city" name="city">
			<option>Select city</option>
		</select>
        <br>
        <label for="id_number">პირადობის მოწმობა:</label>
        <input type='text' id='id_number' name='id_number' required />
        <br>    
        <div class="new"></div>
        <br>
        <label for="email">ემაილი:</label>
        <input type="text" id="email" name="email">
        <br>
        <label for="password">პაროლი:</label>
        <input type="password" id="password" name="password">
        <div id="hidden" style="display:none">
        <div class="wrapper-all">
          <div class="wrapper">
            <div class="terms-and-conditions">
              <h1>Terms and Conditions</h1>
              <p>
              1) Enrollment.
              To begin the enrollment process, you must complete the registration process for one or more of the Services. Use of the Services is limited to parties that can 
              lawfully enter into and form contracts under applicable Law (for example, the Elected Country may not allow minors to use the Services). As part of the application,
              you must provide us with your (or your business') legal name, address, phone number and e-mail address, as well as any other information we may request. Any personal 
              data you provide to us will be handled in accordance with Amazon’s Privacy Notice.
              </p>

              <p>
              2) Service Fee Payments; Receipt of Sales Proceeds.
              Fee details are described in the applicable Service Terms and Program Policies. You are responsible for all of your expenses in connection with this Agreement. To use a
              Service, you must provide us with valid credit card information from a credit card or credit cards acceptable by Amazon ("Your Credit Card") as well as valid bank 
              account information for a bank account or bank accounts acceptable by Amazon (conditions for acceptance may be modified or discontinued by us at any time without notice)
              ("Your Bank Account"). 
              </p>

              <p>
              3) License.
              You grant us a royalty-free, non-exclusive, worldwide right and license for the duration of your original and derivative intellectual property rights to use any and all 
              of Your Materials for the Services or other Amazon product or service, and to sublicense the foregoing rights to our Affiliates and operators of Amazon Associated 
              Properties; provided, however, that we will not alter any of Your Trademarks from the form provided by you (except to re-size trademarks to the extent necessary for 
              presentation, so long as the relative proportions of such trademarks remain the same) and will comply with your removal requests as to specific uses of Your Materials 
              (provided you are unable to do so using standard functionality made available to you via the applicable Amazon Site or Service); provided further, however, that nothing 
              in this Agreement will prevent or impair our right to use Your Materials without your consent to the extent that such use is allowable without a license from you or your 
              Affiliates under applicable Law (e.g., fair use under United States copyright law, referential use under trademark law, or valid license from a third party).
              </p>

              <p>
              4) Representations.
              Each party represents and warrants that: (a) if it is a business, it is duly organized, validly existing and in good standing under the Laws of the country in which the
               business is registered and that you are registering for the Service(s) within such country; (b) it has all requisite right, power, and authority to enter into this 
               Agreement, perform its obligations, and grant the rights, licenses, and authorizations in this Agreement; (c) any information provided or made available by one party 
               to the other party or its Affiliates is at all times accurate and complete; (d) it is not subject to sanctions or otherwise designated on any list of prohibited or 
               restricted parties or owned or controlled by such a party, including but not limited to the lists maintained by the United Nations Security Council, the US Government
                (e.g., the US Department of Treasury’s Specially Designated Nationals list and Foreign Sanctions Evaders list and the US Department of Commerce’s Entity List), 
                the European Union or its member states, or other applicable government authority; and (e) it will comply with all applicable Laws in performance of its obligations
                 and exercise of its rights under this Agreement.
              </p>
              <hr>
            </div>
            <br>
            <p>ვეთანხმები პირობებს <input type="checkbox" name="tanxmoba" class="accept" disabled autocomplete="off"></input></p>
          </div>
        </div>
        </div>
    
        <a href="#" id="faq">რეგისტრაციის პირობები და წესები</a>
        <br />
        <br />
        <button type = "submit" class="acceptsubmit">Submit</button>
 </form>
</fieldset>
<!-- phone -->
<script src="build/js/intlTelInput.js"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      utilsScript: "build/js/utils.js",
    });
  </script>
<!-- endphone -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="register.js"></script>
    <!-- <script src="datepicker.js"></script> -->
</body>
</html>

