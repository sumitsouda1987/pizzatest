import React from 'react';

const CheckoutItems = ({id,name,description,image,price,quantity,total_price}) => {
	return(
		<div className="checkout-items-container">
            <div className="checkout-items">
                <div className="cart-item" data-label="cart-item-entry">
                    <div className="col-dir">
                        <div className="flex">
                            <div className="image-wrapper">
                            	<img src={image} alt={name}/>
                            </div>
                            <div className="desc-container">
                                <div className="width100">
                                	<span className="item-name">{name}</span>
                                	<span className="item-desc">{description}</span>
                                    <div className="price-box">
                                        <div className="price">
                                            <div className="price-final" data-label="cart-item-price">
                                            	<span className="dollar"> {total_price}</span>
                                        	</div>
                                        </div>
                                    </div>
                                    <div className="item-option">
		                            	<span>Price per item - <span className="dollar">{price}</span></span>
		                            	<span>|</span>
		                            	<span>Total quantity - {quantity}</span>
		                        	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	);
}

export default CheckoutItems;