let obj1 = {
    name1 : "Rahul",
    Age : 21,
    
    // run:()=>{
    //   alert("Run obj 1");
    // }
  }
  console.log(obj1);
  
  let obj2 ={
    run:()=>{
      alert("Run obj 2");
    }
  }
  
  obj1.__proto__ = obj2;
  obj2.__proto__ ={
    name : "Rajput",
  }

  obj1.run();
console.log(obj1.name);