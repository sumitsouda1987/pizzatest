import {ADD_TO_CART} from '../actions/cart_actions';
import {REMOVE_FROM_CART} from '../actions/cart_actions';

export default function cartReducer(state = [], action = {}){

	if(action.type === ADD_TO_CART){
		const product = action.payload;
		const cart = state;

		const existingProductIndex = findProductIndex(cart, product.id);

		const updatedCart = existingProductIndex >= 0 ? updateProductQuantity(cart, product, action.type) : [...cart, product];

		return updatedCart;
	}
	else if(action.type === REMOVE_FROM_CART){
		const product = action.payload;
		const cart = state;

		const existingProductIndex = findProductIndex(cart, product.id);

		const updatedCart = existingProductIndex >= 0 ? updateProductQuantity(cart, product, action.type) : [...cart, product];

		return updatedCart;
	}

	return state;
}

const findProductIndex = (cart, productID) => {
	return cart.findIndex(p => p.id === productID);
}

const updateProductQuantity = (cart, product, actionType) => {
	const productIndex = findProductIndex(cart, product.id);

	const updatedCart = [...cart];
	const existingProduct = updatedCart[productIndex];

	const ProductQuantity = (actionType===ADD_TO_CART) ? (existingProduct.quantity + product.quantity) : (existingProduct.quantity - product.quantity);

	if(ProductQuantity === 0){
		return cart.filter((_, i) => i !== productIndex);
	}
	else{
		const updatedQuantityProducts = {
			...existingProduct,
			quantity: ProductQuantity,
			total_price: (existingProduct.price * ProductQuantity).toFixed(2)
		}

		updatedCart[productIndex] = updatedQuantityProducts;
	}	

	return updatedCart;
}