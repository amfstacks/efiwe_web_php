<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paystack Payment Integration</title>
</head>
<body>
<h2>Paystack Payment Integration</h2>

<form id="paymentForm" method="POST">
    <label for="amount">Amount to Pay:</label>
    <input type="number" id="amount" name="amount" value="10000" required>
    <br><br>
    <button type="submit">Pay with Paystack</button>
</form>

<script>
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault();  // Prevent the default form submission

        var amount = document.getElementById('amount').value;  // Get the amount to be paid

        // Send request to PHP to initialize Paystack transaction
        fetch('paystack_payment.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ amount: amount })
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    // Redirect the user to the Paystack payment page (no public key required)
                    window.location.href = data.authorization_url;
                } else {
                    alert("Error initializing payment");
                }
            });
    });
</script>
</body>
</html>
