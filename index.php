<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title></title>
</head>
<body>
<form>
    <input type="text" name="name" id="name" placeholder="Enter Name"><br><br>
    <input type="text" name="amt" id="amt"  placeholder="Enter Amount"><br><br>
    <input type="button" name="btn" id="btn" onclick="pay_now()" value="Pay Now">
</form>

<script>
    function pay_now()
    {
        var name=$("#name").val();
        var amt=$("#amt").val();
        var options = {
            "key": "rzp_test_Jsah4TiiWSni03", // Enter the Key ID generated from the Dashboard
            "amount": amt*100, // multiply by 100
            "currency": "INR",
            "name": 'John',
            "description": "Test Transaction",
            "image": "https://example.com/your_logo",
            // "order_id": "order_Ef80WJDPBmAeNt", //Pass the `id` obtained in the previous step
            // "account_id": "acc_Ef7ArAsdU5t0XL",
            "handler": function (response){
                // alert(response.razorpay_payment_id);
                // alert(response.razorpay_order_id);
                // alert(response.razorpay_signature)
                $.ajax({
                    url : 'payment_process.php',
                    type: 'POST',
                    data: 'payment_id='+response.razorpay_payment_id+"&amt="+amt+"&name="+name,
                    success:function(result)
                    {
                        window.location.href="success.php";
                    }
                });

            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        // document.getElementById('rzp-button1').onclick = function(e){
        //     rzp1.open();
        //     e.preventDefault();
        // }
    }
</script>
</body>
</html>
