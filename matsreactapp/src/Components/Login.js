import background from './Media/cc.mp4';
import './style.css';
import Header from './Header';
import Loginbox from './Loginbox.js';

const Login=()=>{

    return (
        
        <div >
           
                <div style={{position:"fixed"}}>
                            
                <Header/>
                        <video id='bg-vdo' autoPlay muted loop >
                            <source src={background} type="video/mp4"/>
                            </video>
                
                </div>
                <div>

                <Loginbox/>
            
                </div>
                
        </div>
    )
}
export default Login;