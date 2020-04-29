import React from 'react';

function Card({id,name,description,image,price,total_price,catname,addFunc,removeFunc}){
	return (
		<div className="item-wrapper">
			<div className="item-block" data-label={name}>
				<div className="item">
					<div className="wd-100">
						<div className="image-block">
							<div className="img-cover">
								<img className="img-wrpr__img" src={image} alt={name}/>
							</div>
							<div className="item-price">
								<span className="dollar">{price}</span>
							</div>
							<div className="item-type">
								<div className={catname==='Non-Veg Pizza'?'non_veg':'veg'}></div>
							</div>
						</div>
					</div>
					<div className="item-content-wrapper">
						<div className="item-description">
							<span className="item-name">{name}</span>
							<span className="description" title={description}>{description}</span>
						</div>
						<div className="item-add-to-cart-section">
							<div className="add-to-cart">
								<button 
									data-label="addTocart" id={id}
									onClick={()=>addFunc({id,name,description,image,price,total_price,catname,quantity:1})}><span>ADD TO CART</span></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	);
}

export default Card;