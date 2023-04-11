function setCookie(){
    const name = document.getElementById("name").value;
    const value = document.getElementById("value").value;
    const exdays = document.getElementById("exdays").value;
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    const expires = "expires="+d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
    console.log(document.cookie);
    populateList();
}
function getCookieExpiration(name) {
    var cookieArray = document.cookie.split(';');
    for(var i=0; i < cookieArray.length; i++) {
      var cookie = cookieArray[i].trim();
      if(cookie.indexOf(name + "=") == 0) {
        var expiration = new Date(cookie.substring(name.length+1, cookie.length));
        return expiration.toLocaleString();
      }
    }
    return "";
  }
function getAllCookie(){
    var allcookies = document.cookie.split(';');
    var cookiearray = [];
    for( var i =0; i <allcookies.length; i++){
        var cookie = allcookies[i].trim();
        cookiearray.push(cookie);
    }
    var tableBody = document.querySelector(".table tbody");
    if(cookiearray.length==0){
        return;
    }
    tableBody.innerHTML = "";
    for( var i=0; i<cookiearray.length;i++){
        var row = document.createElement("tr");
        var parts = cookiearray[i].split('=');
        var name = parts[0];
        var value = parts[1];
        var expiration = getCookieExpiration(name);
        var id = i +1;
        row.innerHTML = `
        <th scope="row">${id}</th>
        <td>${name}</td>
        <td>${value}</td>
        <td>${expiration}</td>
        <td>
          <button type="button" class="btn btn-warning fun" onclick="editCookie('${name}', '${value}')">Edit</button>
          <button type="button" class="btn btn-danger fun" onclick="deleteCookie('${name}')">Delete</button>
        </td>
      `;
        
    console.log(row);
    tableBody.appendChild(row);
    }
    return cookiearray;
}
function populateList(){
    var cookiearray = getAllCookie();
    if(cookiearray.length==0){
        return;
    }
    var tableBody = document.querySelector(".table tbody");
    tableBody.innerHTML = "";
    for( var i=0; i<cookiearray.length;i++){
        var row = document.createElement("tr");
        var parts = cookiearray[i].split('=');
        var name = parts[0];
        var value = parts[1];
        var expiration = getCookieExpiration(name);
        var id = i +1;
        row.innerHTML = `
        <th scope="row">${id}</th>
        <td>${name}</td>
        <td>${value}</td>
        <td>${expiration}</td>
        <td>
          <button type="button" class="btn btn-warning fun" onclick="editCookie('${name}', '${value}')">Edit</button>
          <button type="button" class="btn btn-danger fun" onclick="deleteCookie('${name}')">Delete</button>
        </td>
      `;
        
    console.log(row);
    tableBody.appendChild(row);
    }
}
function editCookie(name){
    var newValue = prompt("Enter new value");
    var newExdays = prompt("Enter new expiration days");
    const d = new Date();
    d.setTime(d.getTime() + (newExdays*24*60*60*1000));
    const expires = "expires="+d.toUTCString();
    document.cookie = name + "=" + newValue + ";" + expires + ";path=/";
    populateList();
    console.log("edited "+ name);
}
function deleteCookie(name){
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/;';
    populateList();
    console.log("deleted "+ name);
}
