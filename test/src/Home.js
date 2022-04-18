import Login from './Login';
import Header from './Header';
import Product from './Product';
function Home (){

    return(
        <div>
            
            <h1>Hello from React app</h1>
            <p>This is a paragraph of react app</p>
            <Login></Login>
            
            <Product Name ="I Phone" Price="120 K"></Product>
            <Product Name="Samsung" Price="20 K"></Product>
            <Product Name="Redmi" Price="20 K"></Product>
            <Product Name="One Plus" Price="60 K"></Product>
            
        </div>
        
    )

}
export default Home;