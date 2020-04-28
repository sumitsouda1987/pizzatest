import axios from 'axios';

const Api = axios.create({
	baseURL : `http://localhost/mypizza/pizza/public/api/`,
});

export default Api;