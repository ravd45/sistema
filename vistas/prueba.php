<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <div id="page-wrapper">
  <h1>Datalist Element Demo</h1>
  
  <label for="default">Pick a programming language</label>
  <input type="text" id="default" list="languages" placeholder="e.g. JavaScript">
  
  <datalist id="languages">
    <option value="HTML">
    <option value="CSS">
    <option value="JavaScript">
    <option value="Java">
    <option value="Ruby">
    <option value="PHP">
    <option value="Go">
    <option value="Erlang">
    <option value="Python">
    <option value="C">
    <option value="C#">
    <option value="C++">
  </datalist>
  
  
  <label for="ajax">Pick an HTML Element (options loaded using AJAX)</label>
  <input type="text" id="ajax" list="json-datalist" placeholder="e.g. datalist">
  <datalist id="json-datalist"></datalist>

  
</div>

<script>
  // Get the <datalist> and <input> elements.
var dataList = document.getElementById('json-datalist');
var input = document.getElementById('ajax');

// Create a new XMLHttpRequest.
var request = new XMLHttpRequest();

// Handle state changes for the request.
request.onreadystatechange = function(response) {
  if (request.readyState === 4) {
    if (request.status === 200) {
      // Parse the JSON
      var jsonOptions = JSON.parse(request.responseText);
  
      // Loop over the JSON array.
      jsonOptions.forEach(function(item) {
        // Create a new <option> element.
        var option = document.createElement('option');
        // Set the value using the item in the JSON array.
        option.value = item;
        // Add the <option> element to the <datalist>.
        dataList.appendChild(option);
      });
      
      // Update the placeholder text.
      input.placeholder = "e.g. datalist";
    } else {
      // An error occured :(
      input.placeholder = "Couldn't load datalist options :(";
    }
  }
};

// Update the placeholder text.
input.placeholder = "Loading options...";

// Set up and make the request.
request.open('GET', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/4621/html-elements.json', true);
request.send();

</script>

</body>
</html>