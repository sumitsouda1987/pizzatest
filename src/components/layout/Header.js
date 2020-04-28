import React from 'react';
import styled from 'styled-components';
import {Link,withRouter} from 'react-router-dom';
import logoImage from '../../assets/images/logo.png';
import avatarImage from '../../assets/images/avatar.svg';
import Auth from '../../services/Auth';

class Header extends React.Component {

	logOut(e) {
	    e.preventDefault()
	    Auth.logout()
	    this.props.history.push(`/`)
  	}
	
	render(){
		const loginRegLink = (<div><Link to="/login" className="login-text">Login</Link> | <Link to="/register" className="login-text">Signup</Link></div>)
		const logOutLink = (<a href="logout" onClick={this.logOut.bind(this)} className="login-text">Logout</a>)
		
		return (
			<HeaderContainer>
				<header className="header">
				   	<div className="top-header">
				      	<div>
				      		<Link to="/" className="pizza-logo">
					         	<img className="brand-logo" src={logoImage} alt="pizza store logo" />
					         	<span>Pizza Store</span>
				         	</Link>
				      	</div>
				      	<div className="my-account-section">
						    <div className="login-container">
						    	<img src={avatarImage} alt="avatar" data-label="profile" />
						        <div className="my-account">
						            <div>MY ACCOUNT</div>
						            {Auth.checkIfAuthenticated() ? logOutLink : loginRegLink}
						        </div>
						    </div>
						</div>
		            </div>
	            </header>
         	</HeaderContainer>
		);	
	}
	
};

export default withRouter(Header);

//Header Styles
const HeaderContainer = styled.div`
	.header {
	    position: fixed;
	    top: 0px;
	    width: 100%;
	    z-index: 99;
	    background: rgb(0, 102, 167);
	    transition: all 1s ease-in-out 0s;
	}

	.header .top-header {
	    display: flex;
	    -webkit-box-pack: justify;
	    justify-content: space-between;
	    -webkit-box-align: center;
	    align-items: center;
	    height: 3rem;
	    padding: 0rem 1.5rem;
	}

	.header .pizza-logo {
	    display: flex;
	    -webkit-box-align: center;
	    align-items: center;
	    padding-left: 1rem;
	    text-decoration: none;
	}

	.header .brand-logo {
	    cursor: pointer;
	}

	.header img.brand-logo{
	    width: 45px;
	}

	.header span{
	    color: #F69B17;
	    font-size: 25px;
	    font-weight: bold;
	}

	.my-account-section{
		display: flex;
	    -webkit-box-align: center;
	    align-items: center;
	    margin-right: 2rem;
	    padding-left: 0.5rem;
	    border-left: 1px solid rgb(0, 203, 188);
	}

	.my-account-section .login-container{
		margin-left: 1rem;
	    display: flex;
	    -webkit-box-align: center;
	    align-items: center;
	    font-size: 0.75rem;
	    cursor: pointer;
	}

	.my-account-section .login-container img{
		width: 1.8rem;
    	margin-right: 1rem;
	}

	.my-account-section .my-account{
		cursor: pointer;
    	color: rgb(255, 255, 255);
	}

	.my-account-section .login-text{
		color: rgb(85, 204, 246);
	    font-size: 0.72rem;
	    margin-top: 0.2rem;
	    text-decoration: none;
	}
`;