import Api from '../Api/Api';
import ApiEndpoints from '../Api/ApiEndpoints';
import CookieService from '../services/CookieService';

interface Credentials {
	name: string,
	email: email,
	username: string,
	password: string
}

class AuthService{
	
	async doUserLogin(credentials: Credentials){
		try{
			const response = await Api.post(ApiEndpoints.login, credentials);
			return response.data;
		}
		catch(error){
			console.error('Error', error.response);
			return false;
		}
	}

	async doUserRegister(credentials: Credentials){
		try{
			const response = await Api.post(ApiEndpoints.register, credentials);
			return response.data;
		}
		catch(error){
			console.error('Error', error.response);
			return false;
		}
	}

	handleSuccess(response:any){
		const options = {path: '/'};
		CookieService.set('access_token', response.success.token, options);

		return true;
	}
}

export default new AuthService();