import background from './Media/dd.mp4';
import './style.css';
import Header from './Header';
import Registerbox from './Registerbox.js';

const Register=()=>{

    return (
        
        <div>
     
          <div style={{position:"fixed"}}>
          <Header/>
           <video id='bg-vdo' autoPlay muted loop >
            <source src={background} type="video/mp4"/>
            </video>
            </div>
          
            <Registerbox/>
        </div>
    )
}
export default Register;