import React from 'react';
import Card from './partials/Card';
import Api from '../Api/Api';
import ApiEndpoints from '../Api/ApiEndpoints';

class AllProducts extends React.PureComponent {
	state = {
		products : []
	}

	componentDidMount(){
		Api.get(ApiEndpoints.products).then(
			response => {
				this.setState({products: response.data});
			}
		);
	};

	addToCart = (product) => {
		this.props.addToCartAction(product);
	};

	removeFromCart = (product) => {
		this.props.removeFromCartAction(product);
	};

	render(){
		return (
			<div>
				{Object.keys(this.state.products).map(k => {
					return(
						<div key={k} id={this.state.products[k]['category']['catname'].replace(' ', '_')}>
							<div className="menu-name-block">
								<div className="menu-hr"></div>
								<div className="menu-cat">
									<div className="menu-catname ">{this.state.products[k]['category']['catname']}</div>
								</div>
							</div>
							<div className="card-container">
								<div className="all-cards" data-label="Bestsellers">
								{Object.values(this.state.products[k]['category']['product']).map(product => {
									return(
										<Card key={product['id']} {...product} {...this.state.products[k]['category']} addFunc={this.addToCart} removeFunc={this.removeFromCart}/>
									)
								})}
								</div>
							</div>
						</div>
					)
				})}
			</div>
		);
	}
}

export default AllProducts;