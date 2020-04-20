import logoImage from '../assets/images/logo.png';

const Header = () => {
	return (
		<div className="header">
		   <div className="top-header">
		      <div className="pizza-logo">
		         <img className="brand-logo" src={logoImage} alt="pizza store logo" />
		         <span>Pizza Store</span>
		      </div>
            </div>
         </div>
	);
};

export default Header;