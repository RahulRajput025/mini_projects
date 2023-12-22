function glowStar(){
    let iconItem;
    let inputVal = document.getElementById("inputVal").value ;
    let divBox = document.querySelector('section').querySelectorAll('div.icon-container');
    
    divBox.forEach((item)=>{
        let row = item.querySelectorAll('span')
        row.forEach((x,i)=>{
            iconItem = x.querySelector('i');
            iconItem.classList.remove('active', 'fa-fade' );  
            iconItem.classList.add('inactive');            
        })
    })  


    if(inputVal>0 && inputVal<6){
            divBox.forEach((item)=>{
                let row = item.querySelectorAll('span')
                row.forEach((x,i)=>{
                    if(i<=inputVal-1){
                        iconItem = x.querySelector('i');
                        iconItem.classList.remove('inactive');
                        iconItem.classList.add('active', 'fa-fade' );
                    } 
                })
            })  
    }
    else{
        if(document.body.firstElementChild.nodeName!="H2"){
            let newDiv=document.createElement("h2");
            let newContent = document.createTextNode("Please Enter Valid Number Between 1 to 5 !!!");
            newDiv.classList.add('txt-center', 'bg-primary','transition');
            newDiv.appendChild(newContent);
            document.body.insertBefore(newDiv,document.querySelector('.sec01'));
            document.getElementById("inputVal").value ='';
            
            setTimeout(()=>{
                document.body.childNodes[1].remove()    
            },2000) 
        
        }
    }   
}