import React from 'react';
import Api from '../../Api/Api';
import ApiEndpoints from '../../Api/ApiEndpoints';
import Modal from "react-bootstrap/Modal";
import "bootstrap/dist/css/bootstrap.min.css";
import Auth from '../../services/Auth';

class AddAddressModal extends React.Component{

	state = {title:'', address:'', state:'', city:'', postcode:'', phone:''}

	async handleFormSubmit(event){
		event.preventDefault();
		
		const postData = {
			title : this.state.title,
			address : this.state.address,
			state : this.state.state,
			city : this.state.city,
			postcode : this.state.postcode,
			phone : this.state.phone
		}	

		const token = Auth.getAccessToken();
		
		await Api.post(ApiEndpoints.add_address,postData,{
				headers: {
					'Accept' :'application/json',
					'Authorization': 'Bearer ' + token
				}
			}).then((res) => {
			   	window.location.reload(false);
			})
		 	.catch((err) => {
		   		console.log("ERROR: ====", err);
	 		});
	}

	render(props){
		const {title,address,state,city,postcode,phone} = this.state;
		return(
			<Modal
				show={this.props.show}
				size="md"
				aria-labelledby="contained-modal-title-vcenter"
				centered
				animation={false}
		    >
		    	<form onSubmit={event => this.handleFormSubmit(event)} className="form-address">
			      	<Modal.Header>
				        <Modal.Title id="contained-modal-title-vcenter">
			          		Add Address
				        </Modal.Title>
		      		</Modal.Header>
			      	<Modal.Body>
						<div className="container">	
							<div className="form-label-group">
				              	<label>Title</label>
				                <input 
			                		type="text" 
			                		className="form-control" 
			                		placeholder="Title" required 
			                		name="title" 
			                		value={title} 
			                		onChange = {event => this.setState({title:event.target.value})}
		                		/>
			              	</div>		            
			              	<div className="form-label-group">
			              		<label>Address</label>
				                <input 
			                		type="text" 
			                		className="form-control" 
			                		placeholder="Address" required 
			                		name="address" 
			                		value={address} 
			                		onChange = {event => this.setState({address:event.target.value})}
		                		/>
			              	</div>

			              	<div className="form-label-group">
				              	<label>State</label>
				                <input 
			                		type="text" 
			                		className="form-control" 
			                		placeholder="State" required 
			                		name="state" 
			                		value={state} 
			                		onChange = {event => this.setState({state:event.target.value})}
		                		/>
			              	</div>

			              	<div className="form-label-group">
			              		<label>City</label>
				                <input 
			                		type="text" 
			                		className="form-control" 
			                		placeholder="City" required 
			                		name="city" 
			                		value={city} 
			                		onChange = {event => this.setState({city:event.target.value})}
		                		/>
			              	</div>

			              	<div className="form-label-group">
				              	<label>Post Code</label>
				                <input 
			                		type="text" 
			                		className="form-control" 
			                		placeholder="Post code" required 
			                		name="postcode" 
			                		value={postcode} 
			                		onChange = {event => this.setState({postcode:event.target.value})}
		                		/>
			              	</div>

			              	<div className="form-label-group">
				              	<label>Phone</label>
				                <input 
			                		type="text" 
			                		className="form-control" 
			                		placeholder="Phone" required 
			                		name="phone" 
			                		value={phone} 
			                		onChange = {event => this.setState({phone:event.target.value})}
		                		/>
			              	</div>
					    </div>
				    </Modal.Body>
	  				<Modal.Footer>
			        	<button onClick={this.props.onHide}>Close</button>
		              	<button className="btn btn-primary" type="submit">Save</button>
			      	</Modal.Footer>
				</form>
  			</Modal>
		);
	}
}

export default AddAddressModal;