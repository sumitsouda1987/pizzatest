import React from 'react';
import Home from './Home';
import Login from './Login';
import Register from './Register';
import Checkout from './Checkout';
import OrderSuccess from './OrderSuccess';
import {Switch, Route} from 'react-router-dom';

const Routes = () => {
	return(
		<Switch>
	    	<Route path="/" exact component={Home} />
	    	<Route path="/login" component={Login} />
	    	<Route path="/register" component={Register} />
	    	<Route path="/checkout" component={Checkout} />
	    	<Route path="/order-success" component={OrderSuccess} />
    	</Switch>
	);
};

export default Routes;