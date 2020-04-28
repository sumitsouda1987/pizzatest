import React from 'react';
import AuthService from './services/AuthService';
import 'bootstrap/dist/css/bootstrap.min.css';
import Layout from './components/layout/Layout';

class Register extends React.Component {

	state = {name:'', email:'', password:''}

	async handleFormSubmit(event){
		event.preventDefault();
		
		const postData = {
			name : this.state.name,
			email : this.state.email,
			password : this.state.password
		}

		const response = await AuthService.doUserRegister(postData);

		if(response){
			AuthService.handleSuccess(response);
			this.props.history.push('/');
		}
		else{
			alert("Something went wrong!");
		}
	}

	render(){
		const {name, email, password} = this.state;
		return(
			<Layout>
				<div className="container">
					<div className="row">
				      	<div className="col-sm-9 col-md-7 col-lg-5 mx-auto">
				        	<div className="card card-signin my-5">
				          		<div className="card-body">
				            		<h5 className="card-title text-center">Register</h5>
						            <form onSubmit={event => this.handleFormSubmit(event)} className="form-register">
						            	<div className="form-label-group">
							              	<label>Name</label>
							                <input 
						                		type="text" 
						                		id="inputName" 
						                		className="form-control" 
						                		placeholder="Name" required 
						                		name="name" 
						                		value={name} 
						                		onChange = {event => this.setState({name:event.target.value})}
					                		/>
							              </div>
						              	<div className="form-label-group">
						              		<label>Email address</label>
							                <input 
						                		type="email" 
						                		id="inputEmail" 
						                		className="form-control" 
						                		placeholder="Email address" required 
						                		name="email" 
						                		value={email} 
						                		onChange = {event => this.setState({email:event.target.value})}
					                		/>
						              	</div>

						              	<div className="form-label-group">
							              	<label>Password</label>
							                <input 
							                	type="password" 
							                	id="inputPassword" 
							                	className="form-control" 
							                	placeholder="Password" required 
							                	name="password" 
						                		value={password} 
						                		onChange = {event => this.setState({password:event.target.value})}
						                	/>
						              	</div>

						              	<button className="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Submit</button>
						            </form>
				          		</div>
				        	</div>
				      	</div>
				    </div>
			    </div>
			</Layout>
		);
	}
}

export default Register;