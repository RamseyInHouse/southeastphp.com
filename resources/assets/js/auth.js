import Vue from 'app';
import routes from './routes';
import axios from 'axios';

export default {
  user: {
    authenticated: false,
    profile: null,
  },

  check() {
    let token = localStorage.getItem('id_token');
    if (token) {
      axios.get('api/user?token=' + token).then(response => {
        this.user.authenticated = true;
        this.user.profile = response.data.data;
      });
    }
  },

  register(context, name, email, password) {
    axios.post('api/register', {
      name: name,
      email: email,
      password: password,
    })
  }

}