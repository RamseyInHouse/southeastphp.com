import VueRouter from 'vue-router';
import Home from './components/home.vue';
import Login from './components/auth/login.vue';
import About from './components/about.vue';
import Register from './components/auth/register.vue';
import CallForPapers from './components/call-for-papers.vue';
import SubmitPaper from './components/submit-paper.vue';
import EmailSignups from './components/admin/signups.vue';
import Profile from './components/user/profile.vue';

const routes = [
  {
    path: '/',
    component: Home,
    name: 'Home',
  },
  {
    path: '/login',
    component: Login,
    name: 'Login',
  },
  {
    path: '/about',
    component: About,
    name: 'About',
  },
  {
    path: '/cfp',
    component: CallForPapers,
    name: 'CallForPapers',
  },
  {
    path: '/cfp/submit',
    component: SubmitPaper,
    name: 'SubmitPaper',
  },
  {
    path: '/admin/emails',
    component: EmailSignups,
    name: 'EmailSignups',
  },
  {
    path: '/register',
    component: Register,
    name: 'Register',
  },
  {
    path: '/user/profile',
    component: Profile,
    name: 'Profile',
  }
];

export default new VueRouter({
  routes,
});