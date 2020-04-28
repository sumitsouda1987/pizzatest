import React from 'react';
import Auth from '../../services/Auth';
import Api from '../../Api/Api';
import ApiEndpoints from '../../Api/ApiEndpoints';
import {withRouter} from 'react-router-dom';

class PlaceOrder extends React.Component{

	async handlePlaceOrder(event){
		event.preventDefault();
		
		const shipping_charges = 20;
		const address_id = this.props.addressid;

		if(!address_id){
			alert('Please select delivery address');
			return false;
		}

		const serializedState = localStorage.getItem('state');
	    const result = JSON.parse(serializedState);
	    const postData = result.cart;

		const token = Auth.getAccessToken();
		
		await Api.post(ApiEndpoints.place_order,
			{cart:postData, address:address_id, shipping_charges:shipping_charges},
			{headers: {
					'Accept' :'application/json',
					'Authorization': 'Bearer ' + token
				}
			}).then((res) => {
				localStorage.removeItem('state');
				this.props.history.push('/order-success');
			})
		 	.catch((err) => {
		   		console.log("ERROR: ====", err);
	 		});
	}

	render(){
		const shipping_charges = 20;

		return(
			<div className="place-order-container">
	        	<span className="sub-heading" data-label="items_count">Price Details</span>
	            <div className="final-price-box">
	                <div className="final-price-wrapper">
	                    <div className="text-wrapper">
	                    	<span className="order-text" data-label="cart_subtotal">Sub Total</span>
	                    	<span className="order-amount"><span className="dollar">{Number(this.props.totalPrice).toFixed(2)}</span></span>
	                    </div>
	                    <div className="text-wrapper">
	                    	<span className="order-text">Shipping</span>
	                    	<span className="order-amount" data-label="cart_gst">
	                    	<span className="dollar">{Number(shipping_charges).toFixed(2)}</span></span>
	                    </div>
	                    <div className="grand-total-hr"></div>
	                    <div className="text-wrapper marginTop">
	                    	<span className="txt-bold order-text">Grand Total</span>
	                    	<span className="txt-bold order-amount" data-label="cart_total">
	                    	<span className="dollar">{Number(shipping_charges+this.props.totalPrice).toFixed(2)}</span></span>
	                    </div>
	                    <div className="grand-total-hr"></div>
	                    <div className="button-green">
	                        <button data-label="Place Order" onClick={event => this.handlePlaceOrder(event)}><span>Place Order</span></button>
	                    </div>
	                </div>
	            </div>
	        </div>
		);
	}
}

export default withRouter(PlaceOrder);