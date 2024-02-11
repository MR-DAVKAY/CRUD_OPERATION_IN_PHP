<?php
if (isset($_POST['submit']))
{
    $phonenuber = $_POST['phone']; // Phone number paying
    $amount =   $_POST['amount'];// Amount to transact
   
    $Account_no = 'VELELAZE SOFTWARES'; // Enter account number (optional)
    $url = 'https://tinypesa.com/api/v1/express/initialize';
    $data = array(
        'amount' => $amount,
        'msisdn' => $phonenuber,
        'account_no' => $Account_no
    );
    $headers = array(
        'Content-Type: application/x-www-form-urlencoded',
        'ApiKey: Garp5ROyNo6'
    );
    $info = http_build_query($data);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $resp = curl_exec($curl);

    if ($resp === false) {
        echo "CURL ERROR: " . curl_error($curl);
    } else {
        $msg_resp = json_decode($resp);
        if ($msg_resp->success == 'true') 
        
        {
        
            //echo "<script>alert('Transaction successfully initiated'); </script>";
            
           header("location:tinypesa.php");
        } 
        
        else 
        {
            //header("location:errors.php");
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lipa Davkay online</title>
  
    <link rel= "stylesheet" type="text/css"href="style.css">
</head>
<body>


<section>

<div class="login-box" id="form">
       <form  action="tinypesa.php" method="POST" onsubmit ="return isvalid();">
              <h2>MAKE PAYMENT</h2>
              <div class="input-box">
                     <span class="icon"><ion-icon name="mail"></ion-icon>
              </span>
                     <input type="phone" id="phone" name="phone" required>
                     <label >Phone</label>
              </div>
              <div class="input-box">
                     <span class="icon"><ion-icon name="lock-closed"></ion-icon>
              </span>
                     <input type="text" id="amount" name="amount" required>
                     <label >Amount</label>
              </div>
              <div class="remember-forgot">
                     <label><input type="checkbox" required> Confirm Details</label>
              </div>
              <button type="submit" name="submit">Make Payment</button>
             
       </form>
     </div>



