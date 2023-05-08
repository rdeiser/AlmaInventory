var API_SERVICE = "https://api-na.hosted.exlibrisgroup.com/almaws/v1/";
// var API_SERVICE_PUT = "https://api-na.hosted.exlibrisgroup.com/almaws/v1/";
var API_REDIRECT = "php/barcodeReportRedirect.php";
var API_REDIRECT_PUT = "php/barcodeReportRedirectPut.php";

//Location validation Regular Expression
var LOC_REGEX = /^main$/;

//Location format message
var LOC_MSG = "Invalid Location";


//Barcode validation Regular expression
var BARCODE_REGEX = /^[(A)0-9]{12}$/;

//Barcode Format message
var BARCODE_MSG = "Enter a 12 digit barcode starting with the letter 'A' followed by numbers";



function parseResponsePut(barcode, json) {

    const date = new Date();
    let year = date.getUTCFullYear();
    let month = String(date.getUTCMonth()+1).padStart(2,"0");
    let day = String(date.getUTCDate()).padStart(2,"0");
    let currentDate = `${year}-${month}-${day}`;

    var itemData = getArray(json, "item_data");
    var itemLink = getValue(itemLink, "link");
    var inventoryDate = getArrayValue(itemData, "inventory_date", "value");
    if (inventoryDate !== currentDate) {
        const body = json;
        const obj = JSON.parse(body);
        obj.item_data.inventory_number["inventory_date"] = currentDate;
        const updatedBody = JSON.stringify(obj);

        return updatedBody;
        // const updatedMAP = new Map(Object.entries(obj));  
                
    }

}