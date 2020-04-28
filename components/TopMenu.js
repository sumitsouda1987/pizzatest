import Link from 'next/link';

const TopMenu = () => {
	return (
		<div className="menu">
		   <div className="menu-item active" data-label="Bestsellers"><span>BESTSELLERS</span></div>
		   <div className="menu-item" data-label="Veg Pizza"><span>VEG PIZZA</span></div>
		   <div className="menu-item" data-label="Non-Veg Pizza"><span>NON-VEG PIZZA</span></div>
		   <div className="menu-item" data-label="Pizza Mania"><span>PIZZA MANIA</span></div>
		   <div className="menu-item" data-label="Sides"><span>SIDES</span></div>
		   <div className="menu-item"  data-label="Beverages"><span>BEVERAGES</span></div>
		   <div className="menu-item" data-label="Dessert"><span>DESSERT</span></div>
		</div>
	);
};

export default TopMenu;