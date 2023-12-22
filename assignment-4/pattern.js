
let initial = "";       //empty variable
for(let i=0; i<=6; i++){
    for(let j=0; j<4; j++){
        if( i===0 || i===3 || j===0 || (j===3 && i<=3)){
        initial += "* ";
        }else if(i===3 || j===(i-3) ){
            initial += "*"
        }
        else{
            initial+= "   "
        }
    }
    initial +=" \n";
}
console.log(initial);