import React from 'react';
import Layout from './components/layout/Layout';
import TopMenu from './components/layout/TopMenu';
import AllProducts from './components/AllProducts';
import Cart from './components/Cart';
import {connect} from 'react-redux';
import {bindActionCreators} from 'redux';
import {addToCartAction, removeFromCartAction} from './redux/actions/cart_actions';

class Home extends React.Component{
	render(){
		const {cart, addToCartAction, removeFromCartAction} = this.props;
		return(
			<div>
				<Layout>
					<TopMenu />
					<div className="menu-left">
						<AllProducts addToCartAction={addToCartAction} removeFromCartAction={removeFromCartAction}/>
					</div>
					<div className="menu-right">
						<Cart cart={cart} addToCartAction={addToCartAction} removeFromCartAction={removeFromCartAction}/>
					</div>
				</Layout>
			</div>
		);
	}
};

const mapStateToProps = ({cart}) =>{
    return {
        cart
    }
}

const mapActionsToProps = (dispatch) => {
	return bindActionCreators({
		addToCartAction,
		removeFromCartAction
	}, dispatch);
}

export default connect(mapStateToProps, mapActionsToProps)(Home);