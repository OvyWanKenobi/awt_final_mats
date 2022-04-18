import {useState} from 'react';
import axios from 'axios';
import {Link} from 'react-router-dom';
import {BrowserRouter as Redirect,Router,Route,Routes} from 'react-router-dom';

const Loginbox=()=>{
    const[uname,setUname] = useState("");
    const[pass,setPass] = useState("");
    const[msg,setMsg] = useState("");
    const handleForm=(e)=>{
       
        e.preventDefault();
        var obj = {uname:uname,pass:pass};
        axios.post("http://127.0.0.1:8000/api/login",obj).then(
        (succ)=>{
        // debugger;
           // window.alert(succ.data.msg);
           console.log(succ);
          
            if(succ.status == 200){
                setMsg("Login Successful");
                window.location.href = "/Home" 

            }
            else {
               
                setMsg("Login failed");
            }
        },
        (err)=>{
            //debugger;
            //window.alert(err);
            console.log(err.data);
            setMsg("Login failed! Incorrect Credentials given.");
        });
       
    }
    return (

        <div  id="logindiv">
        <h2 id="loginh2">LOGIN</h2>

        <form class="form-floating" onSubmit={handleForm}>

        
            <div class="form-floating">

                <input className='form-control'  value={uname} id="username" type="text" onChange={function(e){setUname(e.target.value)}} placeholder="Username"/>
                <label  for="username">Username</label><br />
               

            </div>
            
            <div class="form-floating">
                <input className='form-control' id="u_password" type="password" value={pass} onChange={(e)=>{setPass(e.target.value)}} placeholder="Password"/>
                <label  for="u_password">Password</label><br />


            </div>
            <input class="btn btn-primary" style={{height:40, width:80, fontSize:16}} type="submit" value="Login"/>


            <br></br><span style={{color:"red", fontSize:"large"}}>{msg}  </span>
        
        </form> 


        <div>
            <br/>
            <h5 >Not registered, yet?  <Link class="btn btn-success" to="/Register">Register Here</Link>  </h5>
           
        </div>
    </div>
    )
}
export default Loginbox;