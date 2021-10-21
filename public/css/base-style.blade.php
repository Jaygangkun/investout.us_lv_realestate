html,body{
  height: 100%;
}

.mainpic{
  opacity: 1;
  height: 100%;
 background-position: center;
 background-repeat: no-repeat;
 background-size: cover;
}

.carousel-inner .mainpic
{
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;

-webkit-background-position: center;
-moz-background-position: center;
-o-background-position: center;
background-position: center;

-webkit-background-attachment: fixed;
-moz-background-attachment: fixed;
-o-background-attachment: fixed;
background-attachment: fixed;
}

.main-carousel-1{
background-image: url({{ asset('sitefront/head-background.jpg') }});
}
.main-carousel-2{
background-image: url({{ asset('sitefront/close-up.jpg') }});
}
.main-carousel-3{
background-image: url({{ asset('sitefront/566.jpg') }});
}

.overlay{
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: 10;
opacity: .1;
background-color: #0b2a4a;
}
.main-text{
margin-top: 3em;
font-size: 3.5em;
color: white;
z-index: 15;
}

.about-invest-out{
padding: 6em 3rem;
padding-bottom: 3em;
}

.about-invest-out h1{
font-size: 2.1rem;
color: #0b2a4a;
line-height: 1.5em;
margin-bottom: 3em;
}
.about-invest-text > span{
font-size: 25px;
display: inline-block;
margin-bottom: .5em;
}
.about-invest-text > p{
color: #0b2a4a;
font-size:17px
}


.about-invest-text + div > img{
width: 100%;
box-shadow: 0px 5px 12.35px 0.65px rgba(0,0,0,.39);
}

.seller-realtor-investor{
    margin-top: 3em;
    margin-bottom: 4em;
    padding: 0px;
    width: 100%;
}

.seller-realtor-investor div{
padding:0px !important;
}

.seller-realtor-investor img{
width: 100%;
}

.realtor-overlay{
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: 10;
background-color: rgba(0,0,0,0.1); /*dim the background*/
}


.seller-part-main{
background-image: url("{{ asset('sitefront/seller-image.jpg') }}");
background-position: center;
background-repeat: no-repeat;
background-size: cover;
height: 300px;
}

.seller-part-main:hover{
/* opacity: 0.5; */
}

.seller-overlay,.inv-overlay,.rea-overlay{
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: 10;
opacity: 0;
background-image: url({{ asset('sitefront/seller-overlay.png') }});
transition: opacity .5s ease-in-out;
}

.seller-part-main:hover > .seller-overlay{
opacity: .2;
}

.investor-part-main:hover > .inv-overlay{
opacity: .2;
}

.realtor-part-main:hover > .rea-overlay{
opacity: .2;
}

.seller-overlay2,.inv-overlay2,.rea-overlay2{
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: 11;
opacity: 0;
background-image: url({{ asset('sitefront/seller-overlay2.png') }});/*dim the background*/
transition: opacity .5s ease-in-out;
}

.seller-part-main:hover .seller-overlay2{
opacity: .8;
}

.investor-part-main:hover > .inv-overlay2{
opacity: .8;
}

.realtor-part-main:hover > .rea-overlay2{
opacity: .8;
}


.investor-part-main{
background-image: url("{{ asset('sitefront/investor-image.jpg') }}");
background-position: center;
background-repeat: no-repeat;
background-size: cover;
height: 300px;
}

.realtor-part-main{
background-image: url("{{ asset('sitefront/realtor-image.jpg') }}");
background-position: center;
background-repeat: no-repeat;
background-size: cover;
height: 300px;
}

.seller-part-main > div:first-of-type,.investor-part-main > div:first-of-type,.realtor-part-main > div:first-of-type{
position: relative;
z-index: 16;
}

.seller-part-main > div:last-of-type,.investor-part-main div:last-of-type,.realtor-part-main div:last-of-type{
position: absolute;
z-index: 16;
bottom: 40px;
width: 100%;
}

.seller-part-main h2,.investor-part-main h2,.realtor-part-main h2{
color: white;
}

.le-more{
background-color: #319b88;
color: white;
border-radius: 5px;
padding: 8px 15px;
border: none;
opacity: 0;
transition: all 0.5s ease-in-out;
}

.center-aligned-pic:hover .le-more{
opacity: 1;
}


.progress-numbers{
color: #319b88;
font-size: 5.5em;
}
.progress-maid{
margin-bottom: 4em
}

.progress-desc{
color: #0b2a4a;
font-size: 1.5em;
font-weight: bold;
font-style: italic;
}

