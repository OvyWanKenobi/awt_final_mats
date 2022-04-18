import {useState} from 'react';
import axios from 'axios';
import {Link} from 'react-router-dom';

const Registerbox=()=>{
    const[insname,setName] = useState("");
    const[insuname,setUname] = useState("");
    const[inspass,setPass] = useState("");
    const[insconpass,setConpass] = useState("");
    const[insdegree,setDegree] = useState("");
    const[insexp,setExp] = useState("");
    const[insemail,setEmail] = useState("");
    const[insphone,setPhone] = useState("");
    const[insbio,setBio] = useState("");
    const[msg,setMsg] = useState("");

    const handleForm=(e)=>{
        e.preventDefault();
        var obj = {insuname:insuname,insname:insname,inspass:inspass,insconpass:insconpass,insdegree:insdegree,insexp:insexp,insemail:insemail,insphone:insphone,insbio:insbio};
       //debugger;
        axios.post("http://127.0.0.1:8000/api/register",obj).then(
        (succ)=>{
            debugger;
            if(succ.status == 200){
              //  axios.post("http://127.0.0.1:8000/api/sendmail",obj);
                
               // console.log(succ)
               // setMsg("Register Successfull");
               window.alert("Registration was Successful")
               window.location.href = "/Login" 
            }
            else {
                //console.log(succ)
                setMsg("Registration failed." + succ.data.msg);
            }
        },
        (err)=>{
            debugger;
            if(err){
                window.alert("Registration Unsuccessful")
            }
          
        });
       
    }
    return (

        <div  id="logindiv">
        <h2 id="regh2">Register</h2>
        <div>
            
            <h5 >Already registered?  <Link class="btn btn-success" to="/Login">Login Here</Link>  </h5>
        <br></br>
        </div>

        <form class="form-floating" onSubmit={handleForm}>
            <div class="form-floating">
                <input class="form-control"  value={insname} id="insname" type="text" onChange={function(e){setName(e.target.value)}} placeholder="Full Name"/>
                <label  for="username">Full Name</label><br />
            </div>
            <div class="form-floating">
                <input class="form-control"  value={insuname} id="username" type="text" onChange={function(e){setUname(e.target.value)}} placeholder="Username"/>
                <label  for="username">Username</label><br />
            </div>
            <div class="form-floating">
                <input class="form-control" id="password" type="password" value={inspass} onChange={(e)=>{setPass(e.target.value)}} placeholder="Password"/>
                <label  for="password">Password</label><br />
            </div>
            <div class="form-floating">
                <input class="form-control" id="conpassword" type="password" value={insconpass} onChange={(e)=>{setConpass(e.target.value)}} placeholder="Re-type Password"/>
                <label  for="conpassword">Re-type Password</label><br />
            </div>
            <div class="form-floating">
                <input class="form-control" id="degree" type="text" value={insdegree} onChange={(e)=>{setDegree(e.target.value)}} placeholder="Degree"/>
                <label  for="degree">Degree</label><br />
            </div>
            <div class="form-floating">
                <input class="form-control" id="experience" type="text" value={insexp} onChange={(e)=>{setExp(e.target.value)}} placeholder="Experience"/>
                <label  for="experience">Experience</label><br />
            </div>
            
            <div class="form-floating">
                <input class="form-control" id="bio" type="text" value={insbio} onChange={(e)=>{setBio(e.target.value)}} placeholder="Bio"/>
                <label  for="bio">Bio</label><br />
            </div>
            <div class="form-floating">
                <input class="form-control" id="email" type="email" value={insemail} onChange={(e)=>{setEmail(e.target.value)}} placeholder="Email"/>
                <label  for="email">Email</label><br />
            </div>
            <div class="form-floating">
                <input class="form-control" id="phone" type="tel" value={insphone} onChange={(e)=>{setPhone(e.target.value)}} placeholder="Phone"/>
                <label  for="phone">Phone</label><br />
            </div>
            
        
            <input class="btn btn-primary" style={{height:40, width:80, fontSize:16}} type="submit" value="Register"/>
         <br></br> 
            <span style={{ color:"red"}} >{msg}</span>
        
        </form> 


        
    </div>
    )
}
export default Registerbox;