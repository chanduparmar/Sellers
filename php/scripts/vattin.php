
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="https://www.tinxsys.com/TinxsysInternetWeb/dealerControllerServlet?tinNumber=21711100073&searchBy=TIN&backPage=searchByTin_Inter.jsp">click</a>
</body>
</html>
<?php


 $endpoint = 'abhy0065001';


// set VAT number


// Initialize CURL:
$ch = curl_init('https://www.tinxsys.com/TinxsysInternetWeb/dealerControllerServlet?tinNumber=21711100073.jsp');  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);
print_r($json);
// Decode JSON response:
$validationResult = json_decode($json, true);
 print_r($validationResult);
// Access and use your preferred validation result objects


?>