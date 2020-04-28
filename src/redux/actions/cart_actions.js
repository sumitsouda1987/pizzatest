export const ADD_TO_CART = "ADD_TO_CART";
export const REMOVE_FROM_CART = "REMOVE_FROM_CART";

export function addToCartAction({id,name,description,image,price,total_price,catname,quantity}){
	return{
		type: ADD_TO_CART,
		payload: {id,name,description,image,price,total_price,catname,quantity}
	}
}

export function removeFromCartAction({id,name,description,image,price,total_price,catname,quantity}){
	return{
		type: REMOVE_FROM_CART,
		payload: {id,name,description,image,price,total_price,catname,quantity}
	}
}