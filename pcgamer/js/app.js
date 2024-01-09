function AJAX({
    url,
    data = [],
    success,
    error
}) {
    let req = (window.XMLHttpRequest) ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP');
    req.open("POST", BASE_URL + url, true);

    function dataFn() {
        let insideData = '';
        data.map((x) => {
            Object.keys(x).map((field, indexField) => {
                if (indexField == 0) {
                    insideData += Object.keys(x)[indexField] + '=' + (Array.isArray(Object.values(x)[indexField]) ? JSON.stringify(Object.values(x)[indexField]) : Object.values(x)[indexField].toString().trim())
                } else {
                    insideData += '&' + Object.keys(x)[indexField] + '=' + (Array.isArray(Object.values(x)[indexField]) ? JSON.stringify(Object.values(x)[indexField]) : (typeof Object.values(x)[indexField] == 'string' ? Object.values(x)[indexField].trim() : Object.values(x)[indexField]))
                }
            })
            if (data.length > 1) {
                insideData += '__';
            }
        });
        if (data.length > 1) {
            insideData = 'arrData=' + JSON.stringify(data);
        }
        return insideData;
    }
    // console.log(dataFn())
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.send(dataFn())
    req.onreadystatechange = (e) => {
        if (req.readyState == 4 && req.status == 200) {
            if (req.status == 200) {
                success(req.responseText);
            } else {
                error(req.status);
            }
        }
    }
}