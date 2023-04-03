// var exit=false;
// let col="";
// document.getElementById("start").onclick=function(){funcStart()};
// function funcStart(){
//     document.getElementById("start").style.display="none";
// //     document.getElementById("start").innerHTML=`<div class="btn-group">
// //     <button id="create" class="btn btn-success">Create</button>
// //     <button id="addCol" class="btn btn-success">Add col</button>
// //     <button class="btn btn-success">Add row</button>
// //     <button class="btn btn-success">Delete</button>
// //     <button class="btn btn-success">Clear All</button>
// // </div>`;
//     const allBut=document.createElement("div");
//     const allButText=document.createTextNode("These are buttons");
//     allBut.appendChild(allButText);
    
//     const but1=document.createElement("button");
//     but1.textContent="newNUt";


// document.getElementById("create").addEventListener("click", function() {
//   creatTable();
// });
//     function creatTable(){
      
//       exit=true;
      
//       // document.getElementById("create").onclick=function(){funcCreate()};
//       // function funcCreate(){
//       document.getElementById("creat").innerHTML=`
//       <table id="tab" class="table">
//         <thead>
//           <tr>
//             <th scope="col">#</th>
//             <th scope="col">First</th>
//             <th scope="col">Last</th>
//           </tr>
//         </thead>
//         <tbody class="table-group-divider">
//           <tr>
//             <th scope="row">1</th>
//             <td>Mark</td>
//             <td>Otto</td>
//           </tr>
//           <tr>
//             <th scope="row">2</th>
//             <td>Jacob</td>
//             <td>Thornton</td>
//           </tr>
//         </tbody>
//        </table>`;
//       //}
      
//     }
    
    

//   document.getElementById("addCol").addEventListener("click", function(){
//     if(exit){
//       //document.getElementById("creat").innerHTML="OK!";
//       let x=document.getElementById("tab");
//       const newHeader=document.createElement('th');
//       newHeader.textContent=`Header ${x.rows[0].cells.length}`;
//       x.rows[0].appendChild(newHeader);
//       for(let i=1;i<x.rows.length;i++){
//         const newRow=document.createElement("td");
//         newRow.textContent=`Row ${i} Column ${x.rows[i].cells.length}`;
//         x.rows[i].appendChild(newRow);
//       }
//     } else{
//       alert("table's not exit! U nead create new one before addCol!");
//     }
//   });  
// }

const curEle=document.getElementById("creat");
document.getElementById("btn").onclick= function(){
  document.getElementById("start").style.display="none";
  createButton();
}
function createButton(){
  const allBut= document.createElement("div");
  allBut.className="btn-group";
  document.body.insertBefore(allBut,curEle);
  const arr=["create table", "add col", "add row", "delete col", "delete row", "clear"];
  for(let i =0;i<6;i++){
    var firBut= document.createElement("button");
    const firButName= document.createTextNode(arr[i]);
    firBut.appendChild(firButName);
    allBut.appendChild(firBut);
    document.getElementById("buttonHere").appendChild(allBut);
    firBut.id="but"+i;
    console.log("but"+i);
    firBut.className="btn btn-success";
    if(i==0){
      firBut.addEventListener("click",function(){
        createTable();
      })
    } else if(i==1){
      firBut.addEventListener("click", addColTable);
    } else if(i==2){
      firBut.addEventListener("click", function(){
        addRowTable();
      })
    } else if(i==3){
      firBut.addEventListener("click", delColTable);
    } else if(i==4){
      firBut.addEventListener("click", delRowTable);
    } else if(i==5){
      firBut.addEventListener("click", clearTable);
    }
  }
}

function createTable(){
  const tableRoot= document.createElement("table");
  const theadRoot= document.createElement("thead");
  const tbodyRoot= document.createElement("tbody");
  for(let i=0;i<2;i++){
    const trRoot= document.createElement("tr");
    
    
    if(i==0){
      for(let j=0;j<2;j++){
      const thText=document.createTextNode("Col "+j+" Row "+i);
      const thRoot= document.createElement("td");
        thRoot.appendChild(thText); 
        trRoot.appendChild(thRoot);
        theadRoot.appendChild(trRoot);
      }
      tableRoot.appendChild(theadRoot);
   } else{
    for(let j=0;j<2;j++){
      const tdText=document.createTextNode("Col "+j+" Row "+i);
      const tdRoot= document.createElement("td");
        tdRoot.appendChild(tdText); 
        trRoot.appendChild(tdRoot);
        tbodyRoot.appendChild(trRoot);
      }
    tableRoot.appendChild(tbodyRoot);
   }
    //tbodyRoot.appendChild(trRoot);
  }
  document.body.insertBefore(tableRoot,curEle);
  console.log("here are table");
  tableRoot.className="table table-hover";
  document.getElementById("tableHere").appendChild(tableRoot);
  // tableRoot.theadRoot.trRoot.thRoot.scope="col";
  document.getElementById("but0").disabled=true;
  tableCur = document.getElementsByClassName("table table-hover")[0];
}
var tableCur ;
function addColTable(){
  console.log(tableCur);
  const rows=tableCur.rows;
  for(let i=0;i<rows.length;i++){
    const row=rows[i];
    const cell=row.insertCell();
    cell.textContent="Col "+(tableCur.rows[0].cells.length-1)+" Row "+i;
  }
}

function addRowTable(){
  console.log(tableCur);
  const rowNew=tableCur.insertRow();
  for(let i=0;i<tableCur.rows[0].cells.length;i++){
    const cellNew=rowNew.insertCell();
    cellNew.textContent="Col "+i+" Row "+(tableCur.rows.length-1);
  }
}

function delColTable(){
  console.log("dele col");
  //window.alert("what cell u want to delete?");
  const a=window.prompt("What is the number of column u want to delete?");
  console.log(`a=${a}`);
  var col;
  if(a==null||a==""){ return };
  for(let i=0;i<tableCur.rows[0].cells.length;i++){
   // console.log(tableCur.rows[0].cells[i].textContent);
    if(tableCur.rows[0].cells[i].textContent==`Col ${a} Row 0`){
      col=i;
      break;
    }
    if(i==tableCur.rows[0].cells.length-1){
      alert("This col is not exist! Attend about label in every Col in the table, don't count!");
      return;
    }
  }
  for(let i=0;i<tableCur.rows.length;i++){
    const row=tableCur.rows[i];
    row.deleteCell(col);
  }
}
function delRowTable(){
  const a=window.prompt("What is the number of row u want to delete?");
  console.log(`a=${a}`);
  var row;
  if(a==null||a==""){ return };
  for(let i=0;i<tableCur.rows[0].cells.length;i++){
      console.log(tableCur.rows[i].cells[0].textContent);
     if(tableCur.rows[i].cells[0].textContent==`Col 0 Row ${a}`){
       row=i;
       break;
     }
     if(i==tableCur.rows.length-1){
       alert("This row is not exist! Attend about label in every row in the table, don't count!");
       return;
     }
   }
  tableCur.deleteRow(row);
}
function clearTable(){
  document.getElementById("tableHere").innerHTML="";
  document.getElementById("but0").disabled=false;
}