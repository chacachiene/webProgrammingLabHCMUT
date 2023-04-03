var allCal= document.getElementById("wholeCal");

//var screen=allCal.querySelector('.screen');
var screen=document.getElementById("resultHere");
var textOpe=document.getElementById("operateHere");
console.log(screen);
screen.innerHTML="0";
console.log(screen);
var numToCal=0;
var numHis=0;
const queue=[{num:null}, {operate:""},{num:null}];
var result=false;
var allBut=document.getElementsByClassName("but"); //this is a arr
    Array.from(allBut).forEach(element => {
        element.addEventListener("click", function(){
           
            if(screen.textContent=="0"){
                screen.textContent="";
            }
            if(element.className=="but func col"){
                if(element.id=="delete"){
                    if(screen.textContent!="0"){
                        const str=screen.textContent;
                        screen.textContent=str.slice(0, str.length-1);
                        if(screen.textContent==""){
                            screen.textContent="0";
                        }
                    } 
                }
                if(element.id=="square"){
                    numToCal=Number(screen.textContent);
                    queue[0].num=numToCal;
                    console.log(queue);
                    square();
                } else if(element.id=="radical"){
                    numToCal=Number(screen.textContent);
                    queue[0].num=numToCal;
                    radical();
                }
                else if(!result){
                    numToCal=Number(screen.textContent);
                    if(queue[0].num==null){
                        queue[0].num=numToCal;
                    } else{
                        queue[2].num=numToCal;
                        calculate();
                    }
                } 
                if(element.id=='plus'){
                    queue[1].operate="+";
                } else if(element.id=="minus"){
                    queue[1].operate="-";
                } else if(element.id=="multi"){
                    queue[1].operate="*";
                } else if(element.id=="divide"){
                    queue[1].operate=":";
                } else if(element.id=="clear"){
                    queue[0].num=null;
                    queue[2].num=null;
                    queue[1].operate="";
                    screen.textContent="0";
                    textOpe.textContent="";
                } else if(element.id=="equal"){
                    queue[1].operate="";
                    queue[2].num=null;
                } 
                result=true;
            } 
            else{
                if(result){
                    screen.textContent=" ";
                    result=false;
                }  
                screen.innerHTML+=element.textContent;
            }
            function calculate() {
                textOpe.textContent = queue[0].num + queue[1].operate + queue[2].num + "=";
                switch(queue[1].operate) {
                    case "+":
                        queue[0].num = queue[0].num + queue[2].num;
                        break;
                    case "-":
                        queue[0].num = queue[0].num - queue[2].num;
                        break;
                    case "*":
                        queue[0].num = queue[0].num * queue[2].num;
                        break;
                    case ":":
                        queue[0].num = queue[0].num / queue[2].num;
                        break;
                }
                screen.textContent = queue[0].num;
                queue[2].num = null;
                result = true;
            }
            function square(){
                textOpe.textContent=queue[0].num+"^2 = "
                queue[0].num=queue[0].num*queue[0].num;
                screen.textContent=queue[0].num;
                queue[2].num=null;
                result=true;
            }
            function radical(){
                textOpe.textContent="sqrt("+queue[0].num+") = "
                queue[0].num=Math.sqrt(queue[0].num);
                screen.textContent=queue[0].num;
                queue[2].num=null;
                result=true;
            }
        })
    });
