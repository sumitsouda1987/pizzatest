import React from 'react';
import Header from './Header';

function Layout(props){
	return(
		<div>
			<Header />
			<div className="content-wrapper">
				{props.children}
			</div>
		</div>
	);
}

export default Layout;