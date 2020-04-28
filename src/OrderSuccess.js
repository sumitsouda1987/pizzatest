import React from 'react';
import Layout from './components/layout/Layout';
import {Link,withRouter} from 'react-router-dom';
import Auth from './services/Auth';

class OrderSuccess extends React.Component {
	constructor(props) {
	    super(props);
	    console.log(this.props)
	}

	render(){
		if(!Auth.checkIfAuthenticated()){
			this.props.history.push('/');
			return false;
		}

		return(
			<Layout>
				<div className="container">
					<div className="success-container row text-center">
				        <div className="col-sm-12 col-sm-offset-3">
					        <h2>Order Placed successfully!</h2>
					        <p>
					        	Thank you. Thank you for your order.
							</p>
					        <Link to="/" className="menu-link">
				                <button datalabel="Explore Menu" className="btn--noStyle">
				                	<span>Explore Menu</span>
				            	</button>
				            </Link>
				        </div>
					</div>
				</div>
			</Layout>
		);
	}
}

export default withRouter(OrderSuccess);