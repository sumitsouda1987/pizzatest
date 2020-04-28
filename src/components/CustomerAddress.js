import React from 'react';
import Api from '../Api/Api';
import ApiEndpoints from '../Api/ApiEndpoints';
import Auth from '../services/Auth';
import AddAddressModal from './partials/AddAddressModal';

class CustomerAddress extends React.Component{
	constructor(props){
		super(props);
		this.state = {addresses:[],addModalShow:false}
	}

	componentDidMount(){
		const token = Auth.getAccessToken();

		Api.get(ApiEndpoints.addresses,{
				headers: {
					'Accept' :'application/json',
					'Authorization': 'Bearer ' + token
				}
			}).then(
			response => {
				this.setState({addresses: response.data});
			}
		);
	};
	
	render(){
		let addModalClose = () => this.setState({addModalShow:false});
		return (		
	        <div className="address-container">
	        	<span className="address-heading" data-label="delivery_address">Pickup/Dine-in Address</span>
	            <div className="all-addresses">
	                <div className="address-box">
	                    <div className="address-icon">
	                        <div className="location"></div>
	                    </div>
	                    <div className="address-wrapper">
		                    {this.state.addresses.map(address=>(
		                        <div key={address.id} className="address-cont">
		                            <p className="current-heading">
		                            	<input type="radio" name="selectedaddress" value={address.id} onChange={this.props.handleChange}/>
		                            	<span>{address.title}</span>
	                            	</p>
		                            <p className="current-address">
		                            	{address.address+', '+address.state+', '+address.city+', '+address.postcode+', Phone-'+address.phone}
	                            	</p>
		                        </div>			                        
		                    ))}
		                    <div className="new-address">
		                        <button variant="primary" onClick={() => this.setState({addModalShow:true})}>
		                        	Add New Address
	                        	</button>
		                        
		                        <AddAddressModal
							        show={this.state.addModalShow}
							        onHide={addModalClose}
						      	/>	
		                    </div>
	                    </div>
	                </div>
	            </div>
	        </div>
		);
	}
}

export default CustomerAddress;