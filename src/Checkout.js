import React,{useEffect, useState} from 'react';
import Layout from './components/layout/Layout';
import CheckoutItems from './components/partials/CheckoutItems';
import CustomerAddress from './components/CustomerAddress';
import PlaceOrder from './components/partials/PlaceOrder';
import {Link,withRouter} from 'react-router-dom';
import Auth from './services/Auth';

function Checkout(props){
  	useEffect(()=>{
		fetchCartData();
	},[]);

	const [cartData, setCartData] = useState([]);
	const [totalPrice, setTotalPrice] = useState();
	const [totalQuantity, setTotalQuantity] = useState();
	const [selectedaddress, setSelectedaddress] = useState();

	const handleChange = (e) => {
		setSelectedaddress(e.target.value);
	}

	const fetchCartData = async() => {

		const serializedState = localStorage.getItem('state');
		const result = JSON.parse(serializedState);
		
		if(!result.cart.length || !Auth.checkIfAuthenticated()){
			props.history.push('/');
			return false;
		}

	    
		setCartData(result.cart);
		
		const totalPrice = result.cart.reduce((sum, item) => sum + item.quantity * item.price, 0);
		setTotalPrice(totalPrice);

		const totalQuantity = result.cart.reduce((sum, item) => sum + item.quantity, 0);
		setTotalQuantity(totalQuantity);
	};
	
	return(
		<Layout>
			<div className="checkout-container">
				<div className="left">
				    <div>
				        <div className="inr-lft">
				            <div className="item-list-box">
				                <div>
				                    <div data-label="itemsList">
				                        <div className="sub-heading">
				                        	<span className="sub-heading-text" data-label="items_count">{totalQuantity} {totalQuantity===1?'Item':'Items'} you have selected</span>
				                            <Link to="/" className="menu-link">
				                                <button datalabel="Explore Menu" className="btn--noStyle">
				                                	<span>Explore Menu</span>
			                                	</button>
				                            </Link>
			                            </div>
				                        <div>
				                        	{cartData.map(item => {
												return(
													<CheckoutItems key={item.id} {...item}/>
												)
											})}
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
				<div className="right">
		    		<div className="inr-rght" >
		    			<CustomerAddress 
		    				handleChange={handleChange.bind(this)} 
		    				value={selectedaddress}
	    				/>
		    			<PlaceOrder 
		    				totalQuantity={totalQuantity} 
		    				totalPrice={totalPrice} 
		    				addressid={selectedaddress}
	    				/>
		    		</div>
				</div>
			</div>
		</Layout>
	)
}

export default withRouter(Checkout);