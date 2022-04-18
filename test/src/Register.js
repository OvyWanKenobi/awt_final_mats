import {useState} from 'react';
import axios from 'axios';

const Register=()=>{
    const [name,setName] = useState("");
    const [id,setId] = useState("");
    const [email,setEmail] = useState("");
    const [dob,setDob] = useState("");

    const handleForm=(e)=>{
        e.preventDefault();
        var obj = {name:name,s_id:id,email:email,dob:dob};
        axios.post("http://127.0.0.1:8000/api/student/add",obj).then((resp)=>{
            debugger;
        },(err)=>{});

    }
    return(
        <form onSubmit={handleForm}>
            <input type="text" value={name} onChange={(e)=>{setName(e.target.value)}} placeholder='Name'></input> <br/>
            <input type="text" value={id} onChange={(e)=>{setId(e.target.value)}} placeholder='student Id'></input><br/>
            <input type="text" value={email} onChange={(e)=>{setEmail(e.target.value)}} placeholder='email'></input><br/>
            <input type="text" value={dob} onChange={(e)=>{setDob(e.target.value)}} placeholder='dob'></input><br/>
            <input type="submit" value="Add"/>
        </form>
    )

}
export default Register;
