/*
  browser side scripting functions for updating mock data table
  
  functions:
    InsertNewItem
    createNewRow
    UpdateItem
    DeleteItem
    DeleteAllItems
*/

// creates a new item on server side 
function InsertNewItem() {
  // new item id var 
  var newItemId = 0;
  // create post data object
  postData = {
    "new_id": newItemId
  };
  // XMLHttpRequest object for ajax call 
  var xhttp = new XMLHttpRequest();
  
  // get all table rows
  const rows = document.getElementById("mockDataTable").getElementsByTagName('tbody')[0].getElementsByTagName("tr");
  
  // if more than 1 table row found (skips tr with th included)
  if(rows != undefined && rows.length > 1) {
    // set new item id == the last item id + 1
    newItemId = parseInt(rows[rows.length - 1].getElementsByTagName('td')[0].innerHTML) + 1;
    // set post data to reflect new item id
    postData.new_id = newItemId;
  } 
  
  // on ready state change
  xhttp.onreadystatechange = function() {
    // if state == 4 and status == 200
    if (this.readyState == 4 && this.status == 200) {
      // if response results == 200
      if (JSON.parse(this.responseText).results == 200) {
        // create new row in table
        createNewRow(newItemId);
      } else {
        // alert user 
        alert("There was an error creating a new item!");
      }
    }
  }
  
  // open post to http://dashnetworks.com/index.php/insertData
  xhttp.open("POST", "insertData");
  // set request headers for application/json 
  xhttp.setRequestHeader("Content-Type", "application/json");
  // send json data via post to open connection
  xhttp.send(JSON.stringify(postData));
  
}

// create new row for mock data table accepting new id parameter
function createNewRow(nID) {
  // create tr element
  const newTrElement = document.createElement("tr");
  // create td element
  const tdID = document.createElement("td");
  // set first td element to contain new id
  tdID.innerHTML = nID;
  // new id td content to be udeditable 
  tdID.setAttribute("contenteditable", "false");
  // append td id element to tr element
  newTrElement.appendChild(tdID);
  
  // for 7 iterations
  for(var i = 0; i < 7; i++) {
    // create new td element 
    const tdTemp = document.createElement("td");
    // set td's content to be editable
    tdTemp.setAttribute("contenteditable", "true");
    // set oninput trigger to Update item 
    tdTemp.setAttribute("oninput", "UpdateItem(this)");
    // append td to table row
    newTrElement.appendChild(tdTemp);
  }
  
  // create td element for buttons
  const tdButton = document.createElement("td");
  // create delete button 
  const deleteButton = document.createElement("button");
  // set delete button text to "delete"
  deleteButton.innerHTML = "delete";
  // set delete button class for styling
  deleteButton.setAttribute("class", "btn btn-danger");
  // set onclick trigger to delete item
  deleteButton.setAttribute("onclick", "DeleteItem(event," + nID.toString() + ")");
  // add delte button to td element 
  tdButton.appendChild(deleteButton);
  // append td to table row
  newTrElement.appendChild(tdButton);
  
  // appeand new td element to table
  document.getElementById("mockDataTable").getElementsByTagName('tbody')[0].appendChild(newTrElement);
}

// update item from table
function UpdateItem(element) {
  // data arr for posting
  var data = [];
  
  // XMLHttpRequest object for ajax call 
  var xhttp = new XMLHttpRequest();
  
  // gather all td beside selected element 
  var infoArr = element.parentNode.getElementsByTagName('td');
  
  // append object for posting with neighboring td information
  data.push({
    "id": infoArr[0].innerHTML,
    "first_name": infoArr[1].innerHTML,
    "last_name": infoArr[2].innerHTML,
    "email": infoArr[3].innerHTML,
    "gender": infoArr[4].innerHTML,
    "ip_address": infoArr[5].innerHTML,
    "genres": infoArr[6].innerHTML,
    "misc": infoArr[7].innerHTML,
  });
  
  // on ready state change
  xhttp.onreadystatechange = function() {
    // if state == 4 and status == 200
    if (this.readyState == 4 && this.status == 200) {
      // if response results != 200
      if (JSON.parse(xhttp.responseText).results != 200) {
        // alert user 
        alert("Error: Updating item(s) ", data);
      }
    }
  };
  
  // open post to http://dashnetworks.com/index.php/postData
  xhttp.open("POST", "postData");
  // set request headers for application/json 
  xhttp.setRequestHeader("Content-Type", "application/json");
  // send json data via post to open connection
  xhttp.send(JSON.stringify(data));
}

// delete item from table and server side 
function DeleteItem(event, item_id) {
  // delete row via XMLHttpRequest
  var xhttp = new XMLHttpRequest();
  
  // on ready state change
  xhttp.onreadystatechange = function() {
    // if state == 4 and status == 200
    if (this.readyState == 4 && this.status == 200) {
      // if response results == 200
      if(JSON.parse(xhttp.responseText).results == 200) {
        // remove item from table
        event.target.parentNode.parentNode.parentNode.removeChild(event.target.parentNode.parentNode);
      } else {
        // alert user
        alert("There was an error deleting your item!");
      }
    }
  }
  
  // open get connection to http://dashnetworks.com/index.php/deleteData/[itemID]
  xhttp.open("GET", "deleteData/" + item_id.toString() ,true);
  // request information via open connection
  xhttp.send();  
}

// delete all items from the table except headers
function DeleteAllItems() {
  // delete row via XMLHttpRequest
  var xhttp = new XMLHttpRequest();
  
  // on ready state change
  xhttp.onreadystatechange = function() {
    // if state == 4 and status == 200
    if (this.readyState == 4 && this.status == 200) {
      console.log(xhttp.responseText);
      
      // if response results == 200
      if(JSON.parse(this.responseText).results == 200) {
        // get table headers
        const tableHeaders = document.getElementById("tableHeaders");
        // overwrite data in table to only include table headers
        document.getElementById("mockDataTable").innerHTML = tableHeaders.outerHTML;
      }
    }
  };
  
  // open get connection to http://dashnetworks.com/index.php/deleteData
  xhttp.open("GET", "deleteData", true);
  // request information via open connection
  xhttp.send();
}

