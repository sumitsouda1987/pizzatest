import CookieService from './CookieService';

class Auth{

	logout(){
		CookieService.remove('access_token');
		return true;
	}

	checkIfAuthenticated(){
		const token = CookieService.get('access_token');
		return (token) ?  true :  false;
	}

	getAccessToken(){
		return CookieService.get('access_token');
	}

}

export default new Auth();