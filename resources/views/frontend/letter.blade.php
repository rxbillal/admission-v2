<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admission Letter</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
  <style>
body {
  font-family: "Times New Roman", Times, serif !important;
  font-size:16px !important;
  line-height: 1.5;
}
h5,h3{
   margin: 0;
   width: 100%;
   position: absolute;               
   top: 50%;      
   text-align: center;} 

.center {
  text-align: center;
  width: 100%;
}
.date {
  text-align: right;
}

.footer {
  text-align: center;
  width: 100%;
  font-size: 14.9px;
}

table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }
    h4,h2{
      text-align: center;
    }
</style>
</head>
<body> 
<div class="container py-3">
    <div class="row">
        <div class="col-12 text-center">
            <img  align="left" alt="" src="frontend/assets/images/logo.png" style="width: 30%"/><br>
            <h4><b>OFFICE OF THE REGISTRAR</b></h4>
        </div>

        <div class="date">
            <br><br>
            <p>{{date('jS F, Y')}}</p>
        </div>
        <div class="col-12 text-left">
            <b>Mr./Mrs./Miss:</b> {{$user->first_name .' '. $user->last_name}} <br>
            <b>UTME / DE Registration No:</b> {{$jamb->j_no}}<br>
            <b>Application ID:</b> {{$user->application_id}}

        </div>
        <div class="col-12 text-center">
            <br>
            <h4><b>OFFER OF PROVISIONAL ADMISSION FOR  2023/2024 ACADEMIC SESSION</b></h4>
        </div>
        <div class="col-12 text-left">
           <p>This has reference to your application for admission into Khadija University. I am pleased to inform you that you have been offered provisional admission to study <span style="font-style: italic; font-weight: bold"><u>{{$user->admitted_subject}}</u></span> commencing from January 3rd 2024.</p>
        <p>2. Please note that this offer of admission is subject to your acceptance and fulfillment of the JAMB and screening requirements as well as other conditions that may be issued by the University.
        </p>
        <p> 3. You are requested to present yourself and your documents for screening and registration. on a date to be communicated later. <br /> <br /> 
        
        </p>
        <p>4. Candidates should note that the admission can be withdrawn at any time inconsistencies, discrepancies or inappropriate submissions are discovered and there shall be no refund of any fee.</p>
            <p> 5. Congratulations.</p>
        </div>
        <div class="center" style="font-style: italic">
            <img alt="" src="frontend/assets/sign.png" style="width: 10%" />
            <h5 >A.B. Shehu, PhD</h5>
            <h5> Registrar</h5>
        </div>
        <div class="footer">
            <br><br>
            <span>Khadija University Majia, Along Kano-Hadejia Road, Taura Local Government Jigawa state Nigeria.</span>
            <br>
            <span>Website: <a href="www.kum.edu.ng">www.kum.edu.ng</a> | Email: <a href="mailto:registrar@kum.edu.ng">registrar@kum.edu.ng</a>, Phone:09133 3334 43</span>
        </div>
    </div>
</div>

{{-- 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> --}}
{{-- <script>
     window.print();
    setTimeout(function() {
         window.close()
    }, 5000);
</script> --}} 



<h2>Tuition Fees</h2>
  
<table>
  <thead>
    <tr>
      <th>S/N</th>
      <th>FEE</th>
      <th>FBMS</th>
      <th>FSCC</th>
      <th>FSMS</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1.</td>
      <td>Tuition</td>
      <td>₦550,000</td>
      <td>₦450,000</td>
      <td>₦290,000</td>
    </tr>
    <tr>
      <td>2.</td>
      <td>Caution</td>
      <td>₦20,000</td>
      <td>₦20,000</td>
      <td>₦20,000</td>
    </tr>
    <tr>
        <td>3.</td>
        <td>Examination</td>
        <td>₦30,000</td>
        <td>₦30,000</td>
        <td>₦30,000</td>
      </tr>
      <tr>
        <td>4.</td>
        <td>Portal</td>
        <td>₦10,000</td>
        <td>₦10,000</td>
        <td>₦10,000</td>
      </tr>
      <tr>
        <td>5.</td>
        <td>ICT</td>
        <td>₦10,000</td>
        <td>₦10,000</td>
        <td>₦10,000</td>
      </tr>
      <tr>
        <td>6.</td>
        <td>Medical Insurance</td>
        <td>₦15,000</td>
        <td>₦15,000</td>
        <td>₦15,000</td>
      </tr>
      <tr>
        <td>7.</td>
        <td>Sports</td>
        <td>₦15,000</td>
        <td>₦15,000</td>
        <td>₦15,000</td>
      </tr>
      <tr>
        <td>8.</td>
        <td>Identity Card</td>
        <td>₦5,000</td>
        <td>₦5,000</td>
        <td>₦5,000</td>
      </tr>
      <tr>
        <td>9.</td>
        <td>Laboratory</td>
        <td>₦40,000</td>
        <td>₦30,000</td>
        <td>-</td>
      </tr>
      <tr>
        <td></td>
        <td><b>Grand Total</b></td>
        <td><b>₦695,000</b></td>
        <td><b>₦585,000</b></td>
        <td><b>₦395,000</b></td>
      </tr>
  
    <!-- Add more rows as needed -->
  </tbody>
</table>


   <p><strong>NOTE FOR FRESH STUDENT:</strong></p>
    <p> 1. Registrations start at 12:00am Monday, 6th November 2023 to 11:59 pm Saturday, 25th November 2023 to the following account:
    <br />
    <strong>Bank Name:</strong>Keystone <br />
    <strong>Account Name:</strong> Khadija University Majia <br />
    <strong>Account Number:</strong> 1007185194
    </p>
    <p>
        2. Hostel fees are as follows, and are to be paid to Student Affairs Division’s account upon
        collection of allocation form: <br />
        a. Standard N80,000 + N20,000 for the maintenance. Total = N100,000<br />
        b. Premium N130,000 + N20,000 for the maintenance. Total = N150,000<br />
    </p>
    <p>3. Acceptance Fee N15,000</p>
    <p>4. Matriculation N20,000</p>
    
</p>
</body>
</html> 
