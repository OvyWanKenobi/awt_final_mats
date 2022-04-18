import {useState,useEffect} from 'react';
import axios from 'axios';
const Posts =()=>{
    const [st,setSt] = useState({});

    /*useEffect(()=>{

    },[]);*/
    useEffect(function(){
        axios.get("https://localhost:44342/api/student/3").then(function(rsp){
            setSt(rsp.data);
        },function(err){

        });
    },[]);

    return (
        <div>
            <span>{st.Name}</span>
        </div>
    )
}

export default Posts;