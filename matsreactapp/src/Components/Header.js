import {Link} from 'react-router-dom';
import matslogo from './Media/mats.png';
const Header=()=>{

    return (
        <div  >
        <nav id="nav" class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
            <li class="nav-item">
            <Link  to="/"><img style={{width:"auto", height:70, padding: 5}} src={matslogo} alt="Avatar Logo" /> </Link>
            </li>   
          
            <li class="nav-item">
                 <Link id="link" class="nav-link" to="/Login">Login</Link>
            </li>
            <li class="nav-item">
                  <Link  id="link" class="nav-link" to="/Register">Register</Link>
            </li>
            </ul>
        </div>
        </nav>

        </div>
    )
}
export default Header;
