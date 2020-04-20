import Layout from '../components/Layout';
import fetch from 'isomorphic-unfetch';

const Index = (props) => {
	
  return (
    <Layout value={{ categories: props.categories}}>
      Hello world, This is my Home page!
    </Layout>
  );
}

Index.getInitialProps = async (context) => {
	const data = await fetch('http://localhost/pizzatest/pizzastore/public/api/categories');
	const result = await data.json();

	return{
		categories : result
	} 
};

export default Index;