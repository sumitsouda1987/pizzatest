import React from 'react';
import styled from 'styled-components';
import {Link} from 'react-scroll';
import Api from '../../Api/Api';
import ApiEndpoints from '../../Api/ApiEndpoints';

class TopMenu extends React.Component{
	constructor(props){
		super(props);
		this.state = {categories:[]}
	}

	componentDidMount(){
		Api.get(ApiEndpoints.categories).then(
			response => {
				this.setState({categories: response.data});
			}
		);
	};

	render(){
		return (
			<TopMenuContainer>
				<div className="menu">
					{this.state.categories.map(category => (
						<Link to={category.name.replace(' ', '_')} key={category.id} className="menu-item" smooth={true} duration={1000} offset={-100}>
							<span>{category.name}</span>
						</Link>
					))}
				</div>
			</TopMenuContainer>
		);
	}
}

export default TopMenu;

//TopMenu Styles
const TopMenuContainer = styled.div`
	.menu{
		display: flex;
	    -webkit-box-pack: justify;
	    justify-content: space-between;
	    flex-wrap: nowrap;
	    flex-direction: row;
	    right: 0px;
	    left: 0px;
	    width: auto;
	    background-color: rgb(255, 255, 255);
	    overflow-x: auto;
	    height: 2.4em;
	    position: fixed;
	    z-index: 90;
	    padding: 0.3rem 3rem 0rem;
	    padding-left: 5rem;
	    padding-right: 5rem;
	    box-shadow: rgb(210, 221, 233) 5px 5px 5px;
	    transition: all 1s ease-in-out 0s;
	}

	.menu .menu-item{
		white-space: nowrap;
	    margin-left: 0.5em;
	    margin-right: 0.5em;
	    margin-top: 5px;
	    font-size: 14px;
	    font-weight: 600;
	    letter-spacing: 0.4px;
	    text-align: center;
	    cursor: pointer;
	    text-decoration: none;
	}

	.menu .menu-item.active{
		padding-bottom: 1.3em;
	    color: rgb(82, 137, 166);
	    border-bottom: 0.3em solid rgb(101, 171, 11);
	}
`;