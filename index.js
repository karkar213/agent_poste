// hover event

const tableD = document.querySelectorAll(' .t-agentposte .bodyt');
const tablp=document.querySelectorAll('.t-agentposte .poste');

// var btn=document.getElementById('btaj')
var id=""
var idp=""
const btn=document.getElementById("btaj")
for (let index = 0; index < tableD.length; index++) {
    tableD[index].addEventListener('mouseover', () => {
        
        Array.from(tableD[index].children).forEach(child => {
            child.classList.add('highlight');
        });
    })

    tableD[index].addEventListener('mouseout', () => {
        
        Array.from(tableD[index].children).forEach(child => {
            child.classList.remove('highlight');
        });
    })

    tableD[index].addEventListener('click', () => {
                 Array.from(tableD[index].children).forEach(child => {
                child.classList.add('highlight-click')
                });
       
    })
}

for (let index = 0; index < tablp.length; index++) {
    tablp[index].addEventListener('mouseover', () => {
        
        Array.from(tablp[index].children).forEach(child => {
            child.classList.add('highlight');
        });
    })

    tablp[index].addEventListener('mouseout', () => {
        
        Array.from(tablp[index].children).forEach(child => {
            child.classList.remove('highlight');
        });
    })

    tablp[index].addEventListener('click', () => {
                 Array.from(tablp[index].children).forEach(child => {
                child.classList.add('highlight-click')
                });
       
    })
}


for (let index = 0; index < tableD.length; index++){
    tableD[index].addEventListener('click',()=>{
        id=tableD[index].children[0].innerHTML;
        

        
    })

}


for (let index = 0; index < tablp.length; index++){
    tablp[index].addEventListener('click',()=>{
        idp=tablp[index].children[0].innerHTML;
        
    })

}
btaj.addEventListener('click',()=>{
   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("jj").innerHTML=id+idp;
            
          }
        };
        xmlhttp.open("POST", "index.php" , true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.send("p="+id+"?q"+idp);
})