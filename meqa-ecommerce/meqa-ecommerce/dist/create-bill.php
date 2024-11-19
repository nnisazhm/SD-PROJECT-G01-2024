<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// ToyyibPay API URL
$toyyibPayApiUrl = "https://dev.toyyibpay.com/index.php/api/createBill";

// ToyyibPay API Details
$apiKey = "dn9jqdur-tzqt-pztk-6qgm-9xa4jg7m57qx"; // Make sure this is the correct API key
$categoryCode = "ltceill4";

// Callback and return URLs
$callbackUrl = "C:/Users/nizza/OneDrive/Desktop/UniServerZ/www/MEQA.MY ECOMMERCE SYSTEM/meqa-ecommerce/meqa-ecommerce/dist/payment-callback.php";
$returnUrl = "C:/Users/nizza/OneDrive/Desktop/UniServerZ/www/MEQA.MY ECOMMERCE SYSTEM/meqa-ecommerce/meqa-ecommerce/dist/checkout-success.php";

// Fetch user information from session
$userName = $_SESSION['user_name'] ?? 'No Name';
$userEmail = $_SESSION['email'] ?? 'No Email';
$userPhone = "0125154822"; // Replace with dynamic data if available
$cartItems = $_SESSION['cart'] ?? [];

// Calculate the total amount dynamically
$subtotal = 0;
foreach ($cartItems as $item) {
    $subtotal += $item['product_price'] * $item['product_quantity'];
}

// Convert to cents
$totalAmount = $subtotal * 100;

// Prepare ToyyibPay bill data
$data = [
    'userSecretKey' => $apiKey,
    'categoryCode' => $categoryCode,
    'billName' => $userName,
    'billDescription' => 'This bill is for testing purposes of MEQA.MY E-Commerce system.',
    'billAmount' => $totalAmount,
    'billExternalReferenceNo' => uniqid('MEQA-'),
    'billTo' => $userName,
    'billEmail' => $userEmail,
    'billPhone' => $userPhone,
    'billReturnUrl' => $returnUrl,
    'billCallbackUrl' => $callbackUrl,
    'billPriceSetting' => 1,
    'billPayorInfo' => 1,
];

// Send as x-www-form-urlencoded
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $toyyibPayApiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($data),  // Send data as x-www-form-urlencoded
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/x-www-form-urlencoded'
    ],
    CURLOPT_SSL_VERIFYPEER => false, // Disable SSL verification (temporary workaround)
    CURLOPT_SSL_VERIFYHOST => false, // Disable host verification (temporary workaround)
]);

$response = curl_exec($curl);

// Check for cURL errors
if(curl_errno($curl)) {
    echo 'cURL error: ' . curl_error($curl);
}

curl_close($curl);

// Debugging raw response
echo "Raw Response: " . $response;  // Debugging line

// Decode the JSON response
$responseData = json_decode($response, true);

// Check if the response is an array and contains a BillCode
if (is_array($responseData) && isset($responseData[0]['BillCode'])) {
    $billCode = $responseData[0]['BillCode'];

    // Redirect user to ToyyibPay payment page
    header("Location: https://dev.toyyibpay.com/{$billCode}");
    exit();
} else {
    // Handle error
    echo "Failed to create bill: " . ($responseData[0]['msg'] ?? "Unknown error");
    exit();
}
?>