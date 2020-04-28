import Link from 'next/link';
import '../assets/css/Style.css';
import logoImage from '../assets/images/logo.png';

const Layout = (props) => {
	console.warn('props', props);
	return (
		<div>
			<div className="header">
			   <div className="top-header">
			      <div className="pizza-logo">
			         <img className="brand-logo" src={logoImage} alt="pizza store logo" />
			         <span>Pizza Store</span>
			      </div>
	            </div>
	         </div>
			<div className="menu">
				{props.value.categories.map(category => (
					<Link href={"/category/" + category.name} key={category.id}>
		            	<a className="menu-item"><span>{category.name}</span></a>
		          	</Link>
		      	))}
			</div>
			{props.children}
		</div>
	);
};

export default Layout;