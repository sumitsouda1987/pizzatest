import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import {createStore} from 'redux';
import {Provider} from 'react-redux';
import reducers from './redux/reducers';
import {BrowserRouter as Router} from 'react-router-dom';
import * as serviceWorker from './serviceWorker';

function saveToLocalStorage(state){
	try{
		const serializedState = JSON.stringify(state);
		localStorage.setItem('state', serializedState);
	}
	catch(e){
		console.log(e);
	}
}

function loadFromLocalStorage(){
	try{
		const serializedState = localStorage.getItem('state');

		if(serializedState === null)
			return undefined;

		return JSON.parse(serializedState);
	}
	catch(e){
		console.log(e);
	}
}

const cartData = loadFromLocalStorage();

const Store = createStore(reducers, cartData);

Store.subscribe(() => saveToLocalStorage(Store.getState()));

ReactDOM.render(
  <React.StrictMode>
  	<Router>
  		<Provider store={Store}>
    		<App />
		</Provider>
	</Router>
  </React.StrictMode>,
  document.getElementById('root')
);

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.unregister();
