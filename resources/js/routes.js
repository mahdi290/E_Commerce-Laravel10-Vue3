import AfficherSenregistrer from './components/AfficherSenregistrer.vue';
import Bienvenue from './components/Bienvenue.vue';
import AfficherCategory from './components/AfficherCategory.vue'
import AfficherSCategory from './components/AfficherSCategory.vue'
import Produits from './components/Produits.vue';
import Payment from './components/Payment.vue';
import AfficherPanier from './components/AfficherPanier.vue';
import AfficherLAchat from './components/AfficherLAchat.vue';
import Administrateur from './components/Administrateur.vue';
import AjouterProduit from './components/AjouterProduit.vue';
import ModifierProduit from './components/ModifierProduit.vue';
import Menu from './components/Menu.vue';
import index from './components/index.vue'

export const routes = 
[{name: 'Bienvenue',path: '/Bienvenue',component: Bienvenue},
{name: 'AfficherCategory',path: '/AfficherCategory',component: AfficherCategory},
{name: 'index',path:'/index', component:index},
{path:'/payment',name:'Payment',component:Payment},
{name: 'AfficherSenregistrer',path: '/AfficherSenregistrer',component: AfficherSenregistrer},
{name: 'Produits',path: '/Produits/:id',component: Produits},
{path:'/payment/:total1',name:'Payment',component:Payment},
{name: 'AfficherPanier',path: '/AfficherPanier',component: AfficherPanier},
{name: 'AfficherLAchat',path: '/AfficherLAchat',component: AfficherLAchat},
{name: 'Administrateur',path: '/Administrateur',component: Administrateur},
{name: 'AjouterProduit',path: '/AjouterProduit',component: AjouterProduit},
{name: 'ModifierProduit',path: '/ModifierProduit',component: ModifierProduit},
{name: 'AfficherSCategory',path: '/AfficherSCategory/:id',component: AfficherSCategory,props: true},
{name: 'Menu',path: '/Menu',component: Menu}
];