.home-rev{
width: 100%;
background-repeat: no-repeat;
background-size: cover;
background-position: center;
height: 338px;
margin-bottom: 6em;
}
.home-rev span{
color: #0b2a4a;
    font-size: 3em;
    font-style: italic;
    margin-top: 2.5em;
    display: inline-block;
    }
.h-works{
color: #0b2a4a;
font-size: 2.8em;
margin-bottom: .6em;
}

.h-works span:last-of-type{
display: inline-block;
border-bottom: 3px solid #2f9784;
line-height: 1em;
}

.how-it-works{
font-size: 1.5em;
color:#0b2a4a;
}

.how-it-works p{
margin-top: 10px;
line-height: 1.7em
}

.say-about{
height: 525px;
background-size: cover;
background-position: center;
background-repeat: no-repeat;
box-shadow: 0px 5px 15px 0.6px rgba(0,0,0,.4);
z-index: 18;
}

.learn-more{
background-color: #0b2a4a;
color:#2f9784;
border-radius: 5px;
padding: 8px 15px;
border: none;
font-size: .6em;
  margin-top: 2em;
}

.say-about{
padding: 2em;
}

.say-about  span{
color: white;
font-size: 2.2em;
}

.asq{
font-size: 1em !important;
}

.asq{
display: inline-block;
border-bottom: 3px solid #0b2a4a;
line-height: 1em;
}
.feedback-desc{
text-align: center;
background-color: #0b2a4a;
opacity: .7;
color: white;
margin-top: 3em;
margin-bottom: 1em;
border-radius: 5px;
padding: 10px 15px;
line-height: 1.7em;
  font-size: 1.2em;
}

.ceo-part-main{
background-color: #909394;
opacity: .8;
color: #0b2a4a;
border-radius: 5px;
padding: 10px 15px;
line-height: 1.2em;
  font-size: 1.3em;
  text-align: center;

}

.signup-action{
color: white;
padding-top: 1.5em;
padding-bottom: 1.5em;
font-size: 2em;
text-align: center;
background-color: #0b2a4a;
}
.f-footer{
text-align: center;
background-color: #0b2a4a;
color: white;
padding-top:5px;
}

.sign-up-btn{
display: inline-block;
margin-left: 10px;
background-color: #2f9684;
color: white;
padding: 3px 35px;
font-size: 1em;
border-radius: 8px;
text-align: center;
border: none;
}

.seller-footer{
background-color: #181818;
color: white;
padding-top: 3.5em;
padding-bottom: 2em;
box-shadow: 0px -5px 20px 0.6px rgba(0,0,0,.4);
z-index: 18
}

.sel-head{
display: block;
font-size: 1.5em;
margin-bottom: .4em;
}
.seller-footer span{
display: block;
}

.seller-footer  div{
padding-top: 3em;
line-height: 1.7em;
}

.seller-footer  div:first-of-type{
padding-top: 0px;
}

button {
box-shadow: 0 0px 0px rgba(0,0,0,0.15) !important;
transition: box-shadow 0.3s ease-in-out;
}

button:hover{
box-shadow: 0px 4px 20px 6px rgba(0,0,0,.5) !important;
}

.learn-more:hover{
box-shadow: 0px 2px 15px 3px rgba(0,0,0,.3) !important;
}

.how-it-works > div:first-of-type img:nth-of-type(2)  {
  vertical-align: top;
}

/* responsive queries */

@media (max-width:725px){

#ab-wrap{
  display: flex;
  flex-direction: column;
}

#ab-wrap div{
  width: 100%;
}

#ab-image{
  order: 1;
  margin-bottom: 3em;
}

#ab-text{
  order: 2
}

.about-invest-out > div:first-of-type{
  padding: 0px;
}

.seller-part-main > div:first-of-type,
 .investor-part-main > div:first-of-type,
  .realtor-part-main > div:first-of-type{
    top: 20px;
}
}

@media (min-width:700px){
.center-aligned-pic{
  width: 33.33% !important;
}
}

@media (max-width:625px){
.main-text{
  font-size: 2.6em !important;
}

.selh img,.plsel img,.house img{
  width: 60% !important;
}
.selh,.plsel,.house{
  font-size: 1.5rem;
}

.how-it-works > div:first-of-type img:first-of-type,img:last-of-type{
  width: 20%;
}

.home-rev span{
  font-size: 2.5em !important
}

.how-it-works > div:first-of-type img:nth-of-type(2)  {
    width: 4%;
}
.signup-action{
  font-size: 2rem
}
}


@media (max-width:540px) and (min-width:440px){
.say-about{
    height: 650px;
}
}

@media (max-width:440px ) and (min-width:320px) {
.say-about{
    height: 850px;
}
}
