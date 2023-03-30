var API_SERVICE = "https://api-na.hosted.exlibrisgroup.com";
var API_REDIRECT = "php/barcodeReportRedirect.php";

//Location validation Regular Expression
var LOC_REGEX = /^MAIN$/;

//Location format message
var LOC_MSG = "Invalid Location";


//Barcode validation Regular expression
var BARCODE_REGEX = /^[(A)0-9]{12}$/;

//Barcode Format message
var BARCODE_MSG = "Enter a 12 digit barcode starting with the letter 'A' followed by numbers";
