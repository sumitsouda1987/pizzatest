import React from 'react';
import AuthService from './services/AuthService';
import 'bootstrap/dist/css/bootstrap.min.css';
import Layout from './components/layout/Layout';
import {RouteComponentProps} from 'react-router-dom';

class Login extends React.Component<RouteComponentProps> {

	state = {username:'', password:''}

	async handleFormSubmit(event){
		event.preventDefault();
		
		const postData = {
			username : this.state.username,
			password : this.state.password
		}

		const response = await AuthService.doUserLogin(postData);

		if(response){
			AuthService.handleSuccess(response);
			this.props.history.push('/');
		}
		else{
			alert("Please check your credentials");
		}
	}

	render(){
		const {username, password} = this.state;
		return(
			<Layout>
				<div className="container">
					<div className="row">
				      <div className="col-sm-9 col-md-7 col-lg-5 mx-auto">
				        <div className="card card-signin my-5">
				          <div className="card-body">
				            <h5 className="card-title text-center">Sign In</h5>
				            <form onSubmit={event => this.handleFormSubmit(event)} className="form-signin">
				              <div className="form-label-group">
				              	<label>Email address</label>
				                <input 
			                		type="email" 
			                		id="inputEmail" 
			                		className="form-control" 
			                		placeholder="Email address" required 
			                		name="username" 
			                		value={username} 
			                		onChange = {event => this.setState({username:event.target.value})}
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

				              <button className="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
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

export default Login;