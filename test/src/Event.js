import {useState} from 'react';

const Event=()=>{
    const [a,setA] = useState(0); //notifying react a variable need to be updated in vDOM

    function msg()
    {
        setA(a+1);
        console.log(a);
    }

    return (
        <div>
            <h1>{a}</h1>
            <button onClick={msg}>Click Me</button>
        </div>
    )
}
export default Event;