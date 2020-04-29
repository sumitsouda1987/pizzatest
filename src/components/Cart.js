import React from 'react';
import emptyCartImage from '../assets/images/empty_cart.png';
import CartItem from './partials/CartItem';
import {Link} from 'react-router-dom';
import Auth from '../services/Auth';

class Cart extends React.PureComponent {

	addToCart = (product) => {
		this.props.addToCartAction(product);
	};

	removeFromCart = (product) => {
		this.props.removeFromCartAction(product);
	};
	
	render(){
		const loginRegLink = (
								<Link to='/login' className="cart-checkout">
									<button><span>CHECKOUT</span></button>
								</Link>
							)
		const checkoutLink = (
								<Link to='/checkout' className="cart-checkout">
									<button><span>CHECKOUT</span></button>
								</Link>
							)
		
		const {cart} = this.props;
		const totalPrice = cart.reduce((sum, item) => sum + item.quantity * item.total_price, 0);
		
		return(
			<div className="cart-container">				
				{
					(!cart.length)
					?
					<div className="cnt">
						<div className="empty-cart" data-label="empty-scrn">
							<img src={emptyCartImage} className="img" alt="Empty Cart"/>
							<div className="text-wrapper">
								<span className="empty-message">Your Cart is Empty</span>
								<span className="add-message">Please add some items from the menu.</span>
							</div>
						</div>
					</div>						
					:
					<div>
						<div className="cnt">
							<hr className="cart-items-hr" />
							<div className="cart-item-container">
								{cart.map(item => <CartItem {...item} key={item.id} addFunc={this.addToCart} removeFunc={this.removeFromCart}/>)}
							</div>
						</div>
						<div className="cart-checkout-container">
							<div className="cart-sub-total">
								<span className="sub-total-text">Subtotal</span>
								<span className="dollar sub-total">{totalPrice.toFixed(2)}</span>
							</div>
							{Auth.checkIfAuthenticated() ? checkoutLink : loginRegLink}
						</div>
					</div>
				}			
			</div>
		);
	}
}

export default Cart;