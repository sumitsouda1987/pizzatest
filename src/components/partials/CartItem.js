import React from 'react';

const CartItem = ({id,name,description,image,price,total_price,catname,quantity,addFunc,removeFunc}) => (
	<div className="cart-body" key={id}>
        <div className="cart-item-body">
            <div className="cart-item">
                <div className="cart-image">
                    <img src={image} alt={image}/>
                </div>
                <div className="cart-item-description">
                	<span className="cart-item-name">{name}</span>
                	<span className="description-text">{description}</span>
                </div>
            </div>
            <div className="cart-quantity-container">
            	<span className="price-text">
            		<span className="dollar">{total_price}</span>
        		</span>
                <div className="quantity-section" data-label="quantity">
					<div className="decrease" data-label="decrease" onClick={()=>removeFunc({id,name,description,image,price,total_price,catname,quantity:1})}></div>
					<span className="quantity">{quantity}</span>
					<div className="increase" data-label="increase" onClick={()=>addFunc({id,name,description,image,price,total_price,catname,quantity:1})}></div>
				</div>
            </div>
            <div className="cart-item-divider"></div>
        </div>
    </div>
)

export default CartItem;