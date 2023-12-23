<template>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    </head>
    <div class="body">
        <div class="leftSide">
            <div class="cercle1"></div>
            <div class="cercle2"></div>
        </div>
        <div class="rightSide">
            <div class="LoginTitre">
                <p class="titre">Hello Again!</p>
                <p class="text">Welcome Back</p>
                <form>
                    <div class="logoEmail">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g opacity="0.3">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.5 5.25L2.25 4.5H21.75L22.5 5.25V18.75L21.75 19.5H2.25L1.5 18.75V5.25ZM3 6.8025V18H21V6.804L12.465 13.35H11.55L3 6.8025ZM19.545 6H4.455L12 11.8035L19.545 6Z"
                                    fill="#333333" />
                            </g>
                        </svg>
                    </div>

                    <input type="text" id="email" placeholder="Email Address">
                    <input type="password" id="password" placeholder="Password">
                    <input type="button" id="buttonLogin" value="Login">
                </form>
            </div>
        </div>
    </div>
</template>

<style>
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
    left: 161px;
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
    left: 161px;
    color: #333;
    font-family: 'Poppins';
    font-size: 18px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

#email {
    position: absolute;
    top: 210px;
    left: 161px;
    display: flex;
    width: 307px;
    padding: 10px 20px;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    gap: 7px;
    border-radius: 30px;
    border: 1px solid #EEE;
    background: #FFF;
}

#email::placeholder {
    font-family: 'Poppins';
    opacity: 0.3 !important;
}

#password {
    position: absolute;
    top: 260px;
    left: 161px;
    display: flex;
    width: 307px;
    padding: 10px 20px;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    gap: 7px;
    border-radius: 30px;
    border: 1px solid #EEE;
    background: #FFF;
}

#password::placeholder {
    font-family: 'Poppins';
    opacity: 0.3 !important;
}

#buttonLogin {
    position: absolute;
    top: 320px;
    left: 161px;
    display: flex;
    width: 349px;
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
</style>