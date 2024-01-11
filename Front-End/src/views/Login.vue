<template>
    <div class="main">

        <head>
            <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        </head>
        <div class="body">
            <div class="leftSide">
                <div class="textLeftSide">
                    <div class="textNomProjet">Gestion des Incidents</div>
                    <div class="textSousTitre">Une Plateforme pour la gestion des incidents <br> au sein des universités
                    </div>
                    <div class="buttonReadMore">
                        <button class="ReadMore">Read More</button>
                    </div>
                </div>
                <div class="cercle1"></div>
                <div class="cercle2"></div>
            </div>
            <div class="rightSide">
                <div class="LoginTitre">
                    <p class="titre">Hello Again!</p>
                    <p class="text">Welcome Back</p>
                    <form @submit="postData" method="post">
                        <div class="logoEmail">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <g opacity="0.3">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.5 5.25L2.25 4.5H21.75L22.5 5.25V18.75L21.75 19.5H2.25L1.5 18.75V5.25ZM3 6.8025V18H21V6.804L12.465 13.35H11.55L3 6.8025ZM19.545 6H4.455L12 11.8035L19.545 6Z"
                                        fill="#333333" />
                                </g>
                            </svg>
                        </div>

                        <input type="text" id="email" placeholder="Email Address" name="email" v-model="posts.email">
                        <div class="passwordLogo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <g opacity="0.3">
                                    <path
                                        d="M20 12C20 10.897 19.103 10 18 10H17V7C17 4.243 14.757 2 12 2C9.243 2 7 4.243 7 7V10H6C4.897 10 4 10.897 4 12V20C4 21.103 4.897 22 6 22H18C19.103 22 20 21.103 20 20V12ZM9 7C9 5.346 10.346 4 12 4C13.654 4 15 5.346 15 7V10H9V7Z"
                                        fill="#333333" />
                                </g>
                            </svg>
                        </div>
                        <input type="password" id="password" placeholder="Password" name="pswd" v-model="posts.pswd">
                        <button type="submit" id="buttonLogin">Login</button>
                    </form>
                    <div class="forgotPassword">
                        Forgot Password
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios)
export default {
    name: "Login",

    data() {
        return {
            posts: {
                email: null,
                pswd: null,
            }
        }

    },
    mounted() {
        console.log("Login component mounted");
        this.$root.showAppBar = false; // Cela mettra showAppBar à false dans le composant Home.vue
    },

    methods: {
        postData(e) {
            this.axios.post("http://localhost:3000/posts/", this.posts)
                .then((result) => {
                    console.warn(result)
                }
                )
            e.preventDefault();
        }
        
    }
}
</script>

<style>
body {
    margin: 0;
}

.body {
    width: 100vw;
    height: 100vh;
    background: #ffffff;
    display: grid;
    grid-template-columns: 55% 45%;
    overflow: hidden;
    /* Hide overflowing content */
    font-family: 'Poppins';

}

.leftSide {
    position: relative;
    height: 100%;
    flex-shrink: 0;
    background: var(--Blue, linear-gradient(180deg, #0575E6 0%, #02298A 84.79%, #021B79 100%));
}

.textLeftSide {
    position: absolute;
    top: 200px;
    left: 100px;
    display: inline-flex;
    flex-direction: column;
    align-items: flex-start;
}

.textNomProjet {
    color: var(--White, #FFF);
    font-family: 'Poppins';
    font-size: 24px;
    font-style: normal;
    font-weight: 1000;
    line-height: normal;
}

.textSousTitre {
    color: var(--White, #FFF);
    font-family: 'Poppins';
    font-size: 13px;
    font-style: normal;
    line-height: normal;
}

.ReadMore {
    position: absolute;
    top: 90px;
    display: flex;
    padding: 8px 30px;
    justify-content: center;
    align-items: center;
    gap: 10px;
    border-radius: 30px;
    background: #0575E6;
    color: #FFF;
    font-family: 'Poppins';
    font-size: 12px;
    font-style: normal;
    line-height: normal;
}

.cercle1 {
    position: absolute;
    top: 400px;
    /* left: 10%; */
    right: 65%;
    border-radius: 557px;
    border: 1px solid #0575E6;
    width: 500px;
    height: 500px;
    flex-shrink: 0;
}

.cercle2 {
    position: absolute;
    top: 435px;
    right: 60%;
    border-radius: 557px;
    border: 1px solid #0575E6;
    width: 500px;
    height: 500px;
    flex-shrink: 0;
}

.rightSide {
    position: relative;
    height: 100%;
    flex-shrink: 0;
    background: #ffffff;
}

.logintitre {
    position: relative;
    width: 218px;
    height: 356px;
    flex-shrink: 0;
}

.titre {
    position: absolute;
    top: 100px;
    left: 140px;
    flex-shrink: 0;
    color: #333;
    font-family: 'Poppins';
    font-size: 26px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
}

.text {
    position: absolute;
    top: 139px;
    left: 140px;
    color: #333;
    font-family: 'Poppins';
    font-size: 18px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

#email {
    z-index: 1;
    position: absolute;
    top: 210px;
    left: 140px;
    display: flex;
    width: 245px;
    padding: 10px 35px;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    gap: 7px;
    border-radius: 30px;
    border: 1px solid #EEE;
    background: #FFF;
}

.logoEmail {
    position: absolute;
    top: 217px;
    left: 149px;
    z-index: 2;
    width: 24px;
    height: 24px;
    flex-shrink: 0;
    opacity: 0.3;
}

#email::placeholder {
    font-family: 'Poppins', sans-serif;
    opacity: 0.3 !important;
}

#password {
    position: absolute;
    top: 260px;
    left: 140px;
    display: flex;
    width: 245px;
    padding: 10px 35px;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    gap: 7px;
    border-radius: 30px;
    border: 1px solid #EEE;
    background: #FFF;
}

.passwordLogo {
    position: absolute;
    top: 265px;
    left: 149px;
    z-index: 2;
    width: 24px;
    height: 24px;
    flex-shrink: 0;
    opacity: 0.3;
}

#password::placeholder {
    font-family: 'Poppins', sans-serif;
    opacity: 0.3 !important;
}

#buttonLogin {
    position: absolute;
    top: 320px;
    left: 140px;
    display: flex;
    width: 320px;
    padding: 10px 20px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 7px;
    border-radius: 30px;
    background: #0575E6;
    font-family: 'Poppins';
    color: #FFF;
    font-size: 14px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
}

#buttonLogin::value {
    font-family: 'Poppins';
    color: #FFF;
}

.forgotPassword {
    position: absolute;
    top: 380px;
    left: 39%;
    display: flex;
    color: #333;
    font-family: Poppins;
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    opacity: 0.7;
}</style>