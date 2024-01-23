<template>
    <head>
        <meta http-equiv="Content-Security-Policy" content="style-src 'self' 'unsafe-inline' http://gc.kis.v2.scr.kaspersky-labs.com;">
        <meta http-equiv="Content-Security-Policy" content="style-src 'self' https://hcaptcha.com https://*.hcaptcha.com https://gc.kis.v2.scr.kaspersky-labs.com wss://gc.kis.v2.scr.kaspersky-labs.com 'nonce-<your-nonce-here>';">
    <meta http-equiv="Content-Security-Policy" content="style-src 'self' https://hcaptcha.com https://*.hcaptcha.com https://gc.kis.v2.scr.kaspersky-labs.com wss://gc.kis.v2.scr.kaspersky-labs.com 'unsafe-inline';">
    <meta http-equiv="Content-Security-Policy" content="style-src 'self' https://hcaptcha.com https://*.hcaptcha.com https://gc.kis.v2.scr.kaspersky-labs.com wss://gc.kis.v2.scr.kaspersky-labs.com 'nonce-<your-nonce-here>';">
    
    </head>
    <form @submit.prevent="handleSubmit">
    <div class="card" style="width: 50rem;">
    <div class="card-body">
    <h5 class="card-title">Montant à payer : {{amount}} TND</h5>
    <br/>
    <div class="card-text">
    <div class="form-group">
    <input type="email" class="form-control" placeholder="email" vmodel="
    email" />
    </div>
    <br/>
    </div>
    <div id="card-element"></div>
    <br/>
    <button type="submit" class="btn btn-success">Procéder au payement</button>
    </div>
    </div>
    </form>
    </template>
    <script setup>
    import { onMounted, ref } from 'vue';
    import { loadStripe } from '@stripe/stripe-js';
    import axios from 'axios'
    import { useRouter,useRoute } from 'vue-router';
    
    
    const route = useRoute();
    const total1 = route.params.total1;
    console.log(total1)
    const router = useRouter();
    const stripePromise =loadStripe('pk_test_51OM4uLHT5XkEb7OBXaEUpvknkSYwgbx3znGYf5VA2u3pzNIrv1zWOpWrlA5TZkAQ3AgTPebI4pTNI8eUKNFXDgo300hFqxMt6p');
    const stripe = ref(null);
    let cardElement; 
    let amount=ref(0);
    let email=ref("");
    onMounted(async () => {
    amount.value=total1
    stripe.value = await stripePromise;
    const elements = stripe.value.elements();
    cardElement = elements.create('card'); // Affecter cardElement
    cardElement.mount('#card-element');
    });
    const handleSubmit = async () => {
    const { token, error } = await stripe.value.createToken(cardElement);
    if (error) {
    console.error(error);
    console.log("this is test",token);
    } else {
    // Envoie le token au serveur pour traiter le paiement
    const response = await axios.post('http://localhost:8000/api/createpayment', {
    token: token.id,
    amount: amount.value * 100, // Convertir le montant en cents
    email:email.value
    });
    if (response.data.message) {
    console.log(response.data.message);
    // Le paiement est réussi
    alert(response.data.message);
    
    //Redirection
    router.push('/afficherCategory')
    } else {
    console.error(response.data.error);
    }
    }
    };
</script>