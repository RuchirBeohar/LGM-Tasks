import React from 'react';
import "./app.css"
import 'bootstrap/dist/css/bootstrap.min.css';
import * as ReactBootStrap from 'react-bootstrap';

const Loader = () => {
   const [result, setResult] = React.useState([]); 
   const [loader, setLoader] = React.useState(false);

    const click = async() =>{
            let url = 'https://reqres.in/api/users?page=1';
            let res = await fetch(url);
            let d = await res.json();
            if(d.data){
              setLoader(false);
            }
            setResult(d.data);
    }  
  
    const caller = ()=>{
         setLoader(true);  
         setTimeout(click, 2000);

    }

    return (
        <>
          <div className="nav">
              <h1>USERS</h1>
              <button id="get" onClick={caller}>GET USERS</button>    
          </div>  
           
           {loader ? (
          <div class="load">
            {<ReactBootStrap.Spinner animation="border" />}
          </div>
         ) : (
           result.map((curElem) => {
              return(
                <div class = "userData">
                   <br></br>
                  <img className="img" src={curElem.avatar}></img>
                  <h2><center>{curElem.first_name} {curElem.last_name}</center></h2>
                  <p><center>{curElem.email}</center></p>
                  <p><center>ID NO. {curElem.id}</center></p>
               </div>

                
               );
            }) 
         )} 
         </>
    );
}
export default Loader;
